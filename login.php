<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // يجب استخدام استعلامات التحضير لتفادي ثغرات الأمان
    $sql = "INSERT INTO students1 (username, password) VALUES (?, ?)";
    
    // إعداد الاستعلام
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo "تم تسجيل الطالب بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تسجيل الطلاب - تسجيل الدخول</title>
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

    <div class="container">
        <h2>تسجيل الدخول</h2>
        <form id="login-form"method="Post">
            <label for="username">اسم المستخدم:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">دخول</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>
