<?php
include 'db.php';

$sql = "SELECT id, title, user_id FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<h2>게시판</h2>

<a href="main.php">뒤로가기</a>
<hr>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div>
        <a href="post.php?id=<?= $row['id'] ?>">
            <?= htmlspecialchars($row['title']) ?>
        </a>
        - <?= htmlspecialchars($row['user_id']) ?>
    </div>
<?php endwhile; ?>