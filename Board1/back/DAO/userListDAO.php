<?php
include 'pdo.php';

// DB조회
try
{
    $sql = "SELECT sUserEmail, sNickName, nUserAdmin
        FROM tUserList;";
    
    echo "    	<thead>";
    echo "        	<tr>";
    echo "        		<th>이메일</th>";
    echo "        		<th>닉네임</th>";
    echo "              <th>관리자여부</th>";
    echo "        	</tr>";
    echo "        </thead>";
    echo "        <tbody>";
    
    foreach($connect->query($sql) as $field) {
        echo '<tr>'.'<td>'.$field['sUserEmail'].'</td>';
        echo '<td>'.$field['sNickName'].'</td>';
        
        if ($field['nUserAdmin'] == 1) {
            echo '<td>관리자</td></tr>';
        }
        else{
            echo '<td>일반사용자</td></tr>';
        }
    } 
    
    echo " </tbody>";
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;