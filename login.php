<?php
// Starting the session.
session_start();
// Naming variables with default PHPMyAdmin MySQL connection data.
$DATABASE_HOSTNAME = 'localhost';
$DATABASE_USERNAME = 'root';
$DATABASE_PASSWORD = '';
$DATABASE_NAME = 'myproject';
// Connecting to DB.
$mysqlconnection = mysqli_connect($DATABASE_HOSTNAME, $DATABASE_USERNAME, 
$DATABASE_PASSWORD, $DATABASE_NAME);

// Quick check to ensure that both login fields are filled.
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Error, please fill both login fields.');
}

// Starting with quering the username from our 'accounts' table.
if ($sentquery = $mysqlconnection->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // Binding the username as a string.
	$sentquery->bind_param('s', $_POST['username']);
	$sentquery->execute();
	// Storing the last query.
	$sentquery->store_result();
    // Going ahead only if the username exists in the 'accounts' table.
    if ($sentquery->num_rows > 0) {
        $sentquery->bind_result($id, $password);
        $sentquery->fetch();
        // Going ahead with the password stage.
        if (password_verify($_POST['password'], $password)) {
            // Generating session ID, welcome message.
            session_regenerate_id();
            $_SESSION['user_has_logged_in'] = TRUE;
            $_SESSION['session_name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: home.php');
        } else {
            // Error notification.
            echo 'Correct username but wrong password!';
        }
    } else {
        // Error notification.
        echo 'Incorrect username!';
    }
    // Closing DB connection.
	$sentquery->close();
}
?>