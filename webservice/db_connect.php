<?php 
include_once('config.php');
$host_link = mysql_connect(DBASE_HOST, DBASE_USER, DBASE_PWD);
@ mysql_query("SET names UTF8");
if (!$host_link) {
   die('Could not connect: ' . mysql_error());
   exit;
}
$db_link = mysql_select_db(DBASE_NAME); 
if (!$db_link) {
   die('Could not connect error2: ' . mysql_error());
}?>