<?php
include 'db.php';

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO posts (title, content, user_id)
            VALUES ('$title', '$content', '$user_id')";
    mysqli_query($conn, $sql);

    echo "<script>location.href='view.php'</script>";
}
?>

<h2>글 작성</h2>

<form method="post">
    제목<br>
    <input type="text" name="title" required><br><br>

    내용<br>
    <textarea name="content" rows="10" required></textarea><br><br>

    <button type="submit">작성</button>
</form>

<a href="main.php">취소</a>