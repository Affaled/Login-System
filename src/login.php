<?php
include 'connection.php';

if (isset($_POST['username']) || isset($_POST['password'])) {

  if (strlen($_POST['username']) == 0) {
    echo 'Please enter username';
  } else if (strlen($_POST['password']) == 0) {
    echo 'Please enter password';
  } else {

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM useraccount WHERE username = '$username' AND password = '$password'";
    $sql_query = $conn->query($sql);

    if ($sql_query->num_rows > 0) {
      $user = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['id'] = $user['id'];

      header('Location: home.php');
    } else {
      echo 'Invalid username or password';
    }
  }
}
