<?php
header('Access-Control-Allow-Origin: *');
$datetime1 = $_POST['datetime1'];
    $timezone1 ='UTC';$timezone2 = 'UTC';
    $datetime2 = $_POST['datetime2'];

    //$datetime1 = "04/27/2015 10:02:44 AM";
  //  $timezone1 = "04/27/2015 10:02:44 AM";$timezone2 = "05/27/2015 10:02:44 AM";
    //$datetime2 = "05/27/2015 10:02:44 AM";



    $timestamp1 = strtotime($datetime1 . ' ' . $timezone1);
    //echo $timestamp1;
    $timestamp2 = strtotime($datetime2 . ' ' . $timezone2);
    if ($timestamp1) {
       // header('Content-Type: application/json');
        $date1 = getdate($timestamp1);
        $date1['timestamp'] = $date1[0];
        //echo ($date1[0]);
      
    }
  
    if ($timestamp2) {
       // header('Content-Type: application/json');
        $date2 = getdate($timestamp2);
        $date2['timestamp'] = $date2[0];
        
        //echo $date2[0];
        
    }

//echo ($date1[0]);








$answers = $_POST['answers'];
$options = $_POST['options'];
$questions = $_POST['questions'];
$m = new MongoClient();
 $db = $m->mkh;
 $collection = $db->users;
 //$aa=$collection->findOne(array('username'=>$_COOKIE['username']));
 //echo $_COOKIE['username'];
 //var_dump(iterator_to_array($aa, true));

 //$collection->update(array("username"=>($_COOKIE['username'])), array('$set'=>array("count"=>$local)));
//$temp=$collection->findOne(array('username'=>$_COOKIE['username']))["username"];
   //echo "Database thesisdb selected";
 $randomnumber= rand(1, 100000);
$usedornot= $db-> usedornot;
while(1) {
  $joe=$usedornot->findOne(array("randomnumber" => strval($randomnumber)));
  if(!$joe){
    $ta= strval($randomnumber);
 $collection = $db->$ta;

$t=0;
for ($x = 0; $x < count($questions); $x++) {
   // echo "The number is: $x <br>";
$collection->insert(array("starttime"=>$date1[0]-19800,"endtime"=>$date2[0]-19800,"number"=>$x+1, "questions"=> $questions[$x], "option1"=>$options[$t],"option2"=>$options[$t+1],"option3"=>$options[$t+2],"option4"=>$options[$t+3],"answer"=>$answers[$x]));  
$t=$t+4;
} 
echo "Quiz data succesfully entered.<br> Your unique id for the quiz is: " . (string)$randomnumber ."<br> Please note it down in a safe place.";
break;
  }
  else {
    $randomnumber= rand(1, 100000);
  }
}
 //$c=md5($temp);
 
?>