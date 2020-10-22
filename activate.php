<?php
//connect ot our database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'W01307309';
$DATABASE_PASS = 'Jordancs!';
$DATABASE_NAME = 'W01307309';
  
//try the connection to see if it works
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( isset($_GET['email'], $_GET['code']) ) {
 if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?')) {
  // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('ss', $_GET['email'], $_GET['code']);
  $stmt->execute();
  //store the result so we can check if the account exists
  $stmt->store_result();
  
  if ($stmt->num_rows > 0) {
    //unverified account exists for the email
    //update activation code
     if($stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
       $activated = 'activated';
      	$stmt->bind_param('sss', $activated, $_GET['email'], $_GET['code']);
      $stmt->execute();
    echo "Account successfully activated!";
  } else {
    echo "Could not activate account";
    }
 }
}
}