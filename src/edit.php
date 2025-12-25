<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $update_sql = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
    
    mysqli_query($conn, $update_sql);
    echo "<script> location.href='post.php?id=$id'; </script>";
    exit;
}
?>
<h2>글 수정</h2>
<form method="post">
    제목<br>
    <input type="text" name="title" value="<?= $post['title'] ?>" required><br><br>

    내용<br>
    <textarea name="content" rows="10" required><?= $post['content'] ?></textarea><br><br>

    <button type="submit">수정</button>
</form>
<a href="post.php?id=<?= $id ?>">취소</a>