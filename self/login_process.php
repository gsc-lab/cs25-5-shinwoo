<?php
// login_process.php
session_start();
include 'db.php';

// 2. 사용자로부터 입력값 받기
// 학번, 비밀번호
$student_num = trim($_POST['student_num']);
$password = trim($_POST['password']);
// 3. 예외처리
// 3개의 입력값을 전부 입력 받았는지 확인. (하나라도 안받았으면 오류메시지 출력)
if ($student_num === '' || $password === '') {
    $_SESSION['error'] = "다 입력해줘..";
    header("Location: login.php");
    exit;
}
// DB에서 해당학번이 존재하는지 확인
$check = "SELECT * FROM users WHERE student_num = '$student_num'";
$result = $db_conn->query($check);

if ($result && $result->num_rows > 0) {
    // 해당 학번이 있다면
    $hashedpassword = $result->fetch_assoc();
    // 해시된 비번 검증
    if (password_verify($password, $hashedpassword['password'])) { 
        // 비번 맞음
        $_SESSION['student_num'] = $student_num;
        // 4. 로그인 성공 처리
        // main.php로 리다이렉트
        header("Location: main.php");
        exit;
    } else { // 비번 틀림
        $_SESSION['error'] = "비밀번호가 틀렸습니다.";
        header("Location: login.php");
        exit;
    }
} else {
    // 해당 학번 없음
    $_SESSION['error'] = "해당 학번이 존재하지 않습니다.";
    header("Location: login.php");
    exit;
}