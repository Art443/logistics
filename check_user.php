<?  //session_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
    <body>
     
        <?php
        $uname=$_POST['user'];
        $pword=$_POST['pass'];
        
        $link = mysql_connect("localhost", "root", "1234");
        $sql = "use dbvehicle";
        $result = mysql_query($sql);
        
        
        //echo $uname;
        //echo $pword;
        //sql เพื่อดึงจำนวนแถวที่ตรงกับเงื่อนไข คือ ซึ่อผู้ใช้งานและรหัสผ่านที่เข้ารหัสแล้ว
        $sql = "select count(*) from tbadmin WHERE username = '$uname' AND password = '$pword';";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        
        if($row[0] == 1)  //ถ้าจำนวนแถวเท่ากับ 1 แสดงว่ามีข้อมูลตามที่ผู้ใช้ล็อกอิน
        {
            //echo "Username and Password Correct <P>";
            //sql เพื่อดึงข้อมูลของผู้ใช้งาน
            $sql="SELECT * from tbadmin WHERE username = '$uname' AND password = '$pword';";
            $result = mysql_query($sql);
            $dbarr = mysql_fetch_array($result);
            $lic=$dbarr[licenses];
            //echo $lic;
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
