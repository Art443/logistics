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
    <?
        $ws_num=$worksheet_number;        
        
        $sql = "select * from tbdepartment where department_id='$repace_id';";
        $result = mysql_query($sql);
        $dbarr =  mysql_fetch_array($result);
        
        $sql1 = "select * from tbdepartment where department_id='$requist_id';";
        $result1 = mysql_query($sql1);
        $dbarr1 =  mysql_fetch_array($result1);
        
        $sql2 = "select * from tbworkpart where workpart_id='$wpart_id';";
        $result2 = mysql_query($sql2);
        $dbarr2 =  mysql_fetch_array($result2);
        
        $sql3 = "select * from tbpart where part_id='$part_id1';";
        $result3 = mysql_query($sql3);
        $dbarr3 =  mysql_fetch_array($result3);
        
        $sql4 = "select * from tbemployee, tbrank where tbemployee.rank_id=tbrank.rank_id && employee_id='$emp_lic_id';";
        $result4 = mysql_query($sql4);
        $dbarr4 =  mysql_fetch_array($result4);
        
        $sql5 = "select * from tbemployee, tbrank where tbemployee.rank_id=tbrank.rank_id && employee_id='$emp_lic_id1';";
        $result5 = mysql_query($sql5);
        $dbarr5 =  mysql_fetch_array($result5);
        
        /*$sql6 = "select * from tbpart where part_id='$part_id4';";
        $result6 = mysql_query($sql6);
        $dbarr6 =  mysql_fetch_array($result6);
        
        $sql7 = "select * from tbpart where part_id='$part_id5';";
        $result7 = mysql_query($sql7);
        $dbarr7 =  mysql_fetch_array($result7);*/
    ?>
          <table border="1" width="920">              
              <tr colspan="13">
                  <td colspan="13" align="right"> ทบ.๔๐๐-๐๐๖</td>
              </tr>
              <tr>
                  <td height="31" colspan="6" align="center" valign="middle">ใบเบิก</td>
                  <td colspan="7" valign="middle">แผ่นที่...........................ในจำนวน..................แผ่น</td>
            </tr>
              <tr>
                <td width="35" rowspan="2"></td>
                  <td colspan="2" rowspan="2" valign="middle">หน่วยจ่าย    <?echo $dbarr[department_name];?></td>
                  <td height="31" colspan="3"  valign="middle">ที่ <?echo $ws_num;?></td>
                  <td colspan="7" valign="middle">สายงานที่ควบคุม  <?echo $dbarr2[workpart_name];?></td>
              </tr>
              <tr>
                  <td height="31" colspan="3" valign="middle" align="center">เบิกในกรณี</td>
                  <td colspan="7" valign="middle">ประเภทสิ่งอุปกรณ์</td>
            </tr>
              <tr>
                <td rowspan="2"></td>
                  <td colspan="2" rowspan="2" valign="middle"><p>หน่วยเบิก  <?echo $dbarr1[department_name];?></p>
                  <p>จ่ายให้หน่วย</p></td>
                  <td width="55" height="31" align="center" valign="middle">ขั้นต้น</td>
                  <td width="55" align="center" valign="middle">ทดแทน</td>
                  <td width="55" align="center" valign="middle">ยืม</td>
                  <td colspan="7" valign="middle">ประเภทเงิน</td>
              </tr>
              <tr>
                  <td height="31" align="center" valign="middle"> </td>
                  <td align="center" valign="middle">/ </td>
                  <td align="center" valign="middle"> </td>
                  <td colspan="7" valign="middle">เลขที่งาน</td>
            </tr>
              <tr>
              	<td height="30" align="center" valign="middle">ลำดับ</td>
                <td width="100" align="center" valign="middle"><p>หมายเลข</p>
                <p>สิ่งอุปกรณ์</p></td>
                <td width="200" align="center" valign="middle">รายการ</td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"><p>คงคลัง</p>
                <p>ค้างรับ</p>
                <p>ค้างจ่าย</p></td>
                <td align="center" valign="middle">หน่วยนับ</td>
                <td width="50" align="center" valign="middle"><p>จำนวน</p>
                <p>เบิก</p></td>
                <td colspan="2" align="center" valign="middle" width="200">ราคาหน่วยละ</td>
                <td colspan="2" align="center" valign="middle" width="45">ราคารวม</td>
                <td colspan="2" align="center" valign="middle" width="86"><p>จ่ายจริง/</p>
                <p>ค้างจ่าย</p></td>
              </tr>
              <tr>
              	<td height="500">
                    <?
                        if($value==""){
                            
                        }else{
                            echo "1";
                        }
                    ?>
                </td>
                <td></td>
                <td><?echo $dbarr3[part_name];?></td>
                <td></td>
                <td></td>
                <td align="center" style="padding: 5px;"><?echo $dbarr3[part_count];?></td>
                <td align="center" style="padding:5px;"><?echo $value1;?></td>
                <td width="70"></td>
                <td width="40"></td>
                <td width="70"></td>
                <td width="40"></td>
                <td width="50" colspan="2"></td>                
              </tr>
              <tr>
              	<td height="30" colspan="14" valign="middle">หลักฐานที่ใช้ในการเบิก</td>
              </tr>
          </table>
<table border="0" width="920">
          	<tr height="30.0pt">
           	  <td width="300" colspan="3" valign="middle">ตรวจสอบแล้วเห็นว่า...................................................</td>
                <td width="100"></td>
                <td width="450" colspan="3" valign="middle">ขอเบิกสิ่งอุปกรณ์ที่ระบุไว้ในช่อง  &quot;จำนวนเบิก&quot;  และขอมอบ</td>                
            </tr>
            <tr height="30.0pt">
            	<td width="300" colspan="3" valign="middle">....................................................................................</td>
                <td width="100"></td>
                <td width="450" colspan="3" valign="middle">ให้..............<?echo $dbarr4[rank_name]&nbsp;$dbarr4[employee_name]&nbsp;$dbarr4[employee_lastname];?>.............เป็นผู้รับแทน</td>                
            </tr>
            <tr height="30.0pt">
            	<td width="170" valign="middle">.................................................</td>
                <td width="30"></td>
                <td width ="100" valign="middle">..............................</td>
                <td width="50"></td>
                <td width="250" valign="middle">.............................................................</td>
                <td width="50"></td>
                <td width="200" valign="middle">.........................................</td>
            </tr>
            <tr height="30.0pt">
            	<td width="170" align="center" valign="middle">(ลงนาม)ผู้ตรวจสอบ</td>
                <td width="30"></td>
                <td width ="100" align="center" valign="middle">วัน เดือน ปี</td>
                <td width="50"></td>
                <td width="250" align="center" valign="middle">(ลงนาม)ผู้เบิก</td>
                <td width="50"></td>
                <td width="200" align="center" valign="middle">วัน เดือน ปี</td>
            </tr>
          </table>
    <table border="1" width="920"><tr><td></td></tr></table>
    <table border="0" width="920">
          	<tr height="30.0pt">
           	  <td width="430" colspan="3" valign="middle">อนุมัติให้จ่ายได้เฉพาะในรายการและจำนวนที่ผู้ตรวจสอบเสนอ</td>
                <td width="10"></td>
                <td width="480" colspan="3" valign="middle">ได้รับสิ่งอุปกรณ์ตามรายการและจำนวนที่แจ้งไว้ในช่อง "จ่ายจริง/ค้างจ่าย" แล้ว</td>                
            </tr>            
            <tr height="30.0pt">
            	<td width="230" valign="middle">.................................................</td>
                <td width="50"></td>
                <td width ="150" valign="middle">..............................</td>
                <td width="10"></td>
                <td width="280" valign="middle">.............................................................</td>
                <td width="50"></td>
                <td width="200" valign="middle">.........................................</td>
            </tr>
            <tr height="30.0pt">
            	<td width="230" align="center" valign="middle">(ลงนาม)ผู้สั่งจ่าย</td>
                <td width="50"></td>
                <td width ="150" align="center" valign="middle">วัน เดือน ปี</td>
                <td width="10"></td>
                <td width="280" align="center" valign="middle">(ลงนาม)ผู้รับ</td>
                <td width="50"></td>
                <td width="200" align="center" valign="middle">วัน เดือน ปี</td>
            </tr>
          </table>
          <table border="1" width="920"><tr><td></td></tr></table>
    <table border="0" width="920">
          	<tr height="30.0pt">
           	  <td width="430" colspan="3" valign="middle">อนุมัติให้จ่ายได้เฉพาะในรายการและจำนวนที่ผู้ตรวจสอบเสนอ</td>
                <td width="10"></td>
                <td width="480" colspan="3" rowspan="3" valign="middle">ทะเบียนหน่วยจ่าย</td>                
            </tr>            
            <tr height="30.0pt">
            	<td width="230" valign="middle">.................................................</td>
                <td width="50"></td>
                <td width ="150" valign="middle">..............................</td>
                <td width="10"></td>
            </tr>
            <tr height="30.0pt">
            	<td width="230" align="center" valign="middle">(ลงนาม)ผู้สั่งจ่าย</td>
                <td width="50"></td>
                <td width ="150" align="center" valign="middle">วัน เดือน ปี</td>
                <td width="10"></td>
            </tr>
          </table>
          <table border="0" width="920"><tr><td align="center" valign="middle">(พิมพ์ตามระเบียบกองทัพบกว่าด้วยการส่งกำลังสิ่งอุปกรณ์ประเภท ๒ และ ๔ พ.ศ.๒๕๓๔)</td></tr></table>

</body>
</html>