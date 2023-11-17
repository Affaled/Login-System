<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  switch (true) {
    case $username == '':
      echo "Username cannot be empty";
      exit;
    case $password == '':
      echo "Password cannot be empty";
      exit;
    case $password != $_POST['confirm_password']:
      echo "Passwords do not match";
      exit;
    default:
      $sql = "INSERT INTO useraccount (username, password) VALUES ('$username', '$password')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        header("Location: index.php");
      }
      exit;
  }
}
