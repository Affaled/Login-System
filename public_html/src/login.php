<?php
require_once 'open_database_connection.php';
require_once 'login_validation.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $conn = open_database_connection();

  $username = trim($conn->real_escape_string($_POST['username']));
  $password = trim($conn->real_escape_string($_POST['password']));

  $response_validation = login_validation($username, $password);
  if ($response_validation["ok"]) {
    $check_user_query = "SELECT * FROM useraccount WHERE username = '$username'" . " AND password = '$password'";
    $check_user_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
      $user = mysqli_fetch_assoc($check_user_result);

      $conn->close();

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];

      header("Location: ../home.php");
    } else {
      echo "Invalid username or password";
    }
  }
}
