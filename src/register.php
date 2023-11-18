<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = trim($conn->real_escape_string($_POST['username']));
  $password = trim($conn->real_escape_string($_POST['password']));

  switch (true) {
    case empty($usrname):
      echo "Username cannot be empty";
      exit;
    case empty($password):
      echo "Password cannot be empty";
      exit;
    case $password != $_POST['confirm_password']:
      echo "Passwords do not match";
      exit;
    case strlen($password) < 8 || strlen($password) > 32:
      echo "Password must be between 8 and 32 characters";
      exit;
    case strlen($username) < 3 || strlen($username) > 12:
      echo "Username must be between 3 and 12 characters";
      exit;
    default:
      $check_user_query = "SELECT * FROM useraccount WHERE username = '$username'";
      $check_user_result = mysqli_query($conn, $check_user_query);
      if (mysqli_num_rows($check_user_result) > 0) {
        echo "Username already exists";
        exit;
      } else {
        $sql = "INSERT INTO useraccount (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          header("Location: index.php");
        } else {
          echo "Registration failed. Please try again later.";
        }
      }
      exit;
  }
}
