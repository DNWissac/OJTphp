<?php 
    // 로그인 프로세스를 위한 세션처리
    session_start();
?>
<script>

	$().ready(function(){

		// 최신순으로 조회버튼 클릭 시
		$("#latestList").click(function(){
			
			$.ajax({
				url:"back/DAO/movieListDAO.php",
				type:"post",
			}).done(function(data){
				$("#input_data").html(data);
			});
			
		});

		// 사용자 조회 클릭 시
		$("#userList").click(function(){
			
			$.ajax({
				url:"back/DAO/userListDAO.php",
				type:"post",
			}).done(function(data){
				$("#input_data").html(data);
			});
			
		});

		// 초기화 버튼 클릭 시
		$("#resetList").click(function(){
			$("#input_data").empty();
		});

		$("#movieInsertBtn").click(function(){
			location.href="/view/movieinsertform.php";
		});
		
	});
	
</script>

<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">영화평가 게시판</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" id="latestList" href="#;">
                  영화 최신 순 조회
                  </a>
                </li>
                
                <!-- 관리자만 가능한 사용자 조회 -->
                <?php if($_SESSION['userAdmin'] == 1){ ?>
				<li class="nav-item">
                  <a class="nav-link active" id="userList" href="#;">
                  사용자 조회
                  </a>
                </li>
            	<?php }?>
            	
                <li class="nav-item">
                  <a class="nav-link" id="resetList" href="#;">
                  초기화
                  </a>
                </li>
                
            </ul>
        </div>
        <div class="signBtnDiv" style="text-align: right;">
        	<!-- 비 로그인 시 -->
        	<?php if(!isset($_SESSION['userEmail'])){?>
        	    <button type="button" class="btn btn-primary" onclick="location.href='../view/signinform.php'">
            		로그인
            	</button>
            	<button type="button" class="btn btn-primary" onclick="location.href='../view/signupform.php'">
            		회원가입
            	</button>
        	<!-- 로그인 시 -->
        	<?php } else{?>
            	<p>
            	『<?php echo $_SESSION['userNickName'];?>』님, 안녕하세요.
            		<?php if($_SESSION['userAdmin'] == 1){ ?>
            		[관리자]</p>
            		<?php }else{?>
            		[일반사용자]</p>
            		<?php };?>
            	<button type="button" class="btn btn-primary" onclick="location.href='../back/logout.php'">
            		로그아웃
            	</button>
    		<?php };?>
        </div>
      </div>
    </nav>
