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
      <?
      include 'include/top_menu.php';
      ?>      
    </div>
  </header>
  <div class="container">
    <aside>
        <?
        include 'include/menu.php';
        ?>     
    </aside>
      <div class="inside">
       <?
       $sql = "Delete From tbemployee where employee_id='$adid'";
    $result = mysql_query($sql);
            if ($result){
                echo"การลบข้อมูลในฐานข้อมูลประสบความสำเร็จ<br>";
                echo "ประสงค์จะลบข้อมูลอื่น <a href=show_employee.php>คลิกที่นี่>>></a><br>";
                echo "ประสงค์จะเพิ่มข้อมูลยี่ห้ออื่น <a href=insert_employee.php>คลิกที่นี่>>></a>";
                 mysql_close($link);
            }  else {
                echo "ไม่สามารถลบข้อมูลในฐานข้อมูลได้<br>";
                echo "ประสงค์จะลบข้อมูลอีกครั้ง <a href=show_employee.php>คลิกที่นี่>>></a>";
            }
   
       ?>
      </div>
    </section>
  </div>
</div>
</body>
</html>