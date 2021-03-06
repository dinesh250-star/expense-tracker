<?php
session_destroy();
session_start();
$emailL=$_POST['emailL'];
$passwordL=$_POST['passwordL'];
$isLogin="0";
$servername = "localhost";
$username = "root";
$password = "Dinesh@123";
$database = "localdb";
//CONNECTION
#$conn =  mysql_connect($servername,$username,$password,$database);
$conn = new mysqli($servername,$username,$password,$database);

$query1="SELECT COUNT(ID) FROM  RESTIGER_DETAILS WHERE EMAIL =\"".$emailL."\" AND PASSWORD = \"".$passwordL."\"";
$result1 = $conn->query($query1);
$row1 = $result1->fetch_assoc();
if ( $row1['COUNT(ID)'] != "0" ) {

 $isLogin="1";
 $_SESSION["emailL"] = $emailL;
 $_SESSION['expire'] = $_SESSION['start'] + (2 * 60) ; 



}
$data = array(
    "isLogin" => $isLogin
);
//PASSING DATA TO JAVASCRIPT 
echo json_encode($data);
?>
