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
          <table width=500 border=0><tr><td align=center><h2>เพิ่มรายการหน่วยรับผิดชอบยานพาหนะ</td></tr></table>
      <?php
if ($send == NULL){
    ?>
<form method="post" action="<? echo $php_self?>">
            <table width="500" border="0">
                <tr>
                    <td align="Right">รหัสหน่วยงาน : </td>
                    <td><input type="text" name="department_id"></td>
                </tr>  
                <tr>
                    <td align="Right">ชื่อหน่วยงาน : </td>
                    <td><input type="text" name="department_name"></td>
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
    $link = mysql_connect("localhost","root","1234");
    $sql = "use dbvehicle";
    $result=  mysql_query($sql);
    $sql="Insert into tbdepartment values('$department_id','$department_name');";
    $result=  mysql_query($sql);
    if ($result){
        echo "การเพิ่มข้อมูลลงในฐานข้อมูลประสบความสำเร็จ<br>";
        echo "ถ้ามีความประสงค์จะเพิ่มข้อมูลหน่วยรับผิดชอบรถอีก<a href=insert_department.php>คลิกที่นี่</a>";
        mysql_close();
    }  else {
        echo "ไม่สามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้<br>";
        echo "ลองเพิ่มข้อมูลอีกครั้ง<a href=insert_department.php>คลิกที่นี่</a>";
    }
}
?>  
      </div>
    </section>
  </div>
</div>
</body>
</html>