<?php
// DB연결
include 'pdo.php';

$userEmail = $_POST['email'];

// SQL문
$sql = "SELECT count(*) as count
                      FROM tUserList
                      WHERE sUserEmail = '$userEmail'";

// SQL 명령어

$statement = $pdo -> query($sql);
$row = array($statement);
$totRows = $row[0];
 
/* $result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$totRows = $row[0]; */

echo "$statement";