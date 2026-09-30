<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];

// جلب مفتاح التفعيل
$stmt = $conn->prepare("SELECT activation_key FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($activationKey);
$stmt->fetch();
$stmt->close();

// إذا لم يكن موجوداً، يتم توليده وعرضه هنا فقط داخل الداشبورد
if (empty($activationKey)) {
    $activationKey = "ACT-" . strtoupper(bin2hex(random_bytes(4))) . "-" . strtoupper(bin2hex(random_bytes(4)));

    $updateStmt = $conn->prepare("UPDATE users SET activation_key = ? WHERE id = ?");
    $updateStmt->bind_param("si", $activationKey, $userId);
    $updateStmt->execute();
    $updateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <style>
        body { font-family: Tahoma, sans-serif; background: #f4f4f9; padding: 30px; text-align: center; }
        .dashboard-card { background: #fff; padding: 40px; border-radius: 8px; width: 500px; margin: auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .key-box { background: #e9ecef; padding: 15px; font-size: 20px; font-weight: bold; color: #333; border: 1px dashed #6c757d; margin: 20px 0; border-radius: 5px; word-break: break-all; }
        .logout-btn { background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 20px; }
        .logout-btn:hover { background: #c82333; }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <h1>مرحباً بك، <?php echo htmlspecialchars($username); ?>!</h1>
        <p>هذه هي لوحة التحكم الخاصة بك.</p>
        
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">

        <h3>🔑 مفتاح التفعيل الخاص بك:</h3>
        <div class="key-box">
            <?php echo htmlspecialchars($activationKey); ?>
        </div>
        <p style="color: #666; font-size: 14px;">لا يظهر هذا المفتاح إلا من داخل لوحة التحكم الخاصة بحسابك فقط.</p>

        <br>
        <a href="logout.php" class="logout-btn">تسجيل الخروج</a>
    </div>
</body>
</html>