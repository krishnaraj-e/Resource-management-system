<?php
require_once 'config.php';
session_start();
 if(!isset($_SESSION['user'])|| empty($_SESSION['user']))
  {
     header("location: index.php");
     exit;
  }




 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Date Selection</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
		<style type="text/css">
.disabled { cursor: not-allowed; }
body{
  background-color: #ffffff;
}

</style>
</head>
<body>
<form action="block.php" method="POST"><center>
    Select date :
    <input type="date" name="date" value="<?php echo $dayOfWeek;?>">
    <br/>
<?php
 
//Our YYYY-MM-DD date string.
if(isset($_POST['date'])){


$date = new DateTime($_POST['date']);
$new_format = $date->format('Y-m-d');
$unixTimestamp = strtotime($new_format);


 
//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

 }
?>


<input type="submit" value="submit">



</center>
</form>
</body>
</html>
