<?php

class Auth
{
    private string $userTable = 'users';

    private string $userColumn = 'email';

    private string $passColumn = 'password';

    private string $userLevel = 'userlevel';

    private bool $encrypt = true;

    private PDO $pdo;

    public function __construct()
    {
        $this->dbConnect();
    }

    private function dbConnect(): void
    {
        try {
            $this->pdo = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, DB_USERNAME, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function login(string $username, string $password): bool
    {
        $password = $this->encrypt ? $this->hash($password) : $password;

        $stmt = $this->pdo->prepare("SELECT * FROM {$this->userTable} WHERE {$this->userColumn} = ? AND {$this->passColumn} = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['loggedin'] = $user[$this->passColumn];

            // $_SESSION['userlevel'] = $user[$this->userLevel];
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function loginCheck(string $loginCode): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->userTable} WHERE {$this->passColumn} = ?");
        $stmt->execute([$loginCode]);

        return $stmt->rowCount() > 0;
    }

    public function passwordReset(string $username): bool
    {
        $newPassword = $this->createPassword();
        $hashedPassword = $this->encrypt ? $this->hash($newPassword) : $newPassword;

        $stmt = $this->pdo->prepare("UPDATE {$this->userTable} SET {$this->passColumn} = ? WHERE {$this->userColumn} = ?");
        $result = $stmt->execute([$hashedPassword, $username]);

        if ($result) {
            return $this->sendPasswordResetEmail($username, $newPassword);
        }

        return false;
    }

    private function sendPasswordResetEmail(string $to, string $newPassword): bool
    {
        $subject = "Password Reset: " . $_SERVER['SERVER_NAME'];
        $message = "Your new password is: " . $newPassword;
        $headers = "From: " . $_SERVER['SERVER_NAME'] . "\r\n" .
                   "Content-Type: text/plain; charset=utf-8\r\n";

        return mail($to, $subject, $message, $headers);
    }

    public function createPassword(int $length = 8): string
    {
        return bin2hex(random_bytes($length));
    }

    public function createTable(string $tableName): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT(11) NOT NULL AUTO_INCREMENT,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            userlevel INT(11) NOT NULL DEFAULT '0',
            PRIMARY KEY (id)
        )";
        $this->pdo->exec($sql);
    }

    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
