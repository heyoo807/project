<!DOCTYPE html>
<?php session_start();

  if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])){ 
			$user_id = NULL;
  		$user_pw = NULL;
	 }else{
	 		$user_id = $_SESSION['user_id'];
  		$user_pw = $_SESSION['user_pw'];
	 }
	 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주문페이지</title>
  <script>
    function info() {
        var opt = document.getElementById("search_opt");
        var opt_val = opt.options[opt.selectedIndex].value;
        var info = ""
        if (opt_val=='title'){
        	info = "제목을 입력하세요.";
        } else if (opt_val=='content'){
        	info = "내용을 입력하세요.";
        } else if (opt_val=='name'){
        	info = "작성자를 입력하세요.";
        }
        document.getElementById("search_box").placeholder = info;
    }
</script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #f2f2f2;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
      color: #333;
    }

    .search-box {
      text-align: center;
      padding: 20px 0;
    }

    .search-box input[type="text"] {
      width: 300px;
      padding: 10px;
      font-size: 16px;
    }

    .menu {
      text-align: center;
      padding: 10px;
      background-color: #333;
      color: #fff;
    }

    .menu a {
      margin-left: 10px;
      color: #fff;
      text-decoration: none;
   
    }
    .menu a:hover{
    	color: red;
    }



    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    header img {
      width: 200px;
      height: auto;
    }

    main {
      padding: 20px;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table th, table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      font-weight: bold;
    }

    tfoot td {
      font-weight: bold;
    }

    .checkout {
      text-align: right;
    }

    .checkout a {
      display: inline-block;
      margin-left: 10px;
      text-decoration: none;
      padding: 10px 20px;
      background-color: #337ab7;
      color: #fff;
      border-radius: 5px;
    }

    .checkout a.btn {
      background-color:#337ab7;
    }

    td > img{
      width: 100px;
    }
    .search-box select{
    	padding: 10px;
    }
		.search-box button{
			padding: 10px;
		}

  </style>
</head>
<body>
  <header>
    <a href="http://ibiz.khu.ac.kr/heyoo/project/index.php"><img src="logo_khu.png" alt="KHU문고 로고">
    <div class="menu">
      <a href="http://ibiz.khu.ac.kr/heyoo/project/login.php">로그인</a>
      <a href="http://ibiz.khu.ac.kr/heyoo/project/signup.php">회원가입</a>
      <a href="#">주문페이지</a>
      <a href="#">고객센터</a>
    </div>
  </header>

	
	<form action="./search.php" method="get">
      
      <div class="search-box">
      	<select name ="cate"id="search_opt" onchange="info()">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      	</select>
    		<input class="textform" id="search_box" type="text" name="search" autocomplete="off" placeholder="제목을 입력하세요" required>
    		<button>검색</button>
  		</div>
   </form>
   
   
	




  <div class="menu">
    <a href="./bookstore.php?a=소설">소설</a>
    <a href="./bookstore.php?a=자기계발">자기계발</a>
    <a href="./bookstore.php?a=역사">역사</a>
    <a href="./bookstore.php?a=과학">과학</a>
    <a href="./bookstore.php?a=예술">예술</a>
    <a href="./bookstore.php?a=문화">문화</a>
    <a href="./bookstore.php?a=자연">자연</a>
    <a href="./bookstore.php?a=환경">환경</a>
    <a href="./bookstore.php?a=경제">경제</a>
    <a href="./bookstore.php?a=경영">경영</a>
    <a href="./bookstore.php?a=철학">철학</a>
    <a href="./bookstore.php?a=종교">종교</a>
    <a href="./bookstore.php?a=컴퓨터">컴퓨터</a>
  </div>
  <main>
    <h2>주문 / 결제</h2>
    <table>
      <thead>
        <tr>
          <th>책 정보</th>
          <th>책 제목 / 작가명 / 출판사명</th>
          <th>가격</th>
          <th>수량</th>
          <th>합계</th>
          <th>삭제하기</th>
        </tr>
      </thead>

        <?php
  		
      $mysqli = new mysqli("localhost", "heyoo", "2021103996", "heyoo");
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
      	if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])){ 
					echo "<script>alert('로그인 페이지로 이동합니다 ');</script>";
				 	echo "<script>location.replace('login.php');</script>";
				 }
        $sql = "SELECT c.product_id, img_src, p.product_name, c.cart_count, c.cart_price FROM P_ORDER as c INNER JOIN P_PRODUCT as p WHERE c.product_id = p.product_id AND c.member_id = '".$_SESSION['user_id']."'";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
        	echo "<tbody>";
					$totalCost = 0;
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        	$imgSrc = $newArray['img_src'];
        	# $imgSrc = '\''.$imgSrc.'\'';
        	#$imgSrc = 'http://163.180.186.153/heyoo/teamproject/book02.png';
        	$product_id = $newArray['product_id'];
          $product_name = $newArray['product_name'];
          $cart_count = $newArray['cart_count'];
          $cart_price = $newArray['cart_price'];
          $Cost = $cart_count * $cart_price;
					$totalCost = $totalCost + $Cost;
          echo"<tr>";
          echo"<td>";
          echo "<img src='".$imgSrc."'>";
          echo "</td>";
          echo "<td>".$product_name."</td>";
          echo "<td>".$cart_count."</td>";
          echo "<td>".$cart_price."</td>";
          echo "<td>".$Cost."</td>";
          echo "<td>";
          echo "<FORM action=deleteOrderResp.php method='get'>\n";
					echo "<input type=hidden name=product_id value=".$product_id.">";
					echo "<input type=submit value=delete>";
					echo "</Form>";
          echo "</td>";
          echo "</tr>\n";
        }

        echo "</tbody>";
	     echo "<tfoot>";
	     echo "<tr>";
	     echo "<td colspan='4'>".'Total:'."</td>";
	     echo "<td>".$totalCost."</td>";
	     #echo "<td>""</td>";
	     echo "</tr>";
	      echo "</tfoot>";


      } else {
      printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
      echo "<p>$sql";
      }
      mysqli_free_result($res);
      mysqli_close($mysqli);
      }


?>
		</table>

    <div class="checkout">
      <a href="http://ibiz.khu.ac.kr/heyoo/project/index.php">쇼핑 계속하기</a>
    </div>
  </main>


  <footer>
  
  </footer>

</body>
</html>