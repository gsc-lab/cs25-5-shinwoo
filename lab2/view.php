<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "user", "12345", "sample");
    $sql = "select * from memberboard where num=$num";
    $result = mysqli_query($con, $sql); // SQL 명령 실행

    $row = mysqli_fetch_assoc($result); // 레코드 가져오기

    $id = $row["id"];
    $name = $row["name"];
    $subject = $row["subject"];
    $regist_day = $row["regist_day"];
    
    $content = $row["content"];
    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    $file_name = $row["file_name"];
    $file_type = $row["file_type"];
    $file_copied = $row["file_copied"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>회원 게시판 > 내용보기</h2>
    <ul class="board_view">
        <li class="row1">
            <span class="col1"><b>제목 :</b> <?=$subject?></span>
            <span class="col2"><?=$name?> | <?=$regist_day?></span>
        </li>
        <li class="row2">
        <?php
            if($file_name) {
                $file_path = "./data/".$file_copied;
                $file_size = filesize($file_path);

                echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                <a href='download.php?num=$num&file_copied=$file_copied&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
            }
            echo $content;
            ?>
        </li>
    </ul>
    <ul class="buttons">
        <li><button onclick="location.href='list.php?page=<?=$page?>'">목록보기</button></li>
        <li><button onclick="location.href='modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정하기</button></li>
        <li><button onclick="location.href='delete.php?num=<?=$num?>&page=<?=$page?>'">삭제하기</button></li>
        <li><button onclick="location.href='form.php'">글쓰기</button></li>
    </ul>
</body>
</html>