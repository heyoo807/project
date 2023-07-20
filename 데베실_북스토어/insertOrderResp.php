<?php session_start();
	$user_id = $_SESSION['user_id'];
  $user_pw = $_SESSION['user_pw'];
?>
<?php
$product_id = $_GET["product_id"];
$quantity = $_GET["quantity"];
$product_price =  $_GET["product_price"] * $quantity;
$mysqli = new mysqli("localhost","heyoo","2021103996","heyoo");


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_pw'])){ 
					echo "<script>alert('로그인 페이지로 이동합니다 ');</script>";
				 	echo "<script>location.replace('login.php');</script>";
				 }
	$sql = "SELECT * FROM P_ORDER WHERE product_id = '".$product_id."' AND member_id = '".$_SESSION['user_id']."'";
	$res = mysqli_query($mysqli, $sql);
	if(mysqli_num_rows($res)){
		echo "<script>alert('이미 추가한 상품입니다');</script>";
		echo "<script>location.replace('index.php');</script>";
	}
	
	
	$sql = "INSERT INTO P_ORDER VALUES ('".$product_id."', '".$quantity."', '".$product_price."', '".$_SESSION['user_id']."')";

	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
		echo "<script>location.replace('./order.php');</script>";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
}

?>



