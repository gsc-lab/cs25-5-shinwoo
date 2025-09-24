<?php
// view.php
session_start();
include 'db.php';

// 글 ID 받기
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("잘못된 접근입니다.");
}
$post_id = (int)$_GET['id'];

// DB에서 글 가져오기
$sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.name, users.student_num 
        FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = $post_id";
$result = $db_conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("존재하지 않는 글입니다.");
}

$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <?= htmlspecialchars($post['title']) ?>
        </title>
    </head>
    <body>
        <h2>
            <?= htmlspecialchars($post['title']) ?>
        </h2>
            <p>작성자: <?= htmlspecialchars($post['name']) ?> (<?= htmlspecialchars($post['student_num']) ?>)</p>
            <p>작성일: <?= $post['created_at'] ?></p>
            <hr>
                <div>
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </div>
            <hr>

<?php
if (isset($_SESSION['student_num']) && $_SESSION['student_num'] === $post['student_num']) {
    ?>
    <form action="edit.php" method="get">
        <button type="submit">수정</button>
    </form>
    <form action="del.php" method="get">
        <button type="submit">삭제</button>
    </form>
<?php }
?>
<form action="main.php" method="get">
    <button type="submit">목록으로</button>
</form>
</body>
</html>
