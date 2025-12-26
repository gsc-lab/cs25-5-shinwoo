<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT user_id FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

$del_sql = "DELETE FROM posts WHERE id = $id";
mysqli_query($conn, $del_sql);

echo "<script>alert('삭제 완료');location.href='view.php'</script>";