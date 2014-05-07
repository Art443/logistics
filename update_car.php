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
          <table width=500 border=0><tr><td align=center><h2>แก้ไขรายการยานพาหนะ</td></tr></table>
          <?php
if ($send==NULL){

echo "<form method=post action=$php_self>";
    $sql= "select *
           from tbcars where cars_id = '$adid';";
    $result=  mysql_query($sql);
    
    $dbarr =  mysql_fetch_array($result);
    echo "<table width=500 border=0>
            <tr>
                <td width=180>รหัสยานพาหนะ :</td>
                <td width=320>$adid</td>
            </tr>
            <tr>
                <td width=180>ประเภทยานพาหนะ :</td>
                <td width=320>";
            
       echo"         <select name=Etype_id>";
                    $sql = "select * from tbcartype;";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result) ) {
     echo "<option value=$data[cartype_id]>$data[cartype_name]</option>";}       
       echo "</select>
                </td>
            </tr>
            <tr>
                <td width=180>ยี่ห้อยานพาหนะ :</td>
                <td width=320>
                   <select name=Ebrand_id>";
                    $sql = "select * from tbbrand;";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result) ) {
     echo "<option value=$data[brand_id]>$data[brand_name]</option>";                            
       };
     echo "</select>
                </td>
            </tr>
           <tr>
                <td width=180>หมายเลขยุทโธปกรณ์ :</td>
                <td width=320><input type=text name=Emnum Value=$dbarr[military_number]></td>
            </tr>
            <tr>
                <td width=180>เลขหมายทะเบียนวงจักร :</td>
                <td width=320><input type=text name=Esnum Value=$dbarr[soilder_number]></td>
            </tr>
            <tr>
                <td width=180>เลขหมายทะเบียนพลเรือน :</td>
                <td width=320><input type=text name=Ecnum Value=$dbarr[civil_number]></td>
            </tr>
            <tr>
                <td width=180>หมายเลขเครื่องยนต์ :</td>
                <td width=320><input type=text name=Eengine Value=$dbarr[cars_engine]></td>
            </tr>
            <tr>
                <td width=180>หมายเลขแคร่ :</td>
                <td width=320><input type=text name=Echasiss Value=$dbarr[cars_chasiss]></td>
            </tr>            
            <tr>
                <td width=180>สายงานสิ่งอุปกรณ์ :</td>
                <td width=320>
                    <select name=Ewpart_id>";
                    $sql = "select * from tbworkpart;";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result) ) {
     echo "<option value=$data[workpart_id]>$data[workpart_name]</option>";                            
       };
     echo "</select>
                </td>
            </tr>
            <tr>
                <td width=180>ราคา :</td>
                <td width=320><input type=text name=Eprice Value=$dbarr[cars_price]></td>
            </tr>
            <tr>
                <td width=180>บรรจุ :</td>
                <td width=320><input type=text name=Edate Value=$dbarr[MPG_date]></td>
            </tr>
            <tr>
                <td width=180>รุ่นปี :</td>
                <td width=320><input type=text name=Eyear Value=$dbarr[cars_year]></td>
            </tr>
            <tr>
                <td width=180>ขนาดยาง :</td>
                <td width=320><input type=text name=Ewheel Value=$dbarr[wheel_size]></td>
            </tr>
            <tr>
                <td width=180>ขนาดแบตเตอรี่ :</td>
                <td width=320><input type=text name=Ebatt Value=$dbarr[battery_size]></td>
            </tr>
             <tr>
                <td width=180>ประจำอยู่ที่ :</td>
                <td width=320>
                    <select name=Edepart_id>";
                    $sql = "select * from tbdepartment;";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result) ) {
     echo "<option value=$data[department_id]>$data[department_name]</option>";                            
       };
     echo "</select>
                </td>
            </tr>
            <tr>
                <td width=180>พลขับประจำ :</td>
                <td width=320>
                    <select name=Eemp_id>";
                    $sql = "select * from tbemployee;";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result) ) {
     echo "<option value=$data[employee_id]>$data[employee_name]</option>";                            
       };
     echo "</select>
                </td>
            </tr>
            <tr>
                <td width=180>สถานะภาพ :</td>";
                $lic=$dbarr[licenses];
                if($lic==0){
                echo "<td><input type=radio name=Elic Value=0 checked=true>ปกติ&nbsp;<input type=radio name=Elic Value=1>ส่งซ่อม</td>";
                                                 
            }else{
                echo "<td><input type=radio name=Elic Value=0>ปกติ &nbsp;<input type=radio name=Elic Value=1 checked=true>ส่งซ่อม</td>"; 
                 }
    echo"           </tr>
            <tr>
            <td align=center colspan=2><input type=submit name=send value=submit>&nbsp;&nbsp;<input type=reset name=reset value=cancel></td>
            
            </tr>
          </table>";
     
   echo "</form>";
}  else {
    
    $sql = "update tbcars set cartype_id='$Etype_id',brand_id='$Ebrand_id',military_number='$Emnum',soilder_number='$Esnum',
         civil_number='$Ecnum',cars_engine='$Eengine',cars_chasiss='$Echasiss',workpart_id='$Ewpart_id',cars_price='$Eprice',
         MPG_date='$Edate',cars_year='$Eyear', wheel_size='$Ewheel', battery_size='$Ebatt', department_id='$Edepart_id',
         employee_id='$Eemp_id' where cars_id='$adid'";
        $result = mysql_query($sql);
            if ($result){
                echo"การแก้ไขข้อมูลในฐานข้อมูลประสบความสำเร็จ<br>";
                echo "ประสงค์จะแก้ไขข้อมูลเพิ่มเติม <a href=show_car.php>คลิกที่นี่>>></a>";
                 mysql_close($link);
            }  else {
                echo "ไม่สามารถแก้ไขข้อมูลในฐานข้อมูลได้<br>";
                echo "ประสงค์จะแก้ไขข้อมูลอีกครั้ง <a href=show_car.php>คลิกที่นี่>>></a>";
            }
   //mysql_close($link);
   
}
?>
      </div>
    </section>
  </div>
</div>
</body>
</html>
<?/*
       
            */
        ?>