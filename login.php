
<?php
	include_once 'form/main_form.php';
	//include_once 'db_tools.php';
	//include_once 'connect.php';
	
	$form = new form();
	$text_user = new textfield('admin_user','form-control','User');
	$text_pass = new pass('admin_pass','form-control','Password');	
	$submit = new buttonok('Login','btn btn-lg btn-primary btn-block');
	
	
	
	echo "<h2 class='form-signin-heading'>Login</h2>";
	echo '<hr/>';
	echo $form->open('form-signin','check_login.php');
	echo $lb_user.$text_user.'<br />';
	echo $lb_pass.$text_pass.'<br />';
	echo $submit;
	
	echo $form->close();
?>
