<?php

class Database
{
  public $connection;

  public function __construct($config, $username = 'root', $password = 'evitaerc')
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_ERRMODE => PDO::FETCH_ASSOC,
    ]);
  }

  public function query($query)
  {
    $statement = $this->connection->prepare($query);

    $statement->execute();

    return $statement;
  }
}
