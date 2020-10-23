<?php
//<!---Rex Platt 10/21/2020 --->
//Connect to database

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'W00215643';
$DATABASE_PASS = 'Rexcs!';
$DATABASE_NAME = 'W00215643';

//Try the connection
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_errno()){
  
  exit('Failed to connect to MySQL: '. mysqli_connect_error());
}
?>