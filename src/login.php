<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM useraccount WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      header("Location: home.php");
    } else {
      echo "Invalid username or password";
      exit;
    }
  } else {
    echo "All fields are required";
    exit;
  }
}
