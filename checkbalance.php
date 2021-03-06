<?php
session_start();
$email=$_SESSION['emailL'];


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

$query1="SELECT R.EMAIL,A.CREDIT,A.DEBIT,A.CREDIT_D,A.DEBIT_D,A.BALANCE,A.TIME FROM  RESTIGER_DETAILS R JOIN ACTIVITY A WHERE A.USERID=R.ID AND A.USERID=".$USERID." ORDER BY ACTIVITYID DESC;";

$result1 = $conn->query($query1);
echo "<h3>HISTORY</h3><div id='table1'>
      <table id='tb1'>
      <tr>
      <th>EMAIL</th>
      <th>CREDIT</th>
      <th>DEBIT</th>
      <th>CREDITDES</th>
      <th>DEBITDES</th>
      <th>BALANCE</th>
      <th>TIME</th>
      </tr>";
while ( $row1 = $result1->fetch_assoc()){
    echo "<tr>
          <td>".$row1['EMAIL']."</td>
          <td>".$row1['CREDIT']."</td>
          <td>".$row1['DEBIT']."</td>
          <td>".$row1['CREDIT_D']."</td>
          <td>".$row1['DEBIT_D']."</td>
          <td>".$row1['BALANCE']."</td>
          <td>".$row1['TIME']."</td>
          </tr>";
}
echo "</table></div>";

?>
