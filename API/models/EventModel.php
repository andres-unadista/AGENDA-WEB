<?php

class EventModel
{
  private $connection;

  public function __construct()
  {
    $this->connection = Database::getConnection();
  }

  public function getEvents()
  {
    $sql = 'SELECT * FROM event ORDER BY id DESC';
    $sth = $this->connection->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
  }

  public function registerEvent(array $event)
  {
    $sql = 'INSERT INTO event(title, date, url) VALUES (:title,:date,:url)';
    $sth = $this->connection->prepare($sql);
    $sth->bindParam('title', $event['title'], PDO::PARAM_STR);
    $sth->bindParam('date', $event['date'], PDO::PARAM_STR);
    $sth->bindParam('url', $event['url'], PDO::PARAM_STR);
    $sth->execute();
    $registered = $this->connection->lastInsertId();
    return $registered;
  }

  
  public function getEvent(int $id)
  {
    $sql = 'SELECT * FROM event WHERE id=:id';
    $sth = $this->connection->prepare($sql);
    $sth->bindParam('id', $id, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch();
  }

 
}
