<?php
session_start();

unset($_SESSION['student_num']);
unset($_SESSION['name']);
unset($_SESSION['password']);

// 로그인 페이지로 이동
header("Location: login.php");
exit;