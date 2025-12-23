<?php include "db.php"; ?>

<h1>메인 페이지</h1>

<?php if (!isset($_SESSION['user_id'])) { ?>
    <button onclick="location.href='login.php'">로그인</button>
<?php } else { ?>
    <p><?=$_SESSION['user_id']?>님 환영합니다</p>
    <button onclick="location.href='logout.php'">로그아웃</button>
<?php } ?>

<br><br>

<button onclick="location.href='view.php'">게시글 보기</button>

<?php if (isset($_SESSION['user_id'])) { ?>
    <button onclick="location.href='write.php'">게시글 작성</button>
<?php } else { ?>
    <p>로그인 후 이용해주세요</p>
<?php } ?>
