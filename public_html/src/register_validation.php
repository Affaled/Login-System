<?php
require_once 'username_exists.php';

function register_validation($username, $password, $confirm_password)
{
  if (empty($username) || empty($password)) {
    return ["ok" => false, "message" => "Password and username cannot be empty"];
  }
  if ($password != $confirm_password) {
    return ["ok" => false, "message" => "Passwords do not match"];
  }
  if (strlen($password) < 8 || strlen($password) > 32) {
    return ["ok" => false, "message" => "Password must be between 8 and 32 characters"];
  }
  if (strlen($username) < 3 || strlen($username) > 12) {
    return ["ok" => false, "message" => "Username must be between 3 and 12 characters"];
  }
  if (username_exists($username)) {
    return ["ok" => false, "message" => "Username already exists"];
  }
  return ["ok" => true];
}
