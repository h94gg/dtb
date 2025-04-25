<!DOCTYPE html>
<html>
<head>
    <title>صفحة الطالب</title>
    <link rel="stylesheet" href="ssearch.css">
</head>
<body>
<?php
session_start();

// معلومات الاتصال بقاعدة البيانات
$servername = "Server=MYSQL1002.site4now.net;Database=db_ab8100_hayder0;Uid=ab8100_hayder0;Pwd=BF2fHLwra@h4seY";
$username = "root";
$password = "19941994Ha";
$dbname = "dbeps";


// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];

    // استعلام بدمج الجدولين عن طريق INNER JOIN
    $sql = "SELECT basic.*, info1.*
            FROM basic
            INNER JOIN info1 ON basic.id = info1.id
            WHERE basic.student_name = '$student_name'";

    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();

        echo '<div class="student-container">';
        echo '<h2>معلومات الطالب</h2>';
        echo '<p> اسم الطالب : ' . $row["student_name"] . '</p>';
        echo '<p>اسم المستخدم : ' . $row["user"] . '</p>';
        echo '<p>كلمة السر: ' . $row["pass"] . '</p>';
        echo '<p>القسم الدراسي: تكنلوجيا المعلومات</p>';

        echo '<h2>جدول الدرجات</h2>';
        echo '<table>';
        echo '<thead>';
        echo '<tr><th>المادة</th><th>الدرجة</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        for ($i = 1; $i <= 8; $i++) {
            echo '<tr>';
            echo '<td>المادة ' . $i . '</td>';
            echo '<td>' . $row["subj" . $i] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        // حساب المعدل التراكمي
        $total = 0;
        $count = 0;
        for ($i = 1; $i <= 8; $i++) {
            if (!empty($row["subj" . $i])) {
                $total += $row["subj" . $i];
                $count++;
            }
        }
        if ($count > 0) {
            $gpa = $total / $count;
            echo '<p>المعدل التراكمي: ' . number_format($gpa, 2) . '</p>';
        } else {
            echo '<p>المعدل التراكمي: غير متاح</p>';
        }

        // echo '<a href="#">الجدول الدراسي</a>';
        // echo '<a href="student.html">الملف الشخصي</a>';
        // echo '<a href="DTP/index.html">تسجيل الخروج</a>';
        echo '</div>';

    } else {
        echo "لا توجد نتائج";
    }
    $conn->close();
}
?>
</body>
</html>
