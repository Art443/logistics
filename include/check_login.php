<?php 
//session_start();
if($_SESSION['sessusername']=="" && $_SESSION['sesspassword']) {  
    echo "<META HTTP-EQUIV=Refresh content=0;URL=login_form.html>";  
 }



// เช็คว่า User ได้ผ่านการ Login มาหรือไม่ (ถ้าไม่ได้ Login มาให้ส่งต่อไปหน้าไหนก็ใส่ URL ลงไปครับ ตรงตำแหน่ง login.php)
//if (!isset($_SESSION[login])) {
 //    echo "<META HTTP-EQUIV=Refresh content=0;URL=login_form.html>";
 //    exit;
//}
?> 