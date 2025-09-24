<?php
// main.php
session_start();
include 'db.php';

$sql = "SELECT posts.id, posts.title, users.name, posts.created_at 
        FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC";
$result = $db_conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>메인 페이지</title></head>
<body>
<h1>게시판</h1>

<?php if (isset($_SESSION['student_num'])): ?>
    <p><?= $_SESSION['student_num'] ?>님 환영합니다.</p>
    <form action="write.php" method="get">
    <button type="submit">글 쓰기</button>
  </form>
  <form action="logout.php" method="get">
    <button type="submit">로그아웃</button>
  </form>
<?php else: ?>
    <form action="login.php" method="get">
    <button type="submit">로그인</button>
  </form>
<?php endif; ?>

<hr>
<table border="1">
    <tr>
        <th>번호</th>
        <th>제목</th>
        <th>작성자</th>
        <th>작성일</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><a href="view.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>