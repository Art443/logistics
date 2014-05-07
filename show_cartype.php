<!DOCTYPE html>
<?
//session_start();
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
       <?php
       echo "<table width=500 border=0><tr><td align=center><h2>รายการประเภทยานพาหนะ</td></tr></table>";
        echo "<a href=insert_cartype.php><img src=images/add.png width=20 heigth=20> Add Infomation</a>";
       $sql = "select * from tbcartype;";
        $result = mysql_query($sql);
        echo "<table width=500 border=1 bordercolor=#000000 cellspacing=0>            
             <tr>
                <td width=200 align=center bgcolor=#cccccc><b>รหัสประเภทรถ</b></td>
                <td width=300 align=center bgcolor=#cccccc><b>ชื่อประเภทรถ</b></th>
                <td width=100 align=center bgcolor=#cccccc><b>Edit</b></th>
                <td width=100 align=center bgcolor=#cccccc><b>Delete</b></th>
             </tr>";
        while($dbarr= mysql_fetch_array($result)){       
            echo "<tr>";                 
            echo "    <td width=200 align=center> $dbarr[cartype_id]</td>";
            echo "    <td width=300 align=center>$dbarr[cartype_name]</td>";  
          
          echo "    <td width=100 align=center><a href=update_cartype.php?adid=$dbarr[cartype_id]><img src=images/edit.png width=20 heigth=20></a></td>";
          echo "    <td width=100 align=center><a href=delete_cartype.php?adid=$dbarr[cartype_id]><img src=images/delete.png width=20 heigth=20></a></td>";
        }mysql_close($link);
        ?>
             </div>
    </section>
  </div>
</div>
</body>
</html>