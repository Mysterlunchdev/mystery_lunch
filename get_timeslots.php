<?php
include_once("config.php");
include_once('db_connect.php');
header('Content-type:application/json;charset=utf-8');
$lang = (isset($_POST['lang']) ? $_POST['lang'] : 'en'); //'ar'

$message = 'OK';
$status = true;
$results = array();
$levels = array();
$queryselect = "SELECT * from time_slot WHERE status='Active' order by id asc";
$resultQuery = mysql_query($queryselect) or die(json_encode(array("status" => false, "message" => mysql_error())));
if(mysql_num_rows($resultQuery)>0) 
{
    while($rec = mysql_fetch_assoc($resultQuery))
	{
		$results['id'] = $rec['id'];
		$results['canteen_id'] = $rec['canteen_id'];    
		$results['slot'] = $rec['time'];
		$results['status'] = $rec['status'];
		array_push($levels, $results);
	}
} 
else 
{
    if ($lang == 'ar')
	$message = "هذا البريد الإلكتروني ليس مسجلا في النظام!";
    else
	$message = 'Not Found';
    $status = false;
}


$final = array();
$final['status'] = $status;
$final['message'] = $message;
$final['timeslots'] = $levels;
echo json_encode($final);
?>
