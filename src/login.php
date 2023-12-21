<?php
include 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = trim($conn->real_escape_string($_POST['username']));
  $password = trim($conn->real_escape_string($_POST['password']));

  switch (true) {
    case empty($username):
      echo "Username cannot be empty";
      exit;
    case empty($password):
      echo "Password cannot be empty";
      exit;
    default:
      $check_user_query = "SELECT * FROM useraccount WHERE username = '$username'" . " AND password = '$password'";
      $check_user_result = mysqli_query($conn, $check_user_query);
      if (mysqli_num_rows($check_user_result) > 0) {
        $user = mysqli_fetch_assoc($check_user_result);

        if (!isset($_SESSION)) {
          session_start();
        }
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];


        header("Location: ../public_html/home.php");
      } else {
        echo "Invalid username or password";
      }
  }
}
