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
        <li><span><a href="show_admin.php">Administrator</a></span></li>
        <li><span><a href="show_brand.php">Brand</a></span></li>
        <li><span><a href="show_cartype.php">Cartype</a></span></li>
        <li><span><a href="show_deprtment.php">Department</a></span></li>
        <li><span><a href="show_employee.php">Employee</a></span></li>
        <li><span><a href="show_position.php">Position</a></span></li>
        <li><span><a href="show_rank.php">Rank</a></span></li>
        <li><span><a href="show_worksheets">Worksheets</a></span></li>
        <li class="last"><span><a href="#">Car</a></span></li>
      </ul>
	</aside>
      <div class="inside">
       <?php
        $link = mysql_connect("localhost", "root", "1234");
        $sql = "use dbvehicle";
        $result = mysql_query($sql);
        $sql = "select * from tbadmin;";
        $result = mysql_query($sql);
        echo "<a href=add_admin.php>เพิ่มรายการแอดมิน</a>";
        echo "<table width=680 >            
             <tr>
                <th width=50 align=center bgcolor=#cccccc>id</th>
                <th width=150 align=center bgcolor=#cccccc>Username</th>
                <th width=150 align=center bgcolor=#cccccc>Password</th>
                <th width=150 align=center bgcolor=#cccccc>Licenses</th>
                <th width=100 align=center bgcolor=#cccccc>Edit</th>
                <th width=100 align=center bgcolor=#cccccc>Delete</th>
             </tr>";
        while($dbarr= mysql_fetch_array($result)){       
            echo "<tr>"; 
            $adid=$dbarr[admin_id];
            echo "    <td width=50 align=center> $dbarr[admin_id]</td>";
            echo "    <td width=150 align=center>$dbarr[username]</td>";
            echo "    <td width=150 align=center>$dbarr[password]</td>";
            $lic=$dbarr[licenses];
            if($lic==0){
                $licenses="admin";
            }else{
                $licenses="user";
            }
            echo "    <td width=150 align=center>$licenses</td>"; 
          echo "    <td width=100 align=center><a href=update_admin.php?adid=$dbarr[admin_id]>Edit</a></td>";
          echo "    <td width=100 align=center><a href=delete_admin.php?adid=$dbarr[admin_id]>Delete</a></td>";
        }mysql_close($link);
        ?>
             </div>
    </section>
  </div>
</div>
</body>
</html>