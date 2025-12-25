<?php include "db.php"; ?>

<h1>회원가입</h1>

<form method="post">
    아이디: <input type="text" name="user_id"><br>
    비밀번호: <input type="password" name="user_pw"><br>
    <button type="submit">가입</button>
</form>

<?php
if ($_POST) {
    $id = $_POST['user_id'];
    if (empty($_POST['user_id']) || empty($_POST['user_pw'])) {
    echo "아이디와 비밀번호를 모두 입력해주세요.";
    exit;
    }   
    $pw = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
    if (mysqli_num_rows($check) > 0) {
        echo "이미 존재하는 아이디입니다";
    } else {
        mysqli_query($conn, "INSERT INTO users(user_id, user_pw) VALUES('$id','$pw')");
        echo "<script>alert('가입 완료'); location.href='login.php'</script>";
    }
}

?>