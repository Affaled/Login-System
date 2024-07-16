<?php
function open_database_connection()
{
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'useraccount';
  $connection = new mysqli($host, $user, $password, $database);

  return $connection;
}
