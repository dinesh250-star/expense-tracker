<?php
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);
$fnameR=$_POST['fnameR'];
$lnameR=$_POST['lnameR'];
$emailR=$_POST['emailR'];
$passwordR=$_POST['passwordR'];
$ispresent="0";

$servername = "localhost";
$username = "root";
$password = "Dinesh@123";
#$password = "justdial";  
//$database = "final";
$database="localdb";
//CONNECTION
#$conn =  mysql_connect($servername,$username,$password,$database);
$conn = new mysqli($servername,$username,$password,$database);
//CHECK IF CONNECTION IS MADE,
      if ($conn->connect_errno)
        {
          echo "Connection failed!";
          die;
      }

//QUERY PART
$query2="SELECT COUNT(ID) FROM RESTIGER_DETAILS WHERE EMAIL =\"".$emailR."\"";
//FETCH RESULT
$result2 = $conn->query($query2);
//FETCH THE RESULT IN ROW
$row1 = $result2->fetch_assoc();
if ( $row1['COUNT(ID)'] != "0" ) {
$ispresent="1";
$data = array(
    "ispresent" => $ispresent
);
//PASS DATA TO JAVASCRIPT  BY ENCODING IN THIS FORMAT
echo json_encode($data);
}   
else{
$query1="INSERT INTO RESTIGER_DETAILS(FNAME,LNAME,EMAIL,PASSWORD  )
         VALUES(\"".$fnameR."\",\"".$lnameR."\",\"".$emailR."\",\"".$passwordR."\")";
//WE DONT NEED ANY RETURN RESULT FROM MYSQL SO USE ONLY $conn->query($query1); , THIS IS EXECUTE THE QUERY
$conn->query($query1);
$data = array(
    "ispresent" => $ispresent
);
echo json_encode($data);
}
