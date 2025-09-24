<?php
session_start();
include 'db.php';

if (!isset($_SESSION['student_num'])) {
    header("Location: login.php");
    exit;
}

$title = trim($_POST['title']);
$content = trim($_POST['content']);

if ($title === '' || $content === '') {
    die("제목과 내용을 입력하세요.");
}

$student_num = $_SESSION['student_num'];
$res = $db_conn->query("SELECT id FROM users WHERE student_num='$student_num'");
$user = $res->fetch_assoc();
$user_id = $user['id'];

$stmt = $db_conn->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $title, $content);
$stmt->execute();
$stmt->close();

header("Location: main.php");
exit;
