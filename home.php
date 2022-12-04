<?php
// Starting the session.
session_start();
// Checking if the user has logged in, redirecting to login page if not.
if (!isset($_SESSION['user_has_logged_in'])) {
	header('Location: index.php');
	exit;
}
?>

<!doctype html>
<html>
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
      <p>This is your user page, <?=$_SESSION['session_name']?>!</p>
    </div>
  </body>
</html>
