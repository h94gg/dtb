<?php
$servername = "Driver={MySQL ODBC 8.0 UNICODE Driver};Server=MYSQL1002.site4now.net;Database=db_ab8100_dbeps;Uid=ab8100_dbeps;Password=BF2fHLwra@h4seY
";
$username = "root";
$password = "19941994Ha";
$dbname = "dbeps";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn){
   // echo"HOLLY COW ";
}else{  die("Connection failed: " . mysqli_connect_error());}
?>
