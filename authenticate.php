<?php
session_start();

//connect ot our database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'W01307309';
$DATABASE_PASS = 'Jordancs!';
$DATABASE_NAME = 'W01307309';
  
//try the connection to see if it works
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
  //if there is an error stop and display error
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
  //could not get the form data that should have been sent
  exit('Please fill out both the username and password fields.');
}

// prepare a SQL statement to check the username and password
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  //store the result so we can check if the account exists
  $stmt->store_result();
  
  if ($stmt->num_rows > 0) {
  $stmt->bind_result($id, $password);
  $stmt->fetch();
  // Acct exists, verify password
  // Note: remember to use password_hash in your registration file to store the hashed passwords.
    if (password_verify($_POST['password'], $password)) {
      // Verification success! User has loggedin!
		  // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		  session_regenerate_id();
		  $_SESSION['loggedin'] = TRUE;
		  $_SESSION['name'] = $_POST['username'];
		  $_SESSION['id'] = $id;
		  echo 'Welcome ' . $_SESSION['name'] . '!';
      header('location: home.php');
  } else {
    //if incorrect password
      echo 'Incorrect password';
  }
  
} else {
  //if incorrect username
    echo 'Incorrect username';
}
  $stmt->close();
}
?>