
<?php session_start();
	$user_id = $_SESSION['user_id'];
  $user_pw = $_SESSION['user_pw'];
 ?>
<?php
$comment = $_GET["comment"];
$mysqli = new mysqli("localhost","heyoo","2021103996","heyoo");
$comment_id = $_GET["comment_id"];
$product_id = $_GET["product_id"];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {

	
	$sql = "UPDATE  P_COMMENT SET comment_content = '".$comment."' WHERE comment_id='".$comment_id."' AND member_id = '".$user_id."'";

	$res = mysqli_query($mysqli, $sql);
	
	if ($res === TRUE) {
		echo "<script>location.replace('./productinfo.php?a=$product_id');</script>";
	} else {
		printf("Could not delete record: %s\n", mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
	}
?>



		
			  




