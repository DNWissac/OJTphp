<?php
// DB연결
include 'pdo.php';

if ($_POST['nickName'] != null || $_POST['nickName'] != "")
{
    try 
    {
        // nickName 변수에 담기
        $nickName = $_POST['nickName'];
        
        $sql = "SELECT count(*) as count
                      FROM tUserList
                      WHERE sNickName = '$nickName'";
        
        // count 값 출력
        foreach ($connect->query($sql) as $field){
            echo $field['count'];
        }
        
        
    } catch (PDOException $ex)
    {
        echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
    }
    
}



