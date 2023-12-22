<?php

function change_username_validation($new_username, $session_username)
{
  if (empty($new_username)) {
    return ["ok" => false, "message" => "New username cannot be empty"];
  }
  if ($new_username == $session_username) {
    return ["ok" => false, "message" => "The new username cannot be the same as the current one"];
  }
  return ["ok" => true];
}

function change_password_validation($old_password, $new_password, $session_password)
{
  if (empty($old_password) || empty($old_password)) {
    return ["ok" => false, "message" => "Passwords cannot be empty"];
  }
  if ($old_password === $new_password) {
    return ["ok" => false, "message" => "Old and New password cannot be the same"];
  }
  if ($session_password != $old_password) {
    return ["ok" => false, "message" => "Invalid old password"];
  }
  return ["ok" => true];
}
