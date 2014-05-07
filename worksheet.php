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
      <?  include 'include/top_menu_user.php';?>      
    </div>
  </header>
  <div class="container">
    <aside>
      <?  include 'include/menu_user.php';?>  
    </aside>
   <div class="inside">
       <form action="show_worksheet.php" method="post">
       <table width="500" border="1">
           <tr>
               <td width="150" align="right" valign="middle">ที่ใบเบิก :</td>
               <td width="350"><input type="text" name="worksheet_number"></td>
           </tr>
           <tr>
               <td width="150" align="right" valign="middle">หน่วยจ่าย :</td>
               <td><select name="repace_id">
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
               <td width="150" align="right" valign="middle">หน่วยเบิก :</td>
               <td><select name="requist_id">
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
               <td width="150" align="right" valign="middle">สายงาน :</td>
               <td><select name="wpart_id">
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
               <td width="150" align="right" valign="middle">รายการที่ :</td>
               <td><select name="part_id1">
                            <?php                           
                            $sql = "select * from tbpart;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[part_id]>$data[part_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
           </tr>
           <tr>
               <td width="150" align="right" valign="middle">จำนวนที่เบิก :</td>
               <td width="350"><input type="text" name="value1"></td>
           </tr>
           <tr>
               <td width="150" align="right" valign="middle">ผู้มีสิทธิรับสิ่งอุปกรณ์ :</td>
               <td><select name="emp_lic_id">
                            <?php                           
                            $sql = "select * from tbemployee where position_id like 'po5';";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[employee_id]>$data[employee_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
           </tr>
           <tr>
               <td width="150" align="right" valign="middle">ผู้มีสิทธิเบิก :</td>
               <td><select name="emp_lic_id1">
                            <?php                           
                            $sql = "select * from tbemployee ;";
                            $result = mysql_query($sql);
                            while ($data = mysql_fetch_array($result) ) {
                                echo "<option value=$data[employee_id]>$data[employee_name]</option>";                            
                            }
                            ?>
                        </select>
                    </td>
           </tr>
           <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="send" value="ตกลง">
                        <input type="reset" name="cancel" value="ยกเลิก">
                    </td>                    
                </tr>
       </table>
       </form>
  </div>
</div>
</body>
</html>