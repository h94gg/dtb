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

// تحديث الأقساط عند الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['installments'] as $student_id => $payments) {
        $i1 = isset($payments[1]) ? 1 : 0;
        $i2 = isset($payments[2]) ? 1 : 0;
        $i3 = isset($payments[3]) ? 1 : 0;
        $i4 = isset($payments[4]) ? 1 : 0;

        $update_sql = "UPDATE basic SET 
            installment1 = $i1, 
            installment2 = $i2, 
            installment3 = $i3, 
            installment4 = $i4 
            WHERE id = $student_id";
        $conn->query($update_sql);
    }
    echo "<p class='success-message'>تم تحديث الأقساط بنجاح!</p>";
}

// جلب بيانات الطلاب (مع استثناء id = 1 و 2)
$sql = "SELECT * FROM basic WHERE id NOT IN (1, 2)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>صفحة الحسابات</title>
    <link rel="stylesheet" href="accountt.css">
</head>
<body>
<div class="welcome-message">
        <p>مرحباً بك في صفحة الحسابات</p>
        
    </div>

<form method="post">
    <table>
        <tr>
            <th>اسم الطالب</th>
            <th>القسط 1</th>
            <th>القسط 2</th>
            <th>القسط 3</th>
            <th>القسط 4</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['student_name'] . '</td>';
                for ($i = 1; $i <= 4; $i++) {
                    $checked = $row['installment' . $i] ? 'checked' : '';
                    echo '<td><input type="checkbox" name="installments[' . $row['id'] . '][' . $i . ']" ' . $checked . '></td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">لا توجد بيانات</td></tr>';
        }
        ?>

    </table>

    <input type="submit" value="حفظ التغييرات">
</form>

</body>
</html>

<?php
$conn->close();
?>
