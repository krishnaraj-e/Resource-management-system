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
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #ffffff;
}

.topnav {
  overflow: hidden;
  background-color:  #f57d05
;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  opacity:0.5;
}

.topnav a:hover {
  background-color: #f57d05;
  color: black;
}

.topnav a.active {
  background-color: #4287f5;
  color: white;
}

.topnav-right {
  float: right;
}

.topnav a.logout:hover {
  background-color: red;
  color: white;

}
.topnav a.logout
{
  float: right;
}
p.a {
    font-family: "Times New Roman", Times, serif;
}


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #f57d05;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f57d05;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f57d05}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>
<body>
<div class="topnav">
    <a href="dashboard_body.php" target="body" >Home </a>
 <!-- <a href="select_dept_for_allocation.php" target="body">Allocate</a>
  <a href="select_dept_for_deallocation.php" target="body">De-Allocate</a>-->
  <a href="form.php" target="body">Import data</a>
  <a href="select_date_for_overview.php" target="body">Overview</a>

<a href="maindb.php" target="body" id="help">About</a>
    <a class="logout" href="logout.php" target="parent">Logout <?php echo $_SESSION['user']; ?> <span class="glyphicon glyphicon-log-out"></span>    </a>
  </div>


</body>
</html>
