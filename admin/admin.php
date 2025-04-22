<!DOCTYPE html>
<html>
<head>
    <title>صفحة الإدارة</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminn.css">
    <meta charset="UTF-8">

</head>
<body>
    <div class="welcome-message">
        <p>مرحباً بك في صفحة الإدارة</p>
        
    </div>
    <form action="admin_post.php" method="post">

        
    <div id="add-student", class="add-student">
        <h2>إضافة طالب</h2>

        <form id="addStudentForm">
            <input type="text" name="student_name" placeholder="اسم الطالب"required>
            <input type="text" name="user" placeholder="اسم المستخدم"required>
            <input type="text" name="pass" placeholder=" كلمة السر"required>
            <!-- <input type="text" name="student_id" placeholder="معرف الطالب يترك فارغ"> -->
            <input type="text" name="subj1" placeholder="(المادة الاولى)"   required>
            <input type="text" name="subj2" placeholder="(المادة الثانية)" required>
            <input type="text" name="subj3" placeholder="(المادة الثالثة)" required>
            <input type="text" name="subj4" placeholder="(المادة الرابعه)" required>
            <input type="text" name="subj5" placeholder="(المادة الخامسة)" required>
            <input type="text" name="subj6" placeholder="(المادة السادسة)" required>
            <input type="text" name="subj7" placeholder="(المادة السابعه)" required>
            <input type="text" name="subj8" placeholder="(المادة الثامنه)" required>
            <button type="submit">إضافة</button>
        
            
        </form> 

    </div>

    <div id="showd", class="showd">
   <button  name="show" id="show">اضافة طالب جديد</button> 
    </div>

    <form action="search_post.php" method="post">
    <div class="search-student">
        <h2>البحث عن طالب</h2>
        <input type="text" id="student_name" name="student_name" placeholder="اسم الطالب">
        <button type="submit" name="submit" id="submit">بحث</button> 
    </div>
   </form>
   
   
   </form>

    <div id="studentTableContainer" style="display: none;">
        <h2>معلومات الطالب</h2>
        <table id="basic">
            <thead>
                <tr>
                    <th>معرف الطالب</th>
                    <th>اسم الطالب</th>
                    <th>المواد</th>
                </tr>
            </thead>
            <tbody>
                </tbody>
        </table>
    </div>
   
<script src="admin.js"></script>
</body>
</html>