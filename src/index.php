<?php
include 'connection.php';
include 'login.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{Affaled} MySQL CRUD</title>
  <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
  <div class="container">
    <h1>Affaled CRUD Project</h1>
    <section class="enter">
      <div class="login">
        <p class="form_title">Login</p>
        <form name="login" method="POST" autocomplete="off">
          <p>
            <label>Username</label>
            <input type="text" name="username">
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="password">
          </p>
          <button type="submit">Login</button>
        </form>
      </div>
      <div class="register">
        <p class="form_title">Register</p>
        <form name="register" method="POST" autocomplete="off">
          <p>
            <label>Username</label>
            <input type="text" name="username">
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="password">
          </p>
          <p>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password">
          </p>
          <button type="submit">Register</button>
        </form>
      </div>
    </section>
  </div>
</body>

</html>