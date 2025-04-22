<?php

include("admin/inc1/conn.php");


if(isset($_POST["submit"])){
 
$student_id= stripcslashes(strtolower($_POST["student_id"]));
$student_pass=stripslashes($_POST["student_pass"]);

}