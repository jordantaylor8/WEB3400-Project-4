<?php

require 'dbcon.php';//Rex Platt 10/21/2020


if (isset($_GET['email'], $_GET['code'])){
 if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code= ?')){
  //Bind parameters (s= string i = int b= blob etc), in our case the username ins a string so we use "s"
  $stmt->bind_param('ss', $_GET['email'], $_GET['code']);
  $stmt->execute();
  //store the result so we can check if the account exists
  $stmt->store_result();
  

  if($stmt->num_rows > 0){
    if($stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code=?')){
      $newcode= 'activated';
      $stmt->bind_param('sss', $newcode,$_GET['email'], $_GET['code']);//Pay attention to the 'sss' part of the statement
      $stmt->execute();
      header('location: activate_post.html');//Rex Platt 10/21/2020
  }else{
    header('location: register_fail.html');//Rex Platt 10/21/2020
    }
  }
 }
}
  $stmt->close();
 
?>

