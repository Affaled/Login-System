<?php
include 'open_database_connection.php';

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}

if (isset($_POST['new_username'])) {
  $conn = open_database_connection();

  $id = trim($conn->real_escape_string($_SESSION['id']));
  $session_username = trim($conn->real_escape_string($_SESSION['username']));
  $new_username = trim($conn->real_escape_string($_POST['new_username']));

  $update_query = "UPDATE useraccount SET username = '$new_username' WHERE id = '$id'";

  if ($conn->query($update_query) === TRUE) {
    echo "Username updated successfully!";
  } else {
    echo "Error updating username" . $conn->error;
  }

  $conn->close();
}
