<?php
include 'connection.php';

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) {
  header('Location: index.php');
  exit();
}

if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
  $id = trim($conn->real_escape_string($_SESSION['id']));
  $session_password = trim($conn->real_escape_string($_SESSION['password']));
  $old_password = trim($conn->real_escape_string($_POST['old_password']));
  $new_password = trim($conn->real_escape_string($_POST['new_password']));

  switch (true) {
    case empty($old_password):
      echo "Old password cannot be empty";
      exit;
    case empty($new_password):
      echo "New password cannot be empty";
      exit;
    default:
      if ($session_password === $old_password) {
        if ($old_password === $new_password) {
          echo "Old and New password cannot be the same";
        } else {
          $update_query = "UPDATE useraccount SET password = '$new_password' WHERE id = '$id'";
        }
      } else {
        echo "Invalid old password";
      }
  }

  if ($conn->query($update_query) === TRUE) {
    echo "Password updated successfully!";
  } else {
    echo "Error updating password" . $conn->error;
  }
}
