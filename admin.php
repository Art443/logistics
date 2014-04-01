<!DOCTYPE html>
<?
include 'include/check_login.php';
include 'include/conn.php';
?>
<html lang="en">
<head>
<title>Royal Thai Army</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<!--<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen">
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');</script>
<![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
      
      <nav>
        <ul>
          <li class="current"><a href="index.html" class="m1">Control Panel</a></li>
          <li><a href="about-us.html" class="m2">Requisition</a></li>
          <li><a href="articles.html" class="m3">Repatriate</a></li>
          <li><a href="contact-us.html" class="m4">Maintanance</a></li>
          <li class="last"><a href="sitemap.html" class="m5">Dispose</a></li>
        </ul>
      </nav>
      
    </div>
  </header>
  <div class="container">
    <aside>
      <h3>Adminitrator
	  </h3>
      <ul class="categories">
        <li><span><a href="#">Brand</a></span></li>
        <li><span><a href="#">Cartype</a></span></li>
        <li><span><a href="#">Department</a></span></li>
        <li><span><a href="#">Employee</a></span></li>
        <li><span><a href="#">Position</a></span></li>
        <li><span><a href="#">Rank</a></span></li>
        <li><span><a href="#">Worksheets</a></span></li>
        <li class="last"><span><a href="#">Car</a></span></li>
      </ul>
	</aside>
      <div class="inside">
       หน้าจอของผู้ดูแลระบบ<br>
       <a href="insert_rank.php">เพิ่มชั้นยศ</a><br>  <a href="update_rank.php">แก้ไขชั้นยศ</a><br>  <a href="delete_rank.php">ลบชั้นยศ</a>
     </div>
    </section>
  </div>
</div>
</body>
</html>