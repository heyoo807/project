
<?php session_start();
	$user_id = $_SESSION['user_id'];
  $user_pw = $_SESSION['user_pw'];
 ?>
<?php
$product_id = $_GET["product_id"];
$member_id = $_GET["member_id"];
$mysqli = new mysqli("localhost","heyoo","2021103996","heyoo");
$comment_id = $_GET["comment_id"];


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {

	if($user_id != $member_id){
		echo "<script>alert('본인 게시물만 삭제 가능합니다');</script>";
		echo "<script>location.replace('./productinfo.php?a=$product_id');</script>";
		
	}
	echo "<script>location.replace('./productinfo.php?a=$product_id');</script>";

	
	$sql = "DELETE FROM P_COMMENT WHERE comment_id='".$comment_id."' AND member_id = '".$user_id."'";

	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
		#echo "<p>A record has been deleted successfully.";
	} else {
		printf("Could not delete record: %s\n", mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
	}
?>



		
			  


