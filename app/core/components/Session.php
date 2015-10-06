<?php


class Session
{
  private $alive = true;
  private $dbc = NULL;

  function __construct()
  {
    session_set_save_handler(
      array(&$this, 'open'),
      array(&$this, 'close'),
      array(&$this, 'read'),
      array(&$this, 'write'),
      array(&$this, 'destroy'),
      array(&$this, 'clean'));

    session_start();
  }

  function __destruct()
  {
    if($this->alive)
    {
      session_write_close();
      $this->alive = false;
    }
  }

  function delete()
  {
    if(ini_get('session.use_cookies'))
    {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
      );
    }

    session_destroy();

    $this->alive = false;
  }

  private function open()
  {
    $this->dbc = new MYSQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
      OR die('Could not connect to database.');

    return true;
  }

  private function close()
  {
    return $this->dbc->close();
  }

  private function read($sid)
  {
    $q = "SELECT `data` FROM `sessions` WHERE `id` = '".$this->dbc->real_escape_string($sid)."' LIMIT 1";
    $r = $this->dbc->query($q);

    if($r->num_rows == 1)
    {
      $fields = $r->fetch_assoc();

      return $fields['data'];
    }
    else
    {
      return '';
    }
  }

  private function write($sid, $data)
  {
    $q = "REPLACE INTO `sessions` (`id`, `data`) VALUES ('".$this->dbc->real_escape_string($sid)."', '".$this->dbc->real_escape_string($data)."')";
    $this->dbc->query($q);

    return $this->dbc->affected_rows;
  }

  private function destroy($sid)
  {
    $q = "DELETE FROM `sessions` WHERE `id` = '".$this->dbc->real_escape_string($sid)."'";
    $this->dbc->query($q);

    $_SESSION = array();

    return $this->dbc->affected_rows;
  }

  private function clean($expire)
  {
    $q = "DELETE FROM `sessions` WHERE DATE_ADD(`last_accessed`, INTERVAL ".(int) $expire." SECOND) < NOW()";
    $this->dbc->query($q);

    return $this->dbc->affected_rows;
  }
} ?>
