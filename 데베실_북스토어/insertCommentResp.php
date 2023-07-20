<!DOCTYPE html>
<?php session_start();
	$user_id = $_SESSION['user_id'];
  $user_pw = $_SESSION['user_pw'];
 ?>
<?php
$product_id = $_GET["product_id"];
$comment = $_GET["comment"];
$mysqli = new mysqli("localhost","heyoo","2021103996","heyoo");
$comment_id = mt_rand(1, 10000);

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_pw'])){ 
					echo "<script>alert('로그인 페이지로 이동합니다 ');</script>";
				 	echo "<script>location.replace('login.php');</script>";
	}else{
		$sql = "INSERT INTO P_COMMENT(comment_id, member_id, comment_content, product_id) VALUES ('".$comment_id."', '".$user_id."', '".$comment."', '".$product_id."')";

	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
		echo "<script>location.replace('./productinfo.php?a=$product_id');</script>";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}
	}

	
	
	mysqli_close($mysqli);
	}
?>




