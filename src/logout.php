<?php
session_start();
$_SESSION = [];
session_destroy();

echo "<script>alert('로그아웃 완료');location.href='main.php'</script>";
exit;
?>