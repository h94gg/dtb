<?php
// add_user_post.php

// معلومات الاتصال بقاعدة البيانات
$servername = ""Server=MYSQL1002.site4now.net;Database=db_ab8100_hayder0;Uid=ab8100_hayder0;Pwd=BF2fHLwra@h4seY";
$username = "root";
$password = "19941994Ha";
$dbname = "dbeps";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من أن الطلب هو POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج البيانات من النموذج
    $student_id = $_POST['student_id'];
    $student_username = $_POST['student_username'];
    //$student_password = password_hash($_POST['student_password'], PASSWORD_DEFAULT); // تشفير كلمة المرور

    // إعداد الاستعلام باستخدام Prepared Statements
    $stmt = $conn->prepare("INSERT INTO info (student_id, student_username, student_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_id, $student_username, $student_password);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo "added successfully";
    } else {
        echo "حدث خطأ أثناء التسجيل: " . $stmt->error;
    }

    // إغلاق Prepared Statement
    $stmt->close();
}

// إغلاق الاتصال
$conn->close();
?>
