<?php
function open_database_connection()
{
  $host = 'localhost';
  $user = 'id21702436_admin';
  $password = 'Int3rn3+';
  $database = 'id21702436_useraccount';
  $connection = new mysqli($host, $user, $password, $database);

  return $connection;
}
