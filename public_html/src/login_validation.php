<?php

function login_validation($username, $password)
{
  if (empty($username) || empty($password)) {
    return ["ok" => false, "message" => "Password and username cannot be empty"];
  }
  return ["ok" => true];
}
