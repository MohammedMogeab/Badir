<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$now = time();
$ban_time = $_SESSION['ban_time'] ?? 1;

if ($ban_time < $now) {
    $remaining_minutes = ceil(($ban_time - $now) / 60);
    echo "🚫 تم حظرك مؤقتًا<br>⏳ حاول مرة أخرى بعد: $remaining_minutes دقيقة.";
}
 else {
    echo " لم يتم العثور على حظر أو أن مدة الحظر انتهت.";
    $remaining_minutes = ceil(($ban_time - $now) / 60);
    
}
?>
