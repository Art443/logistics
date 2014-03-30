<?php

//function_doLogin(){
    //ถ้าพบข้อผิดพลาดก็จะถูกบันทึกลงในอาร์เรย์ที่ชื่อว่า $errorMessage
    $errorMessage='';
    $userName=$_POST['username'];
    $password=$_POST['password'];
    
    //ตรวจสอบให้แน่ใว่า ชื่อ และ รหัสผ่านว่า ไม่เป็นอะไรที่ว่างๆ
    if($userName==''){
        $errorMessage='You must enter your username';
    }else if($password==''){
        $errorMessage='You must entre the password';
    }else{
        //ตรวจสอบฐานข้อมูลดูว่า ชื่อ และ รหัสผ่าน ถูกต้องตรงกันหรือไม่
        $sql="SELECT admin_id FROM tbadmin WHERE username='$userName' AND password='$password'";
        $result=  mysql_query($sql);
        
        if(dbNumRows($result)==1){
            $row = mysq_fatch_array($result);
            $_SESSION['user_id']=$row['user_id'];
            
            //อัพเดทเวลาล็อกอิน ว่าได้มีการล็อกอินครั้งสุดท้ายเมื่อใด
            $sql="UPDATE tbadmin SET user_last_login = NOW() WHERE admin_id = '{$row['user_id']}'";
        }
}

//            }
?>
