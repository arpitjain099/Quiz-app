<?php
header('Access-Control-Allow-Origin: *');
$m = new MongoClient();
$db = $m->mkh;

$check=$db->$_POST['testid'];
$joe=$check->findOne();//array("starttime" => $_POST['username'],"password"=> $_POST['password'])
$ta= time();
//echo $joe['starttime'];echo "<br>";
//echo $joe['endtime'];echo "<br>";
//echo $ta;echo "<br>";

if( (int)$ta>=(int)$joe['starttime']) 
if( (int)$ta<=(int)$joe['endtime'])
{$collection = $db->responses;
$collection->insert(array("userid"=> $_POST['userid'], "answer"=>$_POST['answer'], "time"=>$_POST['time'],"questionid"=> $_POST['questionid'],"timestamp" => $_POST['timestamp'],"testid" => $_POST['testid']));
	
}
else{
	echo "timeout";
	return;
}
?>