<?php
include 'pdo.php';

// DB조회
try
{
    $sql = "SELECT sUserEmail, sNickName
        FROM tUserList;";
    foreach($connect->query($sql) as $field) {
        echo '<tr>'.'<td>'.$field['sUserEmail'].'</td>';
        echo '<td>'.$field['sNickName'].'</td>'.'</tr>';
    } 
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;