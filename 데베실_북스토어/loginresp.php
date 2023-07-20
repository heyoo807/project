<?php
session_start();
$user_id= $_POST["inputId"];
$user_pw = $_POST["inputPw"];

      $mysqli = new mysqli("localhost", "heyoo", "2021103996", "heyoo");
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        $sql = "SELECT * FROM P_MEMBER WHERE member_id = '".$user_id."' AND member_pw = '".$user_pw."'";

        $res = mysqli_query($mysqli, $sql);
  			if(mysqli_num_rows($res) == 1){
  				 echo "<script>alert('로그인 성공');</script>";
  				 $_SESSION['user_id'] = $user_id;
  				 $_SESSION['user_pw'] = $user_pw;
  				echo "<script>location.replace('index.php');</script>";
  			}else{
  				 echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');</script>";
  				 echo "<script>location.replace('login.php');</script>";
  			}
     
 
   
       
              	
      
      
     
     
		}

?>