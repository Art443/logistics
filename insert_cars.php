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
          <table width=500 border=0><tr><td align=center><h2>เพิ่มรายการยานพาหนะ</td></tr></table>
                <?php
                    if ($send == NULL){
                ?>
            <form method="post" action="<? echo $php_self?>">
            <table width="500" border="0">
                <tr>
                    <td align="Right">รหัสรถยนต์ : </td>
                    <td><input type="text" name="cars_id"></td>
                </tr>
                <tr>
                    <td align="Right">ประเภทรถ : </td>
                    <td><select name="cartype_id">
                            <?php
                            $sql = "select * from tbcartype;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[cartype_id]>$data[cartype_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="Right">ยี่ห้อรถ : </td>
                    <td><select name="brand_id">
                            <?php                           
                              $sql = "select * from tbbrand;";
                              $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[brand_id]>$data[brand_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td align="Right">หมายเลขยุทโธปกรณ์ : </td>
                    <td><input type="text" name="military_number"></td>
                </tr>
                <tr>
                    <td align="Right">หมายเลขพลเรือน : </td>
                    <td><input type="text" name="civil_number"></td>
                </tr>
                <tr>
                    <td align="Right">หมายเลขวงจักร : </td>
                    <td><input type="text" name="soilder_number"></td>
                </tr> 
                <tr>
                    <td align="Right">หมายเลขเครื่องยนต์ : </td>
                    <td><input type="text" name="cars_engine"></td>
                </tr>
                <tr>
                    <td align="Right">หมายเลขแคร่ : </td>
                    <td><input type="text" name="cars_chasiss"></td>
                </tr>                
                <tr>
                    <td align="Right">สายงาน : </td>
                    <td><select name="workpart_id">
                            <?php                           
                            $sql = "select * from tbworkpart;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[workpart_id]>$data[workpart_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="Right">ราคารถ : </td>
                    <td><input type="text" name="cars_price"></td>
                </tr>
                <tr>
                    <td align="Right">บรรจุ : </td>
                    <td><input type="text" name="MPG_date"></td>
                </tr>
                <tr>
                    <td align="Right">รุ่นปี : </td>
                    <td><input type="text" name="cars_year"></td>
                </tr>
                <tr>
                    <td align="Right">ประจำอยู่ที่ : </td>
                    <td><select name="department_id">
                            <?php                           
                            $sql = "select * from tbdepartment;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[department_id]>$data[department_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
                </tr>               
                
                <tr>
                    <td align="Right">ขนาดยาง : </td>
                    <td><input type="text" name="wheel_size"></td>
                </tr>
                              
                <tr>
                    <td align="Right">ขนาดแบตเตอรี่ : </td>
                    <td><input type="text" name="battery_size"></td>
                </tr>
                <tr>
                    <td align="Right">พลขับ : </td>
                    <td><select name="employee_id">
                            <?php                           
                            $sql = "select * from tbemployee;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[employee_id]>$data[employee_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="Right">status : </td>
                    <td><input type="radio" name="cars_status" value="0" checked>ปกติ  <input type="radio" name="cars_status" value="1" >ส่งซ่อม</td>
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
    
    $sql="Insert into tbcars values('$cars_id','$military_number','$soilder_number','$civil_number','$cars_year','$cars_engine','$cars_chasiss',
        '$battery_size','$wheel_size','$cars_price','$MPG_date','$cars_status','$employee_id','$cartype_id','$brand_id','$department_id',
        '$workpart_id');";
    $result=  mysql_query($sql);
    
    if ($result){
        echo "การเพิ่มข้อมูลลงในฐานข้อมูลประสบความสำเร็จ<br>";
        echo "ถ้ามีความประสงค์จะเพิ่มข้อมูลอีก<a href=insert_cars.php>คลิกที่นี่>>></a>";
        mysql_close();
    }  else {
        echo "ไม่สามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้<br>";
        echo "ลองเพิ่มข้อมูลอีกครั้ง<a href=insert_cars.php>คลิกที่นี่>>></a>";
    }
}
?> 
             </div>
    </section>
  </div>
</div>
</body>
</html>