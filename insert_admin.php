<!DOCTYPE html>
<?
ob_start();
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
          <table width=500 border=0><tr><td align=center><h2>เพิ่มรายการผู้ดูแลระบบ</td></tr></table>
       <?php
if ($send == NULL){
    ?>
<form method="post" action="<? echo $php_self?>">
            <table width="500" border="0">
                <tr>
                    <td align="Right">ID : </td>
                    <td><input type="text" name="admin_id"></td>
                </tr>
                <tr>
                    <td align="Right">Username : </td>
                    <td><input type="text" name="username"></td>
                </tr>  
                <tr>
                    <td align="Right">Password : </td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td align="Right">Licenses : </td>
                    <td><input type="radio" name="licenses" value="0">admin <br> <input type="radio" name="licenses" value="1" checked>user <br> <input type="radio" name="licenses" value="2" checked>commander</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="send" value="ตกลง">
                        <input type="reset" name="cancel" value="ยกเลิก">
                    </td>                    
                </tr>
            </table>
        </form>
<?}
 else {
    
    $sql="Insert into tbadmin values('$admin_id','$username','$password','$licenses');";
    $result=  mysql_query($sql);
    if ($result){
        echo "การเพิ่มข้อมูลลงในฐานข้อมูลประสบความสำเร็จ<br>";
        mysql_close();
    }  else {
        echo "ไม่สามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้<br>";
    }
}
?>
             </div>
    </section>
  </div>
</div>
</body>
</html>