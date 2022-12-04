<?php
// Starting the session.
session_start();
// Checking if the user has logged in, redirecting to home page if is.
if (isset($_SESSION['user_has_logged_in'])) {
	header('Location: home.php');
	exit;
}
?>

<!doctype html>
<html lang="en-US">
  <head>
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta name="description" content="This is an attempt of a beginner to
    code a functioning filehosting page.">
    <title>Filehosting</title>
  </head>
  <body>
    <div class="nav-bar">
      <header>
        <nav>
          <a href="index.php">+Log in/Register+</a>&emsp;
          <a href="home.php">+User page+</a>&emsp;
          <a href="logout.php">+Log out+</a><br><br>
          <a href="fileupload.php">+File upload+</a>&emsp;
          <a href="filelist.php">+File list+</a>&emsp;
        </nav>
      </header>
    </div>
    <div class="main-text-bar">
      <h1>Welcome to our filehosting service!</h1>
    </div>
    <div class="login-form">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Your username" id="username" required>
            <input type="password" name="password" placeholder="Your password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class="registration-form">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Your username" id="username" required>
            <input type="password" name="password" placeholder="Your password" id="password" required>
            <input type="submit" value="Register">
        </form>
    </div>
    <div class="sticky-footer">
      <footer>
        <p>Filehosting 2022</p>
      </footer>
    </div>
  </body>
</html>
