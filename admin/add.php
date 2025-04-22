<?php

include('inc1/conn.php');

$student_name = $_POST['student_name'];
$student_id = $_POST['student_id'];
$subj1 = $_POST['subj1'];
$subj2 = $_POST['subj2'];
$subj3 = $_POST['subj3'];
$subj4 = $_POST['subj4'];
$subj5 = $_POST['subj5']; 
$subj6 = $_POST['subj6'];
$subj7 = $_POST['subj7'];
$subj8 = $_POST['subj8'];  


$sql = "INSERT INTO basic (student_id, student_name, subj1, subj2, subj3, subj4, subj5, subj6, subj7, subj8) VALUES ('$student_id', '$student_name', '$subj1, $subj2, $subj3, $subj4, $subj5, $subj6, $subj7, $subj8')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => "تمت إضافة الطالب بنجاح"]);
} else {
    echo json_encode(['message' => "حدث خطأ أثناء إضافة الطالب: " . $conn->error]);         

}

?>
