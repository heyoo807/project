<!DOCTYPE html>

<html>
<head>
  <title>KHU문고</title>
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
      text-align: center; /* Added to center align the content */
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
  <style>
  .book-list {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-gap: 30px;
  }
  </style>
  
	<style>
	  .main-content h2 {
		background-color: #8A0808;
		color: white;
		padding: 10px;
	  }
	</style>
	<main>
 <?php
  		$category = $_GET['a'];

      $mysqli = new mysqli("localhost", "heyoo", "2021103996", "heyoo");
      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      } else {
        $sql = "SELECT * FROM P_PRODUCT as p INNER JOIN P_CATEGORY as c WHERE c.category_num = p.category_num AND c.category_name= '".$category."'";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
        	echo "<div class='main-content'>";
        	echo "<h2>".$category."</h2>";
        	echo "<ul class='book-list'>";
        	
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        	$img_src = $newArray['img_src'];
        	$product_id = $newArray['product_id'];
          $product_name = $newArray['product_name'];
					echo "<li>";
					echo "<a href = './productinfo.php?a=$product_id'>";
					echo "<img src='".$img_src."' width='150'>";
					echo "<br>".$product_name."</a>";
					echo "</li>";
        }

	      
	     }
	    else {
	      printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
	      echo "<p>$sql";
      }
      mysqli_free_result($res);
      mysqli_close($mysqli);
      }


?>
</main>
  <footer>
    &copy; 2023 KHU문고. All rights reserved.
  </footer>
</body>
</html>