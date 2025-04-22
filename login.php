<?php
session_start();

// معلومات الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة المرور لقاعدة البيانات
$dbname = "dbeps"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);
// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج البيانات من النموذج
    $username = $_POST['username']; // الرقم التسلسلي
    $password = $_POST['password']; // كلمة المرور

    // إعداد الاستعلام للبحث عن المستخدم
    $sql ="SELECT *FROM info1 WHERE user='$username' AND pass='$password'";
    
    $result = $conn->query($sql);
//  echo $result->num_rows;
//     التحقق من وجود المستخدم
     if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        $user_id =$row["id"];
      
        if ($user_id == 1) {
            header("Location: accounts/account.php");}
            elseif ($user_id == 2) {
                header("Location: admin/admin.php");}
                
                elseif ($user_id >= 3) {
                    session_start();
                    $_SESSION["id"] = $user_id;
                    header("Location: student/student.php");
                    exit();
                    header("Location: student/student.php");
        }
        
         exit();
         } else {
              //كلمة المرور غير صحيحة
             echo "كلمة المرور غير صحيحة.";
             exit();
         }
        
  $conn->close();
        }
?>