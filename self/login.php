<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>로그인</title>
</head>
<body>
  <h2>로그인</h2>
  <form action="login_process.php" method="post">
    학번: <input type="text" name="student_num" required><br>
    비밀번호: <input type="password" name="password" required><br>
    <button type="submit">로그인</button>
  </form>
  <form action="register.php" method="get">
    <button type="submit">회원가입</button>
  </form>
</body>
</html>