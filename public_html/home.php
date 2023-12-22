<?php
require_once 'src/change_username.php';
require_once 'src/change_password.php';

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/styles/index.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <section class="enter">
      <div class="change_username">
        <p class="form_title">Change username</p>
        </p>
        <form action="src/change_username.php" name="change_username" method="POST" autocomplete="off">
          <p>
            <label for="new_username">New username</label>
            <input type="text" name="new_username" id="new_username">
          </p>
          <button type="submit">Change</button>
        </form>
      </div>
      <div class="change_password">
        <p class="form_title">Change password</p>
        <form action="src/change_password.php" name="change_password" method="POST" autocomplete="off">
          <p>
            <label for="old_password">Old password</label>
            <input type="password" name="old_password" id="old_password">
          </p>
          <p>
            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password">
          </p>
          <button type="submit">Change</button>
        </form>
      </div>
    </section>
    <a href="src/logout.php"><button>Logout</button></a>
  </div>
</body>

</html>