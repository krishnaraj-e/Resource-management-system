<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nra";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// sql to delete a record
$sql = "DELETE FROM test";

if ($conn->query($sql) === TRUE) {
    echo "Time table uploded successfully";
} else {
    echo "Error uploading record: " . $conn->error;
}


if (isset($_POST['submit'])) 
{
 //Import uploaded file to Database
 
 $handle = fopen($_FILES['filename']['tmp_name'], "r");
 while(($data = fgetcsv($handle)) !== FALSE){
 $sql = "INSERT into test (day,period, year, department,subject,staff,resource,block,batch)
  values('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."' , '".$data[4]."' , '".$data[5]."' , '".$data[6]."' , '".$data[7]."', '".$data[8]."')";
 
  mysqli_query($conn, $sql) ;
}
}
/*$sql = "SELECT * from testtbl";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["user_name"]. "</td><td>" . $row["first_name"] . "</td><td>"
. $row["last_name"]. "</td><td>". $row["date_added"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();*/
?>
<center>
<form action="form.php" method="post">
<button type="submit" id="back" name="back">GO BACK</button>
</center>
</form>
