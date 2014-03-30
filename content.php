<div class="content">
<?php
	$url = $_GET['url'];

	if(empty($_SESSION['admin_user'])){
		include_once 'login.php';	
		}

	if(!empty($url)){
		include_once $url;
}
?>
</div>