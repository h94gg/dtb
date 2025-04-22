<?php
// تضمين ملف اتصال قاعدة البيانات
require 'inc1/conn.php';

// التحقق من أن النموذج تم إرساله باستخدام طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من النموذج
    $student_name = $_POST['student_name'];
    
    $subj1 = $_POST['subj1'];
    $subj2 = $_POST['subj2'];
    $subj3 = $_POST['subj3'];
    $subj4 = $_POST['subj4'];
    $subj5 = $_POST['subj5'];
    $subj6 = $_POST['subj6'];
    $subj7 = $_POST['subj7'];
    $subj8 = $_POST['subj8'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // إدخال بيانات الطالب في جدول basic
    $sql_basic = "INSERT INTO basic (student_name, subj1, subj2, subj3, subj4, subj5, subj6, subj7, subj8)
                  VALUES ('$student_name', '$subj1', '$subj2', '$subj3', '$subj4', '$subj5', '$subj6', '$subj7', '$subj8')";

    if ($conn->query($sql_basic) === TRUE) {
        // الحصول على id الطالب الجديد
        $student_id = $conn->insert_id;

        // إدخال بيانات user و pass في جدول info1
        $sql_info = "INSERT INTO info1 (id, user, pass)
                     VALUES ('$student_id', '$user', '$pass')";

        if ($conn->query($sql_info) === TRUE) {
            echo "<h1>تم إضافة بيانات الطالب وبيانات الدخول بنجاح!</h1>";
        } else {
            echo "<h1>تمت إضافة بيانات الطالب لكن حدث خطأ في بيانات الدخول: " . $conn->error . "</h1>";
        }

    } else {
        echo "<h1>حدث خطأ أثناء إضافة بيانات الطالب: " . $conn->error . "</h1>";
    }

    // إغلاق الاتصال
    $conn->close();
} else {
    echo "<p>لم يتم إرسال أي بيانات.</p>";
}
?>