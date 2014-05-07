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
          <table width=500 border=0><tr><td align=center><h2>แก้ไขรายการผู้ดูแลระบบ</td></tr></table>
          <?php
if ($send==NULL){

echo "<form method=post action=$php_self>";
    $sql= "select * from tbadmin where admin_id = '$adid';";
    $result=  mysql_query($sql);
    
    $dbarr =  mysql_fetch_array($result);
    echo "<table width=500 border=0>
            <tr>
                <td width=150>รหัส :</td><td width=350 colspan=3>$adid</td>
            </tr>
            <tr>
                <td width=150>User :</td><td width=350 colspan=3><input type=text name=Euser Value=$dbarr[username]></td>
            </tr>
            <tr>
                <td width=150>Password :</td><td width=350 colspan=3><input type=text name=Epass Value=$dbarr[password]></td>
            </tr>
            <tr>
                <td width=150>Licenses :</td>";
                $lic=$dbarr[licenses];
                if($lic==0){
                echo "<td><input type=radio name=Elic Value=0 checked=true>admin </td>
                      <td><input type=radio name=Elic Value=1>user</td>
                      <td><input type=radio name=Elic Value=2>commander</td>";
            }elseif($lic==1){
                echo "<td><input type=radio name=Elic Value=0>admin</td> 
                      <td><input type=radio name=Elic Value=1 checked=true>user</td>
                      <td><input type=radio name=Elic Value=2>commander</td>";
            }else{
                echo "<td><input type=radio name=Elic Value=0>admin</td> 
                      <td><input type=radio name=Elic Value=1>user</td>
                      <td><input type=radio name=Elic Value=2 checked=true>commander</td>";
            }
    echo        "</tr>";
    echo"      </table>";
    
    echo "<input type=submit name=send value=submit>";
    echo "<input type=reset name=reset value=cancel>";
    echo "</form>";
}  else {
    
    $sql = "update tbadmin set username='$Euser',password='$Epass',licenses='$Elic'  where admin_id='$adid'";
        $result = mysql_query($sql);
            if ($result){
                echo"การแก้ไขข้อมูลในฐานข้อมูลประสบความสำเร็จ<br>";
                echo "ประสงค์จะแก้ไขข้อมูลเพิ่มเติม <a href=show_position.php>คลิกที่นี่>>></a>";
                 mysql_close($link);
            }  else {
                echo "ไม่สามารถแก้ไขข้อมูลในฐานข้อมูลได้<br>";
                echo "ประสงค์จะแก้ไขข้อมูลอีกครั้ง <a href=show_position.php>คลิกที่นี่>>></a>";
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