<?php
header('Access-Control-Allow-Origin: *');
$m = new MongoClient();
$db = $m->mkh;$collection = $db->responses;
$collection->insert(array("userid"=> $_POST['userid'], "answer"=>$_POST['answer'], "time"=>$_POST['time'],"questionid"=> $_POST['questionid'],"timestamp" => $_POST['timestamp'],"testid" => $_POST['testid']));	
?>