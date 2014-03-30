<?
/*
session_start();
mysql_connect("localhost","root","1234");
mysql_select_db("dbvehicle");
$strSQL = "SELECT * FROM tbadmin WHERE username = '".mysql_real_escape_string($_POST['txtUsername'])."'
and password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
echo "Username and Password Incorrect!";
}
else
{
$_SESSION["UserID"] = $objResult["UserID"];
$_SESSION["Status"] = $objResult["Status"];
 
session_write_close();
if($objResult["Status"] == "ADMIN")
{
header("location:admin_page.php");
}
else
{
header("location:user_page.php");
}
}
mysql_close();*/
$uname = "";
$pword = "";
$errorMessage = "";
$num_rows = 0;

if($_SERVER('REQUEST_METHOD')=='POST'){
    $uname = $_POST['username'];
    $pword = $_POST['password'];

    $uname = htmlspecialchars($uname);
    $pword = htmlspecialchars($pword);

    $user_name = "root";
    $pass_word = "1234";
    $database = "dbvehicle";
    $server = "127.0.0.1";

$db_handle = mysql_connect($server, $user_name, $pass_word);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

}else {
$errorMessage = "Error logging on";
}

$uname = quote_smart($uname, $db_handle);
$pword = quote_smart($pword, $db_handle);

$SQL = "SELECT * FROM login WHERE L1 = $uname AND L2 = $pword";
$result = mysql_query($SQL);

if ($result) {

}else {
$errorMessage = "Error logging on";
}

$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {

$errorMessage= "logged on ";

}
else {

$errorMessage= "Invalid Logon";

}
}
?>