<?  //session_start();
  include 'include/conn.php';
  session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
    <body>
     
        <?php
        $uname=$_POST['user'];
        $pword=$_POST['pass'];
        
        
        $sql = "select count(*) from tbadmin WHERE username = '$uname' AND password = '$pword';";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        
        if($row[0] == 1)  //ถ้าจำนวนแถวเท่ากับ 1 แสดงว่ามีข้อมูลตามที่ผู้ใช้ล็อกอิน
        {
            
            $sql="SELECT * from tbadmin WHERE username = '$uname' AND password = '$pword';";
            $result = mysql_query($sql);
            $dbarr = mysql_fetch_array($result);
            
            $_SESSION['sessusername'] = $dbarr[username];
            $_SESSION['sesspassword'] = $dbarr[password];
            
            $lic=$dbarr[licenses];
            
            if($lic==0){
                include 'admin.php';
            }else if ($lic==1){
                include 'user.php';
            }else{
                include 'commander.php';
            }
        }else{  // ถ้าไม่มีข้อมูลตามที่ผู้ใช้ล็อกอิน
            echo "Username or Password incorrect";
        }
?>  
       
        

        
    </body>
</html>
