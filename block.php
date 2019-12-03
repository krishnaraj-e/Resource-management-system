<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}
if(isset($_POST['date'])){


  $date = new DateTime($_POST['date']);
  $new_format = $date->format('Y-m-d');
  $unixTimestamp = strtotime($new_format);
  
  
   
  //Get the day of the week using PHP's date function.
  $dayOfWeek = date("l", $unixTimestamp);
  $_SESSION['dayForOverview']=$dayOfWeek;
  $_SESSION['dateForOverview']=$new_format;
}

?>
<!DOCTYPE html>
<html>
<body>
<form name="block" id="block" method="POST" action="" id="FORM_ID">
  <div class="container">
	<center>
  <select name="block" onchange="this.form.action=this.value;">
  <option disabled="disabled" selected value="Select block">Select Block</option>
  <option value="adminoverview.php">Admin Block</option>
  <option value="workshopOverview.php">Workshop Block</option>
  <option value="itoverview.php">IT-Block</option>
  <option value="libraryOverview.php">Library Block</option>
  <option value="skilldeptoverview.php">Skill dept.Block</option>
  <option value="coeoverview.php">COE Block</option>
  <option value="impactOverview.php">Impact Block</option>
 
}
</script>
</select><br>
  <input type="submit" name="submit" value="Submit">
</center>
</form>

</body>
</html>
