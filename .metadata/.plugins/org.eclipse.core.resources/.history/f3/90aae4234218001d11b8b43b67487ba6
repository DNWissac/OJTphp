<?php
// DB연결
include 'pdo.php';

$nickName = $_POST['nickName'];

// DB조회
$sql = "SELECT count(*) as count
                      FROM tUserList
                      WHERE sNickName = '$nickName'";

// SQL 명령어
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$totRows = $row[0];

echo "$totRows";