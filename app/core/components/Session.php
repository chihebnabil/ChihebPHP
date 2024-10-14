<?php

class Session implements SessionHandlerInterface
{
    private bool $alive = true;
    private ?mysqli $dbc = null;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_set_save_handler($this, true);
            session_start();
        }
    }

    public function __destruct()
    {
        if ($this->alive) {
            session_write_close();
            $this->alive = false;
        }
    }

    public function delete(): void
    {
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }

        session_destroy();
        $this->alive = false;
    }

    public function open($savePath, $sessionName): bool
    {
        $this->dbc = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if ($this->dbc->connect_error) {
            throw new Exception('Could not connect to database: ' . $this->dbc->connect_error);
        }

        return true;
    }

    public function close(): bool
    {
        return $this->dbc->close();
    }

    public function read($id): string|false
    {
        $stmt = $this->dbc->prepare("SELECT `data` FROM `sessions` WHERE `id` = ? LIMIT 1");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['data'];
        }

        return '';
    }

    public function write($id, $data): bool
    {
        $stmt = $this->dbc->prepare("REPLACE INTO `sessions` (`id`, `data`, `last_accessed`) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $id, $data);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function destroy($id): bool
    {
        $stmt = $this->dbc->prepare("DELETE FROM `sessions` WHERE `id` = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $_SESSION = array();

        return $stmt->affected_rows > 0;
    }

    public function gc($maxlifetime): int|false
    {
        $stmt = $this->dbc->prepare("DELETE FROM `sessions` WHERE `last_accessed` < DATE_SUB(NOW(), INTERVAL ? SECOND)");
        $stmt->bind_param("i", $maxlifetime);
        $stmt->execute();

        return $stmt->affected_rows;
    }
}