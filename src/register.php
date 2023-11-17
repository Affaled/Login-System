<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  switch (true) {
    case empty(trim($username)):
      echo "Username cannot be empty";
      exit;
    case empty(trim($password)):
      echo "Password cannot be empty";
      exit;
    case $password != $_POST['confirm_password']:
      echo "Passwords do not match";
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
        }
      }
      exit;
  }
}
