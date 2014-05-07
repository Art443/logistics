<?php
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
    <table width="550" border="1">
        <tr>
            <td width="80" align="center" valign="middle"><b>ลำดับ</b></td>
            <td width="300" align="center" valign="middle"><b>รายการ</b></td>
            <td width="50" align="center" valign="middle"><b>หมายเลขทะเบียน</b></td>
            <td width="100" align="center" valign="middle"><b>หมายเหตุ</b></td>
        </tr>
        <?
              $sql = "select * 
                  from tbcars, tbcartype, tbbrand, tbworkpart
                  where tbcars.cartype_id=tbcartype.cartype_id &&
                        tbcars.brand_id=tbbrand.brand_id &&
                        tbcars.workpart_id=tbworkpart.workpart_id &&
                   cars_status like '1';";
              $result = mysql_query($sql); 
              $i=0;
               while($dbarr= mysql_fetch_array($result)){
                     $i++;  
        echo"<tr>";
        echo"    <td width=80 align=center valign=middle>$i</td>";
        $ct=$dbarr[cartype_name];
        $bt=$dbarr[brand_name];
        echo"    <td width=300 valign=middle>&nbsp;$ct&nbsp;&nbsp;$bt</td>";
        $num=$dbarr[soilder_number];
                        if($num=="-"){
                            $number=$dbarr[civil_number];
                        }else{
                            $number=$dbarr[soilder_number];
                        }
        echo"    <td width=50 align=center valign=middle>$number</td>";
        $wp = $dbarr[workpart_name];
        if($wp=="ขส."){
                            $wpart="ส่งซ่อม กซ.ขส.ทบ.";
                        }else if($wp=="พธ."){
                            $wpart="ส่งซ่อม ผพธ.กบร.ขส.ทบ.";
                        }else{
                            $wpart="ส่งซ่อม พัน สพ.ซบร.";
                        }
        echo"    <td width=100 align=center valign=middle>$wpart</td>";
        echo"</tr>";
               }mysql_close($link);?>
    </table>
</body>
</html>
