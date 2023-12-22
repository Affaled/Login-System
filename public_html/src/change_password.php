<?php
require_once 'open_database_connection.php';
require_once 'change_data_validation.php';

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}

if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
  $conn = open_database_connection();

  $id = trim($conn->real_escape_string($_SESSION['id']));
  $session_password = trim($conn->real_escape_string($_SESSION['password']));
  $old_password = trim($conn->real_escape_string($_POST['old_password']));
  $new_password = trim($conn->real_escape_string($_POST['new_password']));

  $conn->close();

  $response_validation = change_password_validation($old_password, $new_password, $session_password);
  if ($response_validation["ok"]) {
    $conn = open_database_connection();

    $update_query = "UPDATE useraccount SET password = '$new_password' WHERE id = '$id'";
  }

  $conn = open_database_connection();

  if ($conn->query($update_query) === TRUE) {
    echo "Password updated successfully!";
  } else {
    echo "Error updating password" . $conn->error;
  }

  $conn->close();
}
