<?php
include 'connection.php';

if (isset($_POST['username']) || isset($_POST['password'])) {

  if (strlen($_POST['username']) == 0) {
    echo 'Please enter username';
  } else if (strlen($_POST['password']) == 0) {
    echo 'Please enter password';
  } else {

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM useraccount WHERE username = '$username' AND password = '$password'";
    $sql_query = $conn->query($sql);

    if ($sql_query->num_rows > 0) {
      $user = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['id'] = $user['id'];

      header('Location: home.php');
    } else {
      echo 'Invalid username or password';
    }
  }
}

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
        <form action="" method="POST">
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
        <form action="" method="POST">
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