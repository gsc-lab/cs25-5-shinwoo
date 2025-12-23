<?php
$conn = mysqli_connect("db", "root", "root", "lswcd");
if (!$conn) {
    die("DB 연결 실패");
}
session_start();
?>