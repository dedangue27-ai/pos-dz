<?php
session_start();
require_once 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = "الرجاء ملء جميع الحقول.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            $success = "تم إنشاء الحساب بنجاح! يمكنك <a href='login.php'>تسجيل الدخول الآن</a>.";
        } else {
            $error = "اسم المستخدم أو البريد الإلكتروني مستخدم مسبقاً.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
    <style>
        body { font-family: Tahoma, sans-serif; background: #f4f4f9; padding: 50px; text-align: center; }
        .form-container { background: #fff; padding: 30px; border-radius: 8px; width: 350px; margin: auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background: #218838; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>إنشاء حساب جديد</h2>
        <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if(!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">تسجيل</button>
        </form>
        <p>لديك حساب بالفعل؟ <a href="login.php">سجل الدخول</a></p>
    </div>
</body>
</html>