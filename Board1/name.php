<?php

 $conn = mysqli_connect("127.0.0.1", "root", "php123", "studentdatabase");
 //$conn = mysqli_connect("127.0.0.1", "root", "php123");
 
 /* 
 if ($conn == true) {
     echo "접속 성공";
 }
 else
 {
     echo "접속 실패";
 }
  */
 
 $sql = "SELECT name, age, grade FROM students";
 $result = mysqli_query($conn, $sql);

 
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "이름:".$row["name"]."나이:".$row["age"]."학년:".$row["grade"];
     }
 }
 else
 {
    echo "테이블에 데이터가 존재하지 않습니다.";    
 }
 mysqli_close($conn);
 
 