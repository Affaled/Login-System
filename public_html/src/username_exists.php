<?php
require_once 'open_database_connection.php';

function username_exists($username)
{
  $conn = open_database_connection();

  $check_user_query = "SELECT * FROM useraccount WHERE username = '$username'";
  $check_user_result = mysqli_query($conn, $check_user_query);

  $conn->close();
  if (mysqli_num_rows($check_user_result) > 0) {
    return true;
  } else {
    return false;
  }
}
