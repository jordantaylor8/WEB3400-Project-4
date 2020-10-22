<?php
session_start();

//connect ot our database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'W01307309';
$DATABASE_PASS = 'Jordancs!';
$DATABASE_NAME = 'W01307309';
  
//try the connection to see if it works
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( !isset($_POST['username'], $_POST['password'], $_POST['email']) ) {
  //could not get the form data that should have been sent
  exit('Please complete the registration form!');
}

if ( empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
  //one or more fields are empty
  exit('Please complete the registration form');
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
    //user already exists
    echo "Username already exists, please choose another!";
  } else {
    //insert the new account
    //echo "good job";
    if($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $uniqid = uniqid();
      $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid);
      $stmt->execute();
      echo "the record went in";
      
      $from = "jordantaylor8@mail.weber.edu";
      $subject = "Account Activation Required";
      $headers = 'From: ' . $from . "\r\n" . 
          'Reply-To: '. $from . "\r\n" . 
          'X-Mailer: PHP/' . phpversion() . "\r\n" .
          'MIME-Version: 1.0'. "\r\n" . 
          'Content-Type: text/html; charset=UTF-8' . "\r\n";
      $activation_link = 'http://icarus.cs.weber.edu/~jt07309/web3400/project3/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
      $message = '<p>Please click the following link to activate your account:</p> <a href="' . $activation_link . '">' . $activation_link . '</a></p>';
      
      mail($_POST['email'], $subject, $message, $headers);
      echo "your message was sent";
    } else {
      echo 'Could not prepare statement!';
    }
  }
  
    $stmt->close();
  } else {
    //something wrong
    echo 'Could not prepare statement!';
    
    
  }
$con->close();
?>