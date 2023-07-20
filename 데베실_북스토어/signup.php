<!DOCTYPE html>
<html>
<head>
  <title>회원가입</title>
  <style>
    /* 스타일링을 위한 CSS 코드 작성 */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    header {
      text-align: center;
      padding: 20px;
    }
    
    .logo {
      width: 200px;
      height: auto;
    }
    
    .form-container {
      text-align: center;
      padding: 20px;
    }
    
    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="tel"] {
      width: 300px;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 10px;
    }
    
    .form-container input[type="radio"] {
      margin: 0 5px;
    }
    
    .form-container button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <a href = "http://ibiz.khu.ac.kr/heyoo/project/index.php"><img class="logo" src="logo.png" alt="로고"></a>
  </header>
  
  <div class="form-container">
    <h2>KHU Book Store | 회원가입</h2>
    <form action='./signresp.php' method='post'>
      <input type="text" placeholder="회원명" name="userName">
      <br>
      <input type="email" placeholder="이메일" name="userEmail">
      <br>
      <label><input type="radio" name="gender" value="남자">남자</label>
      <label><input type="radio" name="gender" value="여자">여자</label>
      <br>
      <input type="tel" placeholder="연락처" name="userTel">
      <br>
      <input type="text" placeholder="주소" name="userAddress">
      <br>
      <input type="text" placeholder="아이디" name="userId">
      <br>
      <input type="text" placeholder="비번" name="userPw">
      <br>

      <button type="submit">회원가입</button>
    </form>
  </div>
</body>
</html>