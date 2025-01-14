
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تسجيل الطلاب - عرض البيانات</title>
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
        <h2>عرض بيانات الطلاب</h2>
        <table>
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>العمر</th>
                    <th>الجنس</th>
                    <th>الصف</th>
                </tr>
            </thead>
            <tbody id="student-data">
            <?php
include 'db.php';


$sql = "SELECT name, age, gender, grade FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['age'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['grade'] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>لا توجد بيانات</td></tr>";
}

$conn->close();
?>
            </tbody>
        </table>
    </div>

    <script src="main.js"></script>
</body>
</html>
