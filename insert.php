<?php

$username = $_POST['username'];
$password = $_POST['password'];
$Gender = $_POST['Gender'];
$email = $_POST['email'];
$phonecode = $_POST['phonecode'];
$phone = $_POST['phone'];

if (!empty($username)||!empty($password)||!empty($Gender)||!empty(email)||!empty($phonecode) || !empty($phone)) {
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "project";

	//create connection 
	$conn = new mysqli($localhost,$dbusername,$dbpassword,$dbname);

	if (mysql_connect_error()){
		die('connect Error('.mysqli_connect().')'.mysqli_connect_error());
	}else{
	$SELECT  "SELECT = email From register where email = ? Limit 1";
$INSERT = "INSERT Into register (username, password, Gender, email, phonecode,
phone) values (?,?,?,?,?,?)";
//prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->db2_bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0){
	$stmt->close();

	$stmt = $conn->prepare($INSERT);
	$stmt->bind_param("ssssii", $username, $password, $Gender, $email, $phonecode, $phone);
	$stmt->execute();
	echo "New record inserted sucessfully";
}else{
	echo "Someone already register using this email";
}
$stmt->close();
$conn->colse();
}
} else {
	echo "All field are required";
die();
}
?>