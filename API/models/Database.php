<?php

class Database
{
  private static $dbName = 'agenda';
  private static $host = 'localhost';
  private static $password = 'novaru';
  private static $user = 'nova';
  private static $conn;

  public function __construct()
  {
  }

  public static function getConnection()
  {
    try {
      $dbOptions = [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ERRMODE_EXCEPTION => \PDO::ERRMODE_EXCEPTION,
      ];

      $dns = sprintf('mysql:dbname=%s;host=%s', self::$dbName, self::$host);
      self::$conn = new \PDO($dns, self::$user, self::$password, $dbOptions);
      self::$conn->exec('SET CHARACTER UTF8');
      return self::$conn;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
