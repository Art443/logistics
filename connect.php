<?php

$db = new db_tools();
$db->db_name = "dbvehicle";

if (!$db->connect()) {
    echo mysql_error();
}
?>
