<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (name, age, gender, grade) VALUES ('$name', '$age', '$gender', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "تم تسجيل الطالب بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تسجيل الطلاب - تسجيل الطلاب</title>
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
        <h2>تسجيل الطلاب</h2>
        <form id="register-form"method="Post">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
            <label for="age">العمر:</label>
            <input type="number" id="age" name="age" required>
            <label for="gender">الجنس:</label>
            <select id="gender" name="gender" required>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
            <label for="grade">الصف:</label>
            <input type="text" id="grade" name="grade" required>
            <button type="submit">تسجيل</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>
