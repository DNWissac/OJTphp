<?php

include 'pdo.php';

// 5.3.7 버전 이하 password_hash
include "../util/password.php";


// 회원가입 폼에서 받은 정보
$user_email = $_POST['userEmail'];
$user_password = $_POST['userPassword'];
$user_nickName = $_POST['userNickName'];

// 비밀번호 암호화
$encrypted_passwd = password_hash($user_password, PASSWORD_DEFAULT);

try
{
    $sql = "INSERT INTO tUserList(sUserEmail, sPassword, sNickName) 
            VALUES('$user_email', '$encrypted_passwd', '$user_nickName')";
    $connect->exec($sql);
    echo "<script>alert('회원가입에 성공했습니다.');";
    echo "location.href='../../index.php';</script>";
}
catch(PDOException $ex)
{
    echo "<script>alert('회원가입에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
}

$connect = null;

echo "<script>location.href='../../index.php'</script>";

