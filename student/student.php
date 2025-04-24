<!DOCTYPE html>
<html>
<head>
    <title>صفحة الطالب</title>
    <link rel="stylesheet" href="ststylee.css">
</head>
<body>
<?php
// الاتصال بقاعدة البيانات
$servername = "Driver={MySQL ODBC 8.0 UNICODE Driver};Server=MYSQL1002.site4now.net;Database=db_ab8100_dbeps;Uid=ab8100_dbeps;Password=BF2fHLwra@h4seY
";
$username = "root";
$password = "19941994Ha";
$dbname = "dbeps";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

session_start();
$student_id = $_SESSION['id'];

$sql = "SELECT * FROM basic WHERE id = $student_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<form action="student/log_student.php" method="post">';
    echo '<div class="student-container">';
    echo '<h2>معلومات الطالب</h2>';
    echo '<p>اسم الطالب: ' . $row["student_name"] . '</p>';
    echo '<p>ID: ' . $row["id"] . '</p>';
    echo '<p> القسم الدراسي: تكنلوجيا المعلومات</p>';

    // التحقق من دفع الأقساط
    if ($row["installment1"] && $row["installment2"] && $row["installment3"] && $row["installment4"]) {
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
    } else {
        echo '<p style="color:red; font-size:18px; margin-top:20px;">يرجى تسديد جميع الأقساط لعرض الدرجات.</p>';
    }

    echo '</div>';
    echo '</form>';
} else {
    echo "لم يتم العثور على بيانات الطالب.";
}

$conn->close();
?>
</body>
</html>
