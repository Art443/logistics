<?php

include 'include/conn.php';
$strExcelFileName="report.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
         <center>ผนวก ข.<br>บัญชียานพาหนะเข้ารับการตรวจ<br>ประจำเดือน ........................</center>
        <table>
            <table border="1" width="1500">
                <td width="15.0pt" rowspan="2" align='center'>ลำดับ</td>
                <td width="700" rowspan="2" align='center' colspan='2'>ชนิดของยานพาหนะ / หมายเลขยุทโธปกรณ์</td>
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
              $sql = "select * from tbdepartment;";
              $result = mysql_query($sql); 
               while($dbarr= mysql_fetch_array($result)){ 
                   echo '<tr>';
                   echo '<td width=15></td>';
                   echo '<td width=500></td>';
                   echo '<td width=200></td>';
                   echo "<td width=15>$dbarr[soilder_number]</td>";
                   echo '<td width=60></td>';
                   echo '<td width=60></td>';
                   echo '<td width=100></td>';
                   echo '<td width=150></td>';
                   echo '<td width=100></td>';
                   echo '<td width=150></td>';
                   }mysql_close($link);
             ?>
            
        </table>
    </body>
</html>
