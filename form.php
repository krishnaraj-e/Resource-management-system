<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

?>
<html>
 <head>
    
 </head>
 <body>
  
 <form action="import.php" method="post" enctype="multipart/form-data">
   <div>
   <center> 
    <label>Import CSV File:</label>
    <input type="file"  name="filename" id="filename">
    <button type="submit" id="submit" name="submit">Upload</button>
    </center>
   </div>
  </form>

</body>
</html>