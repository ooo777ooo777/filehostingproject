<?php
// Naming variables with default PHPMyAdmin MySQL connection data.
$DATABASE_HOSTNAME = 'localhost';
$DATABASE_USERNAME = 'root';
$DATABASE_PASSWORD = '';
$DATABASE_NAME = 'myproject';

// Connecting to DB.
$mysqlconnection = mysqli_connect($DATABASE_HOSTNAME, $DATABASE_USERNAME, 
$DATABASE_PASSWORD, $DATABASE_NAME);

// Quick check to ensure that both registration fields are filled.
if (!isset($_POST['username'], $_POST['password'])) {
	exit('Error, please fill both registration fields.');
}

// Simple regex for better usernames.
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
  exit('Please enter a normal username!');
}
// Starting with quering the username from our 'accounts' table.
if ($sentquery = $mysqlconnection->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  // Binding the username as a string.
  $sentquery->bind_param('s', $_POST['username']);
  $sentquery->execute();
  // Storing the last query.
  $sentquery->store_result();
  if ($sentquery->num_rows > 0) {
		// The username exists, we have to alert the user.
		echo 'Username exists, please choose another!';
	} else {
		if ($sentquery = $mysqlconnection->prepare('INSERT INTO accounts (username, password) VALUES (?, ?)')) {
      // In case of DB leak, we atleast will hash our passwords.
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      // Set variables as three strings.
      $sentquery->bind_param('ss', $_POST['username'], $password);
      $sentquery->execute();
      echo 'User has been registered, login!';
	    }
  $sentquery->close();
}
$mysqlconnection->close();
}
?>