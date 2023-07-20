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

<html>
<head>
  <title>사장학개론</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: auto;
      margin-top: 100px;
      margin-bottom: 100px;
      text-align: center;
      
    }
    
    .book-image {
      margin-bottom: 20px;
    }
    
    .book-info {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      margin-bottom: 25px;
    }
    
    .book-info img {
      width: 250px;
      height: auto;
      margin-right: 40px;
    }
    
    .book-details {
      text-align: left;
    }
    
    .book-details p {
      margin: 30px 0;
    }
    
    .quantity-input {
      margin-bottom: 25px;
    }
    
    .total-price {
      margin-bottom: 20px;
    }
    
    .purchase-button {
      margin-bottom: 200px;
    }
    
    .book-description {
      text-align: left;
      margin-bottom: 100px;
    }
    
    .book-table {
      text-align: left;
      margin-bottom: 300px;
    }
    
    .comment-section {
      text-align: left;
      margin-bottom: 70px;
    }
    
    textarea {
      width: 100%;
      height: 100px;
      resize: vertical;
      margin-bottom: 20px;
    }
    
    .submit {
      padding: 20px 30px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      margin-bottom: 50px;
    }
    
    .ud{
    	background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      width: 50px;
    }
      .uda{
    	background-color: #333;
    	font-size: 13px;
      color: #fff;
      border: none;
      cursor: pointer;
      width: 50px;
      text-decoration: none;
      padding: 0.8px 4px;
    }
    
        .form-group {
      display: flex;
      align-items: center;
    }

    .form-group label {
      margin-right: 10px;
    }    
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    header {
      background-color: #f2f2f2;
      padding: 20px;
      text-align: center; /* Added to center align the content */
    }
    
    h1 {
      margin-bottom: 50px;
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
    	color : red;
    }
    
    .main-content {
      text-align: center;
      padding: 20px;
    }
    
    .book-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .book-list li {
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      list-style-type: none;
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
      display: block;
      margin: 0 auto; /* Added to center align the logo */
    }
    
    #search-input {
      width: 1000px;
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
  </style>
</head>
<body>
<header>
  	<a href = "http://ibiz.khu.ac.kr/heyoo/project/index.php">
    <img src="logo.png" alt="KHU문고 로고">
    </a>
    <div class="menu">
      <a href="http://ibiz.khu.ac.kr/heyoo/project/login.php">로그인</a>
      <a href="http://ibiz.khu.ac.kr/heyoo/project/signup.php">회원가입</a>
      <a href="http://ibiz.khu.ac.kr/heyoo/project/order.php">주문페이지</a>
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
    
<div class='container'>
<?php
		$product_id = $_GET['a'];
		 $mysqli = new mysqli("localhost", "heyoo", "2021103996", "heyoo");
		      if (mysqli_connect_errno()) {
		        printf("Connect failed: %s\n", mysqli_connect_error());
		        exit();
		      } else {
		        $sql = "SELECT * FROM P_PRODUCT WHERE product_id = '".$product_id."'";
		        $res = mysqli_query($mysqli, $sql);
		 				if ($res) {
		        	
		        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
		        	$product_name = $newArray['product_name'];
		        	$img_src = $newArray['img_src'];
							$product_price = $newArray['product_price'];
							$product_info = $newArray['product_info'];
							$product_writer = $newArray['product_writer'];
							$publisher = $newArray['publisher'];
					
    					echo "<h1>".$product_name."</h1>";
    
					    echo "<div class='book-info'>";
					    echo "<img src='".$img_src."' alt='Book Cover' width='800' height='1000'>";
					    echo "<div class='book-details'>";
					    echo "<p><strong>"."제목:"."</strong>".$product_name."</p>";
					    echo "<p><strong>"."작가:"."</strong>".$product_writer."</p>";
					    echo "<p><strong>"."출판사:"."</strong>".$publisher."</p>";
					    echo "<p><strong>"."가격:"."</strong>";
					    echo "<span id='cost'>".$product_price."</span>";
					    echo "</p>";
					    echo "</div></div>";
					   	echo "<FORM action=./insertOrderResp.php method='GET'>\n";
					  	echo "<div class='form-group'>";
   						echo "<label for='quantity'>"."수량: "."</label>";
   						echo "<input type='number' id='quantity' min='0' value='0' onchange='calculateTotal()' name='quantity' >";
  						echo "</div>";
  						echo "<div class='form-group'>";
    					echo "<label for='total'>"."총 결제금액: "."</label>";
    					echo "<br><br><br>";
    					echo "<span id='total'>"."원"."</span>";
  						echo "</div>";
  				
							echo "<input type=submit value=구매하기>";

							echo "<div class='purchase-button'>";
	  					echo "<input type=hidden name=product_id value=".$product_id.">";
	  					
	  					echo "<input type=hidden name=product_price value=".$product_price.">";
							echo "</div>";
					
							echo "</Form>";
   						echo "<div class='book-description'>";
      				echo "<h2>"."책 소개"."</h2>";
      				echo "<p>".$product_info."</p>";
      				echo "</div>";
    
					}
    
					    echo "<div class='comment-section'>";
					    echo "<form action = './insertCommentResp.php' method = 'get'>";
					    echo "<h2>"."Comments"."</h2>";
					    echo "<textarea id='comment' name='comment' rows='4' cols='50'>"."</textarea>";
					    echo "<input type='submit' value='Submit Comment' class='submit'>";
					    echo "<input type=hidden name=product_id value=".$product_id.">";
					    echo "</form>";
					    echo "</div>";
					    
							echo "<table>";
							echo "<thead>";
						  echo "<tr>";
							echo "<th>"."댓글 작성자"."</th>";
						  echo "<th>"."작성 내용"."</th>";
						  echo "<th>"."수정"."</th>";
						  echo "<th>"."삭제"."</th>";
						  echo "</tr>";
						  echo "</thead>";
						  echo "<tbody>";
						  $sql = "SELECT * FROM P_COMMENT WHERE product_id = '".$product_id."'";
		        	$res = mysqli_query($mysqli, $sql);
		        	while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
		        		$member_id = $newArray['member_id'];
		        		$comment_content = $newArray['comment_content'];
		        		$comment_id = $newArray['comment_id'];
		        		$product_id = $newArray['product_id'];
							  echo "<tr>";
							  echo "<td>".$member_id."</td>";
							  echo "<td>".$comment_content."</td>";
								echo "<td>";
								echo "<a href='./updateCommentForm.php?a=$comment_id' class='uda'>"."update"."</a>";
			          echo "</td>";
			          echo "<td>";
			          echo "<FORM action=deleteCommentResp.php method='get'>\n";
								echo "<input type=hidden name=comment_id value=".$comment_id.">";
								echo "<input type=hidden name=member_id value=".$member_id.">";
								echo "<input type=hidden name=product_id value=".$product_id.">";
								echo "<input type=submit value=delete class='ud'>";
								echo "</Form>";
			          echo "</td>";
								echo "</tr>";
					
						    
						 }
						  echo "</tbody>";
							  echo "</table>";
						    echo "</div>";
						    echo "</div>";
	  
	
						
		      } else {
		      printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
		      echo "<p>$sql";
		      }
		      mysqli_free_result($res);
		      mysqli_close($mysqli);
		      }?>
		      

			</div>
	
			  <script>
			   
			    function calculateTotal() {
			      var quantity = parseInt(document.getElementById("quantity").value);
			      var price =  parseInt(document.getElementById("cost").textContent); // Assuming the price of one shopping cart is $10
			      var total = quantity * price;
			      document.getElementById("total").textContent =  total.toFixed(0) +"원";
			    }
			    
			   
			  </script>
			  
		
			  




</body>
</html>


