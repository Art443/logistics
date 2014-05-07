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
          <table width=500 border=0><tr><td align=center><h2>เพิ่มรายการกำลังพล</td></tr></table>
       <?php
if ($send == NULL){
    ?>
<form method="post" action="<? echo $php_self?>">
            <table align="center" width="500" border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" width="400">
                            <tr>
                                <td align="Right" width="150">รหัสเจ้าหน้าที่ : </td>
                                <td width="250"><input type="text" name="employee_id"></td>
                            </tr>
                        </table>
                    </td>
                </tr>                
            </table><br>    
            <table align="center" width="500" border="1" cellpadding="5" cellspacing="0">
                 <tr>
                    <td align="center">
                        <table border="0" width="400">
                            <tr>
                                <td align="Right" width="150">ชั้นยศ : </td>
                                <td width="250">
                                    <select name="rank_id">
                            <?php
                            
                            $sql = "select * from tbrank;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[rank_id]>$data[rank_name]</option>";                            
                            }
                            ?>
                        </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="Right" width="150">ชื่อ : </td>
                                <td width="250"><input type="text" name="employee_name"></td>
                            </tr>  
                            <tr>
                                <td align="Right" width="150">นามสกุล : </td>
                                <td width="250"><input type="text" name="employee_lastname"></td>
                            </tr>
                        </table>                        
                    </td>
                </tr>                
            </table><br>
            <table align="center" width="500" border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" width="400">
                            <tr>
                                <td align="Right" width="150">ตำแหน่ง : </td>
                                <td width="250">
                                    <select name="position_id">
                            <?php                           
                            $sql = "select * from tbposition;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[position_id]>$data[position_name]</option>";                            
                            }
                            ?>
                        </select>
                                </td>
                            </tr>
                        </table>                        
                    </td>
                </tr>                
            </table>
            <table width="400" border="0" align="center">    
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
    
    $sql="Insert into tbemployee values('$employee_id','$employee_name','$employee_lastname','$rank_id','$position_id');";
    $result=  mysql_query($sql);
    if ($result){
        echo "การเพิ่มข้อมูลลงในฐานข้อมูลประสบความสำเร็จ<br>";
        echo "ถ้ามีความประสงค์จะเพิ่มข้อมูลกำลังพลอีก<a href=insert_employee.php>คลิกที่นี่</a>";
        mysql_close();
    }  else {
        echo "ไม่สามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้<br>";
        echo "ลองเพิ่มข้อมูลอีกครั้ง<a href=insert_employee.php>คลิกที่นี่</a>";
    }
}
?> 
      </div>
    </section>
  </div>
</div>
</body>
</html>