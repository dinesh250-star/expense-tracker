<?php
session_start();


$credit=$_POST['credit'];
$debit=$_POST['debit'];
$credit_d=$_POST['credit_d'];
$debit_d=$_POST['debit_d'];
$email=$_SESSION['emailL'];

if(!isset($email))
    {
        $isupdated=0;
        echo json_encode(array("isupdated" => $isupdated));
        exit;
    }


$servername = "localhost";
$username = "root";
$password = "Dinesh@123";
$database = "localdb";

$conn = new mysqli($servername,$username,$password,$database);

############UPDATE THE RECORD###############
$query2="SELECT ID FROM RESTIGER_DETAILS WHERE EMAIL =\"".$email."\"";
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();
$USERID=$row2['ID'];


$query1="SELECT BALANCE FROM ACTIVITY WHERE USERID =\"".$USERID."\" ORDER BY ACTIVITYID DESC LIMIT 1";
$result1 = $conn->query($query1);
$row1 = $result1->fetch_assoc();

$updatedammount=updateFunction($row1,$credit,$debit);
$query2="INSERT INTO ACTIVITY(USERID,CREDIT,DEBIT,CREDIT_D,DEBIT_D,BALANCE)VALUE(".$USERID.",".$credit.",".$debit.",\"".$credit_d."\",\"".$debit_d."\",".$updatedammount.")";
$conn->query($query2);

$isupdated=1;
echo json_encode(array("isupdated" => $isupdated));
//END OF MAIN 

//UPDATE FUNCTIONS
function updateFunction($row1,$credit,$debit){
$previousBalance=$row1['BALANCE'];
$latestcredit=$credit;
$latestdebit=$debit;

$current_ammount=($previousBalance + $latestcredit) - $latestdebit;

return $current_ammount;
}
?>
