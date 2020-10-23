<?php

require 'session.php';//Rex Platt 10/21/2020
require 'dbcon.php';//Rex Platt 10/21/2020

if (!isset($_POST['username'],$_POST['password'])){
  exit('Please fill out both the username and the password fields.');
} 

//prepare SQL to check username and password
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')){
  //Bind parameters (s= string i = int b= blob etc), in our case the username ins a string so we use "s"
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  //store the result so we can check if the account exists
  $stmt->store_result();
  

  if($stmt->num_rows > 0){
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    //Account exists, verify the password
    //Note: Remember to use password_hash in your registration file to store the hashed password.
    if(password_verify($_POST['password'], $password)){
      session_regenerate_id();
      $_SESSION['loggedin']= TRUE;
      $_SESSION['name']= $_POST['username'];
      $_SESSION['id']= $id;
      //echo 'Welcome'. $_SESSION[' name'] . '!';
     header('location: home.php');
    } else {
      //if incorrect
      header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/index.php?password');//Rex Platt 10/23/2020
    }
  }else{
   header('location: http://icarus.cs.weber.edu/~rp15643/web3400/project4/index.php?username');//Rex Platt 10/23/2020
  }
  $stmt->close();
}
?>