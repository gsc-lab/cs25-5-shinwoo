<?php
session_start();
include 'db.php';

// 2. 사용자로부터 입력값 받기
// 이름, 학번, 비밀번호
$student_num = ($_POST['student_num']);
$name = ($_POST['name']);
$password = ($_POST['password']);
// 3. 예외처리
// 3개의 입력값을 전부 입력 받았는지 확인. (하나라도 안받았으면 오류메시지 출력)
if ($student_num === '' || $name === '' || $password === '') {
    $_SESSION['error'] = "다 입력해줘..";
    header("Location: register.php");
    exit;
}

// 해당 학번에 대해 중복값 검사
$check = "SELECT * FROM users WHERE student_num = '$student_num'";
$result = $db_conn->query($check);
if ($result->num_rows > 0) {
    $_SESSION['error'] = "학번 중복";
    header("Location: register.php");
    exit;
}

// 4. 비밀번호 해싱
$password = password_hash($password, PASSWORD_DEFAULT);

// 5. 실행 후 결과 확인
$sql = "INSERT INTO users (student_num, password, name)
        VALUES ('$student_num', '$password', '$name')";

if ($db_conn->query($sql)) {
    // 성공 -> login.php로 리다이렉트
    $db_conn->close();
    header("Location: login.php");
    exit;
} else { // 실패 -> 오류 메시지 출력
    $_SESSION['error'] = "에러임";
    header("Location: register.php");
    exit;
}