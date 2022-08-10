<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
</script>

<!-- 회원가입/로그인 용 css -->
<link rel="stylesheet" href="../css/sign.css">
<title>로그인</title>


<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<section class="bg-light">
    <div class="container py-4">
    	<h3 style="text-align: center;">로그인</h3>
    	
        <div>
            <form class="signform" action="../back/DAO/signinDAO.php" method="post">
                <div class="form-group">
                    <label for="inputEmail" class="form-label mt-4">이메일</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="userEmail">
                    <div>
                    	<span class="errMsg emailMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-success">
                    <label for="inputPassword" class="form-label mt-4">비밀번호</label>
                    <input type="password" class="form-control" id="inputPassword" name="userPassword">
                    <div>
                    	<span class="errMsg pwdMsg"></span>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" id="signinBtn">로그인</button>
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
