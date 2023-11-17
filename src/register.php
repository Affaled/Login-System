<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($_POST['password'] != $_POST['confirm_password']) {
    echo "Passwords do not match";
    exit;
  } elseif ($_POST['username'] == '') {
    echo "Username cannot be empty";
    exit;
  } elseif ($_POST['password'] == '') {
    echo "Password cannot be empty";
    exit;
  } else {
    $sql = "INSERT INTO useraccount (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: index.php");
    }
  }
}
