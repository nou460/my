<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تسجيل الطلاب - الصفحة الرئيسية</title>
    <?php if(isset($_COOKIE['user']))
        {?>
        <h1>Hi,<?php echo $_COOKIE['user']?> مرحبا بك في مدرستنا</h1>
        <?php } ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="path/to/your/logo.png" alt="شعار المدرسة" />
        </div>
        <ul>
            <li><a href="index.php">الرئيسية</a></li>
            <li><a href="login.php">تسجيل الدخول</a></li>
            <li><a href="register.php">تسجيل الطلاب</a></li>
            <li><a href="view.php">عرض البيانات</a></li>
            <li><a href="edit.php">تعديل البيانات</a></li>
        </ul>
    </nav>

    <div class="welcome-container">
        <h1>مرحباً بكم في نظام تسجيل الطلاب</h1>
        <p>التعليم هو الأساس لتقدم المجتمع وتطوره. من خلال التعليم، نبني جيلاً واعياً ومؤهلاً لمواجهة تحديات المستقبل وتطوير الأمة.</p>
        <p>تقدم المدارس في مجالات التعليم الحديث يوفر للطلاب الفرص الكبيرة لاكتساب المهارات والمعارف اللازمة للتميز في حياتهم الشخصية والمهنية.</p>
    </div>

    <script src="main.js"></script>
</body>
</html>
