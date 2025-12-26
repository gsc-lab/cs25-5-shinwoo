<?php include "db.php"; ?>

<?php
if ($_POST) {
    $id = $_POST['user_id'];
    $pw = $_POST['user_pw'];

    $sql = "SELECT * FROM users WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($pw, $row['user_pw'])) {
        $_SESSION['user_id'] = $id;
        echo "<script>alert('로그인 성공');location.href='main.php'</script>";
    } else {
        echo "아이디 또는 비밀번호 오류";
    }
}
?>
<h1>로그인</h1>

<form method="post">
    아이디: <input type="text" name="user_id"><br>
    비밀번호: <input type="password" name="user_pw"><br>
    <button type="submit">로그인</button>
</form>

<button onclick="location.href='register.php'">회원가입</button>