<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>회원가입</title>
</head>
<body>
  <h2>회원가입</h2>
  <form action="register_process.php" method="post">
    이름: <input type="text" name="name" required><br>
    학번: <input type="text" name="student_num" required><br>
    비밀번호: <input type="password" name="password" required><br>
    <button type="submit">회원가입 하기</button>
  </form>
  <form action="login.php" method="get">
    <button type="submit">로그인 화면으로</button>
  </form>
</body>
</html>