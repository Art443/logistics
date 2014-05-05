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
          <form method="post" action="<? echo $php_self?>">

    กรุณากรอกหมายเลขทะเบียนรถ<p>
        เลขหมายทะเบียนรถ : <input type="text" name="id_val"><input type="submit" name="send" value="Serch">
        
</form>
          <?php
if ($send==NULL){

}  else {
    
    $sql = "select * 
                  from tbcars, tbworkpart, tbcartype, tbbrand, tbdepartment
                  where tbcars.workpart_id=tbworkpart.workpart_id &&
                        tbcars.cartype_id=tbcartype.cartype_id &&
                        tbcars.carbrand_id=tbbrand.brand_id &&
                        tbcars.department_id=tbdepartment.department_id &&
            civil_number = '$id_val';";
    $result=  mysql_query($sql);
   // echo "<form action=update_rank_result.php?Empno=$id_val method=post>";
    $dbarr =  mysql_fetch_array($result);
    echo "<tabale width=500 border=1>
            <tr><td colspan=2>$id_val</td></tr>
            <tr>
                <td>ประเภทรถ:</td>
                <td>$dbarr[cartype_name]</td>
            </tr>
            <tr>
                <td>ยี่ห้อรถ:</td>
                <td>$dbarr[brand_name]</td>
            </tr>
            <tr>
                <td>หมายเลขเครื่องยนต์:</td>
                <td>$dbarr[cars_engine]</td>
            </tr>
          </table><br>";
 
    
    
    echo "หมายเลขแคร่: ".$dbarr[cars_chasiss]."<br>";
    echo "หน่วยรับผิดชอบ: ".$dbarr[department_name]."<br>";
    echo "สายงาน: ".$dbarr[workpart_name]."<br>";
                    $sta=$dbarr[cars_status];   
                    $wp = $dbarr[workpart_name];
                   if($sta==0){
                       $wpart="ปกติ";
                   }else{
                        if($wp=="ขส."){
                            $wpart="ส่งซ่อม กซ.ขส.ทบ.";
                        }elseif($wp=="พธ."){
                            $wpart="ส่งซ่อม ผพธ.กบร.ขส.ทบ.";
                        }else{
                            $wpart="ส่งซ่อม พัน สพ.ซบร.";
                        }
                   }
    echo "สถานะ: ".$wpart."<br>";
    //echo "<input type=text name=Ename Value=><br>";
    
    //echo "<input type=submit name=submit value=submit>";
   // echo "<input type=reset name=reset value=cancel>";
    //echo "</form>";
   mysql_close($link);
   
}
?>
      </div>
    </section>
  </div>
</div>
</body>
</html>