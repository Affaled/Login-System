<?php
include 'src/login.php';
include 'src/register.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{Affaled} MySQL CRUD</title>
  <link rel="stylesheet" href="src/styles/index.css" type="text/css">
</head>

<body>
  <div class="container">
    <h1>Affaled CRUD Project</h1>
    <section class="enter">
      <div class="login">
        <p class="form_title">Login</p>
        <form action="src/login.php" name="login" method="POST" autocomplete="off">
          <p>
            <label for="login_username">Username</label>
            <input type="text" name="username" id="login_username">
          </p>
          <p>
            <label for="login_password">Password</label>
            <input type="password" name="password" id="login_password">
          </p>
          <button type="submit">Login</button>
        </form>
      </div>
      <div class="register">
        <p class="form_title">Register</p>
        <form action="src/register.php" name="register" method="POST" autocomplete="off">
          <p>
            <label for="register_username">Username</label>
            <input type="text" name="username" id="register_username">
          </p>
          <p>
            <label for="register_password">Password</label>
            <input type="password" name="password" id="register_password">
          </p>
          <p>
            <label for="register_confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="register_confirm_password">
          </p>
          <button type="submit">Register</button>
        </form>
      </div>
    </section>
  </div>
</body>

</html>