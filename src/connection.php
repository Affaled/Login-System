<?php
$host = 'localhost:3306';
$user = 'root';
$password = '';
$database = 'mysql-course';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_errno) {
  echo "conexão falhou (" . $conn->connect_errno . ") " . $conn->connect_error;
}
