<?php
    include "session.php";
    
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost", "user", "12345", "sample")
    $sql = "update memberboard set subject='$subject', ";
    $sql .= "content='$content', regist_day='$regist_day'where num=$num";
    mysqli_query($con, $sql);

    mysql_close($con);

    echo "
        <script>
        location.herf = 'list.php?page=$page';
        </script>
    ";
?>