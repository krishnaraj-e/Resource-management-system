<?php
require_once 'lock.html'; 
if(!isset($_SESSION['lock']) || empty($_SESSION['lock']))
{
	echo $_SESSION['lock'];
  header("location: lock.php");
  exit;
}
else
{
	echo "done";
}

?>

