
<?php
$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userPhone = $_POST["userTel"];
$userAddress = $_POST["userAddress"];
$userId = $_POST["userId"];
$userPw = $_POST["userPw"];
$mysqli = new mysqli("localhost", "heyoo", "2021103996", "heyoo"); 
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$sql = "INSERT INTO P_MEMBER VALUES('".$userId."','".$userPw."','".$userName."','".$userPhone."','".$userEmail."','".$userAddress."')";
$res = mysqli_query($mysqli, $sql);
#echo "$sql";
if ($res === TRUE) {
#echo "<p>A record has been inserted successfully.";
echo "<script>location.replace('login.php');</script>";
} else {
echo "<script>alert('이미 있는 정보입니다');</script>";
echo "<script>location.replace('signup.php');</script>";
}
mysqli_close($mysqli);
}
?>

