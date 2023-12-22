<?php
include 'open_database_connection.php';
include 'register_validation.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = trim($conn->real_escape_string($_POST['username']));
  $password = trim($conn->real_escape_string($_POST['password']));
  $confirm_password = trim($conn->real_escape_string($_POST['confirm_password']));

  $response_validation = register_validation($username, $password, $confirm_password);
  if ($response_validation["ok"]) {
    $conn = open_database_connection();

    $sql = "INSERT INTO useraccount (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    $conn->close();

    if ($result) {
      header("Location: ../index.php");
    } else {
      echo "Registration failed. Please try again later.";
    }
  } else {
    echo $response_validation["message"];
  }
}
