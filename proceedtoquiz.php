<?php
/*

$username = $_GET['username'];
$passworda = $_GET['password'];
//echo $pass
//$device = $_GET['device'];
$hostname = "localhost";
$host_database = "thesis1";
$user = "root";
$password = "";
$conn = new mysqli($hostname, $user, $password,$host_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo $username;
//echo "<br>";
//echo $password;
$sql = "SELECT * FROM `users` WHERE id='$username' && password='$passworda'";
$result = $conn->query($sql);
//echo $result+"";
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		//echo $row['bid'];
		//echo $row['rating'];//.'_'.$row['coupontext'];
		echo "true";	
	}
}else{
	//$r="INSERT INTO beacontable (bid) VALUES ($bid)";
	//$res1=mysqli_query($conn,$r);
	echo "false";
    //if (!$res1) {
    //die('Something really bad happened. Please try again!' . mysql_error());
//}
}

*/
// ^^ old php code
header('Access-Control-Allow-Origin: *');

   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
$m2 = new MongoClient();
$db2 = $m2->mkh;
$collection2 = $db2->userdatabase;
$joe2 = $collection2->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
	if(!$joe2){
		//echo $_POST['username'];
		//echo $_POST['password'];
		echo "wrong credentials";return;}
	else{
		 $m = new MongoClient();
   $db = $m->mkh;
   //echo "Database thesisdb selected";
   $collection = $db->$_POST['id'];
   //echo "Collection selected succsessfully";
   $joe = $collection->find();
   if(!$joe)echo "not found";
   //
   else echo json_encode(iterator_to_array($joe));
  //echo $joe['phone'];
   

}
?>