<?php
        include 'include/conn.php';
        include 'include/check_login.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        // put your code here
        ?>
        <center>ผนวก ข.<br>บัญชียานพาหนะเข้ารับการตรวจ<br>ประจำเดือน ........................</center>
        <table>
            <table border="1" width="1500">
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
                <td width='80'>ความสะอาด</td>
                <td width='100'>ปรนนิบัติบำรุง</td>
            </tr>
            <?
              $sql = "select * 
                  from tbcars, tbworkpart, tbcartype, tbbrand
                  where tbcars.workpart_id=tbworkpart.workpart_id &&
                        tbcars.cartype_id=tbcartype.cartype_id &&
                        tbcars.carbrand_id=tbbrand.brand_id;";
              $result = mysql_query($sql); 
               while($dbarr= mysql_fetch_array($result)){ 
                   echo '<tr>';
                   
                   
                   echo '<td width=15></td>';
                   $ct=$dbarr[cartype_name];
                   $bt=$dbarr[brand_name];
                   echo "<td width=500>$ct&nbsp;$bt</td>";
                   echo '<td width=200></td>';
                   
                   $num=$dbarr[soilder_number];
                        if($num==null){
                            $number=$dbarr[civil_number];
                        }else{
                            $number=$dbarr[soilder_number];
                        }
                   echo "<td width=15 align=center>$number</td>";
                   
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
                        }elseif($wp=="พธ."){
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
