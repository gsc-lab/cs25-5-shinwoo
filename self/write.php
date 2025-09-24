<?php
session_start();
if (!isset($_SESSION['student_num'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>글 작성</title></head>
<body>
<h2>글 작성</h2>
<form action="write_process.php" method="post">
    제목: <input type="text" name="title" required><br>
    내용: <textarea name="content" required></textarea><br>
    <button type="submit">작성</button>
</form>
</body>
</html>
