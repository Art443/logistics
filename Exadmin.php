<?
include 'include/conn.php';
$strExcelFileName="test.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>
            DOWNLOAD : 
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
     <strong>ทดสอบ</strong><br>
<br>
   <?php
        
        $sql = "select * from tbadmin;";
        $result = mysql_query($sql);
       
        echo "<table width=680 border=1 bordercolor=000000 cellspacing=0>            
             <tr>
                <th width=50 align=center bgcolor=#cccccc>id</th>
                <th width=150 align=center bgcolor=#cccccc>Username</th>
                <th width=150 align=center bgcolor=#cccccc>Password</th>
                <th width=150 align=center bgcolor=#cccccc>Licenses</th>
                
             </tr>";
        while($dbarr= mysql_fetch_array($result)){       
            echo "<tr>";         
            echo "    <td width=50 align=center> $dbarr[admin_id]</td>";
            echo "    <td width=150 align=center>$dbarr[username]</td>";
            echo "    <td width=150 align=center>$dbarr[password]</td>";
            $lic=$dbarr[licenses];
            if($lic==0){
                $licenses="admin";
            }else{
                $licenses="user";
            }
            echo "    <td width=150 align=center>$licenses</td>"; 
                  }mysql_close($link);
        ?> 
    </body>
</html>
