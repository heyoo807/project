<?php session_start();
	$user_id = $_SESSION['user_id'];
  $user_pw = $_SESSION['user_pw'];
?>

<?php
$product_id = $_GET["product_id"];

$mysqli = new mysqli("localhost","heyoo","2021103996","heyoo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_pw'])){ 
					echo "<script>alert('로그인 페이지로 이동합니다 ');</script>";
				 	echo "<script>location.replace('login.php');</script>";
	}
	$sql = "DELETE FROM P_ORDER WHERE product_id='".$product_id."' AND member_id = '".$user_id."'";
	#echo "$sql";
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
		echo "<script>location.replace('./order.php');</script>";
	} else {
		printf("Could not delete record: %s\n", mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
}
?>

