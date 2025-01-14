<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تعديل بيانات الطالب
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];

    $sql = "UPDATE students SET name=?, age=?, gender=?, grade=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissi", $name, $age, $gender, $grade, $id);

    if ($stmt->execute()) {
        echo "تم تحديث بيانات الطالب بنجاح";
    } else {
        echo "خطأ: " . $stmt->error;
    }

    $stmt->close();
} elseif (isset($_GET['id'])) {
    // استرجاع بيانات الطالب للتعديل
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "لا توجد بيانات لهذا الطالب.";
    }
    $stmt->close();
} else {
    echo "معرّف الطالب غير موجود.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تسجيل الطلاب - تعديل البيانات</title>
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
        <h2>تعديل بيانات الطالب</h2>
        <form id="edit-form" method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo isset($student) ? $student['id'] : ''; ?>">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($student) ? $student['name'] : ''; ?>" required>
            <label for="age">العمر:</label>
            <input type="number" id="age" name="age" value="<?php echo isset($student) ? $student['age'] : ''; ?>" required>
            <label for="gender">الجنس:</label>
            <select id="gender" name="gender" required>
                <option value="ذكر" <?php if (isset($student) && $student['gender'] == 'ذكر') echo 'selected'; ?>>ذكر</option>
                <option value="أنثى" <?php if (isset($student) && $student['gender'] == 'أنثى') echo 'selected'; ?>>أنثى</option>
            </select>
            <label for="grade">الصف:</label>
            <input type="text" id="grade" name="grade" value="<?php echo isset($student) ? $student['grade'] : ''; ?>" required>
            <button type="submit">حفظ التعديلات</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>

