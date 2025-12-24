<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

if (!$post) {
    echo "게시글이 존재하지 않습니다.";
    exit;
}
?>

<h2><?= htmlspecialchars($post['title']) ?></h2>
<p>작성자: <?= htmlspecialchars($post['user_id']) ?></p>
<p>작성일: <?= $post['created_at'] ?></p>

<hr>

<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

<hr>

<a href="view.php">목록으로</a>

<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $post['user_id']): ?>
    | <a href="edit.php?id=<?= $post['id'] ?>">수정</a>
    | <a href="del.php?id=<?= $post['id'] ?>">삭제</a>
<?php endif; ?>
