<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/signupform.js"></script>

<!-- 회원가입/로그인 용 css -->
<link rel="stylesheet" href="../css/sign.css">
<title>회원가입</title>


<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>
<section class="bg-light">
    <div class="container py-4">
    	<h3 style="text-align: center;">회원가입</h3>
    	
        <div>
            <form class="signform" action="../back/DAO/signupDAO.php" method="post">
                <div class="form-group">
                    <label for="inputEmail" class="form-label mt-4">이메일</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                    placeholder="ex)example@gmail.com" name="userEmail">
                    <div>
                    	<span class="errMsg emailMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-success">
                    <label for="inputPassword" class="form-label mt-4">비밀번호</label>
                    <input type="password" class="form-control" id="inputPassword" 
                    placeholder="영문, 숫자, 특수문자를 혼합한 8~20자리" name="userPassword">
                    <div>
                    	<span class="errMsg pwdMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-danger">
                    <label for="inputRePassword" class="form-label mt-4">비밀번호 재확인</label>
                    <input type="password" class="form-control" id="inputRePassword">
                    <div>
                    	<span class="errMsg rePwdMsg"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputNickName" class="form-label mt-4">닉네임</label>
                    <input type="text" class="form-control" id="inputNickName" 
                    placeholder="한글 1~10자, 영문 및 숫자 2~20자 이내" name="userNickName">
                    <div>
                    	<span class="errMsg nickMsg">닉네임을 입력해 주세요.</span>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg" id="signupBtn">가입하기</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../index.php'">
                    	취소
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</section>




</body>
</html>
