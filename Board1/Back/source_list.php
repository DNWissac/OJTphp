<?php
// DB연결
include 'dbconn.php';

// DB조회
$db_data_comeon_qr = "SELECT nListSeq, sTitle, sContent, DATE_FORMAT(dtTimesStamp, '%Y-%m-%d') as dtTimesStamp
                      FROM tBoardList
                      ORDER BY dtTimesStamp desc;";

// SQL 명령어
$db_data_comeon_rs = mysqli_query($db, $db_data_comeon_qr);

// DB 리스트 꺼내오기
while($row = mysqli_fetch_array($db_data_comeon_rs)) {
    echo '<tr>'.'<td>'.$row['nListSeq'].'</td>';
    echo '<td>'.$row['sTitle'].'</td>';
    echo '<td>'.$row['sContent'].'</td>';
    echo '<td>'.$row['dtTimesStamp'].'</td>'.'</tr>';
}

mysqli_close($db);

//echo "접속 성공";