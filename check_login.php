<?php
	ob_start();
	session_start();
	
	//include_once 'db_tools.php';
	//include_once 'connect.php';

        $link = mysql_connect("localhost", "root", "1234");
        $sql = "use dbvehicle";
        $result = mysql_query($sql);
        
	$db->findByAttributes('emp',array(
		'username =' => $_POST[admin_user],
		'password =' => $_POST[admin_pass]
		));
	$rs = $db->executeRow();
	if($rs){
		$_SESSION['admin_user'] = $rs['username'];
		header('location: index.php?url=home.php');
	}else{
		echo 'username invalid';
		echo "";
	}
?>

