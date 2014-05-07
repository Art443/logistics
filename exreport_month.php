<?php
        $strExcelFileName="report_month.xls";
        header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
        header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
        header("Pragma:no-cache");
        include 'include/conn.php';
        include 'include/check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Royal Thai Army</title>
<meta charset="utf-8">
<!--<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
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
    <body>
       <?
        $today=  getdate();
        $ty=$today[year]+543;
       
        if($today[mon]==1){
            $td="ม.ค.";
        }elseif ($today[mon]==2) {
            $td="ก.พ.";
        }elseif ($today[mon]==3) {
            $td="มี.ค.";
        }elseif ($today[mon]==4) {
            $td="เม.ย.";
        }elseif ($today[mon]==5) {
            $td="พ.ค.";
        }elseif ($today[mon]==6) {
            $td="มิ.ย.";
        }elseif ($today[mon]==7) {
            $td="ก.ค.";
        }elseif ($today[mon]==8) {
            $td="ส.ค.";
        }elseif ($today[mon]==9) {
            $td="ก.ย.";
        }elseif ($today[mon]==10) {
            $td="ต.ค.";
        }elseif ($today[mon]==11) {
            $td="พ.ย.";
        }else{
            $td="ธ.ค.";
        }
        ?>
        <center>ผนวก ข.<br>บัญชียานพาหนะเข้ารับการตรวจ<br>ประจำเดือน ........<?echo $td;echo $ty;?>................</center>
        <table>
            <table border="1" width="1300">
                <td width="15.0pt" rowspan="2" align='center'>ลำดับ</td>
                <td width="500" rowspan="2" align='center' colspan='2'>ชนิดของยานพาหนะ / หมายเลขยุทโธปกรณ์</td>
                <td width="15" rowspan="2" align='center'>หมายเลข<br>ทะเบียน</td>
                <td colspan="2" align="center" >สถานภาพ</td>
                <td colspan="2" align='center' >การดำเนินการ</td>
                <td colspan="2" align='center'>ผลการตรวจ</td>
            </tr>
            <tr>
                
                <td width="60">ใช้การได้</td>
                <td width='60'>งดใช้การ</td>
                <td width='100' align='center'>ซ่อมขั้นหน่วย</td>
                <td width='150' align='center'>ซ่อมขั้นหน่วยเหนือ</td>
                <td width='80' align="center">ความสะอาด</td>
                <td width='70' align="center">ปรนนิบัติบำรุง</td>
            </tr>
            <?
              $sql = "select * 
                  from tbcars, tbcartype, tbbrand, tbworkpart
                  where tbcars.cartype_id=tbcartype.cartype_id &&
                        tbcars.brand_id=tbbrand.brand_id &&
                        tbcars.workpart_id=tbworkpart.workpart_id;";
              $result = mysql_query($sql); 
              $i=0;
               while($dbarr= mysql_fetch_array($result)){ 
                   echo '<tr>';
                   $i++;                   
                   echo "<td width=15 align=center>$i</td>";
                   $ct=$dbarr[cartype_name];
                   $bt=$dbarr[brand_name];
                   echo "<td width=350>&nbsp;$ct&nbsp;&nbsp;$bt</td>";
                   echo "<td width=150 align=center>$dbarr[military_number]</td>";
                   
                   $num=$dbarr[soilder_number];
                        if($num=="-"){
                            $number=$dbarr[civil_number];
                        }else{
                            $number=$dbarr[soilder_number];
                        }
                   echo "<td width=50 align=center>$number</td>";
                   
                   $sta=$dbarr[cars_status];
                        if($sta==0){
                            $status="/";
                         }else{
                            $status="-";
                            }                            
                   echo "<td width=60 align=center>$status</td>";
                   
                   if($sta==0){
                            $status1="-";
                         }else{
                            $status1="/";
                            }                            
                   echo "<td width=60 align=center>$status1</td>";          
                   echo "<td width=100 align=center> - </td>";
                   
                   $wp = $dbarr[workpart_name];
                   if($sta==0){
                       $wpart="-";
                   }else{
                        if($wp=="ขส."){
                            $wpart="ส่งซ่อม กซ.ขส.ทบ.";
                        }else if($wp=="พธ."){
                            $wpart="ส่งซ่อม ผพธ.กบร.ขส.ทบ.";
                        }else{
                            $wpart="ส่งซ่อม พัน สพ.ซบร.";
                        }
                   }
                   echo "<td width=150 align=center>$wpart</td>";
                   if($sta==0){
                            $status2="สะอาด";
                         }else{
                            $status2="-";
                            }
                   echo "<td width=100 align=center>$status2</td>";
                   
                        if($sta==0){
                            $status3="เรียบร้อย";
                         }else{
                            $status3="-";
                            }
                   echo "<td width=150 align=center>$status3</td>";
                   }mysql_close($link);
             
             ?>
            
        </table>
               
    </body>
</html>
