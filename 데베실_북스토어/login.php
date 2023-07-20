<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	
  <title>로그인</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    
    img {
      width: 200px;
      height: auto;
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 300px;
      padding: 10px;
      margin-bottom: 10px;
    }

    button {
      padding: 10px 20px;
    }
  </style>
</head>
<body>
	
  <div class="container">
    <a href="http://ibiz.khu.ac.kr/heyoo/project/index.php"><img src="logo.png" alt="로고 이미지"></a>
    <h1>KHU Book Store | 로그인</h1>
    <?php if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_pw'])){?>
    	<form action='./loginresp.php' method='post'> 
      <input type="text" placeholder="아이디" name="inputId" required>
      <input type="password" placeholder="비밀번호" name="inputPw" required>
      <button type="submit">로그인</button></form> 
      <div>
      	<a href='./signup.php'>회원가입 하러가기</a>
      </div>
    <?php }else{
    	$user_id = $_SESSION['user_id'];
    	$user_pw = $_SESSION['user_pw'];
    	echo "".$user_id."님 환영합니다"."<br>";
    	echo "<a href='./logout.php'>"."로그아웃"."</a>";
    }?>
    	
    	
    
  </div>
</body>
</html>


