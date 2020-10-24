<?php

require 'session.php'; //Rex Platt 10/21/2020
require 'dbcon.php'; //Rex Platt 10/21/2020

//check to see if the data was submitted
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
  exit(header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/register_user.php?completeForm')); //<!---Rex Platt 10/23/2020--->
}
//Make sure that the registration values are not empty
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
  exit(header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/register_user.php?completeForm')); //<!---Rex Platt 10/23/2020--->
}

//prepare SQL to check username and password
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  //Bind parameters (s= string i = int b= blob etc), in our case the username ins a string so we use "s"
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  //store the result so we can check if the account exists
  $stmt->store_result();


  if ($stmt->num_rows > 0) {
    exit(header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/register_user.php?usernameExists')); //<!---Rex Platt 10/23/2020--->
  } else {
    //insert the new account

    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $uniqid = uniqid(); //makes a unique id 
      $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid); //Pay attention to the 'sss' part of the statement
      $stmt->execute();

      //send an email to the new user
      $from = "rexplatt@mail.weber.edu";
      $subject = "Account Activation Required";
      $headers = 'From: ' . $from . "\r\n" . 'Reply-To: '
        . $from . "\r\n" . 'X-Mailer: PHP/'
        . phpversion() . "\r\n" . 'MIME-Version: 1.0'
        . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $activation_link = 'http://icarus.cs.weber.edu/~rp15643/web3400/project4/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid; //Rex Platt 10/21/2020
      $message = '<p>Please click the following link to activate your account: <a href="' . $activation_link . '">' . $activation_link . '</a></p>';
      mail($_POST['email'], $subject, $message, $headers);

      header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/register_success.php?email=' . $_POST['email']); //Rex Platt 10/23/2020
    } else {
      header('location: register_fail.html'); //Rex Platt 10/21/2020
    }
  }
  $stmt->close();
} else {
  header('location: register_fail.html'); //Rex Platt 10/21/2020
}
$con->close();
