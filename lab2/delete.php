<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "user", "12345", "sample");
    $sql = "delete from memberboard where num=$num";
    mysqli_query($con, $sql);

    mysql_close($con);

    // 목록보기 이동
    echo "<script>
            location.href = 'list.php?page=$page';
        </script>";
?>