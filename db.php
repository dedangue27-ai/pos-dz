<?php
$host = 'localhost';
$db   = 'user_system';
$user = 'root';
$pass = ''; // ضع كلمة المرور الخاصة بقاعدة البيانات إن وجدت

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>