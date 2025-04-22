<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbeps";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn){
   // echo"HOLLY COW ";
}else{  die("Connection failed: " . mysqli_connect_error());}
?>