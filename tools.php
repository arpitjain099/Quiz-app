<?php
header('Access-Control-Allow-Origin: *');
//$options = $_POST['options'];
//$questions = $_POST['questions'];

$m = new MongoClient();
 $db = $m->mkh;
 $collection = $db->users;
 $aa=$collection->findOne(array('username'=>$_COOKIE['username']));
 //echo $_COOKIE['username'];
 //var_dump(iterator_to_array($aa, true));
 $local=  $aa["count"];//->username;
 $local=$local+1;
 $collection->update(array("username"=>($_COOKIE['username'])), array('$set'=>array("count"=>$local)));
 ?>