

<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user']))
{
  header("location: index.php");
  exit;
}

$block= $_POST['block'];
if($block=='adminoverview.php'){
  $_SESSION['blockforoverview']="Admin Block";
}
if($block=='workshopOverview.php'){
  $_SESSION['blockforoverview']="Workshop Block";
}
if($block=='itoverview.php'){
  $_SESSION['blockforoverview']="IT-Block";
}
if($block=='libraryOverview.php'){
  $_SESSION['blockforoverview']="Library Block";
}
if($block=='skilldeptoverview.php'){
  $_SESSION['blockforoverview']="Skill dept.Block";
}
if($block=='coeoverview.php'){
  $_SESSION['blockforoverview']="COE Block";
}
if($block=='impactOverview.php'){
  $_SESSION['blockforoverview']="Impact Block";
}




if($_SESSION['dayForOverview']=="Select Day")
{

    header( "refresh:2;url=select_date_for_overview.php" );
echo "<br><br><center><h2 style='color:red'>Select A Day....!</h2><h2 style='color:red'>You Are Redirecting To The Previous Page...!</h2></center>";
}








?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['dateForOverview']."-Overview";?></title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
body{
  background-color: #ffffff;
}




#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


.blink{
		text-align: center;
	}
	.span{
		color: green;
		animation: blink 1s linear infinite;
	}
@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}


}

</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
if($_SESSION['dayForOverview']!="Select Day")
{
//echo $d;
//echo "<br>".$_SESSION['yearfortimetable'];
$sql="SELECT `resource`, `period` FROM `test` WHERE  day='".$_SESSION['dayForOverview']."' AND block='".$_SESSION['blockforoverview']."'" ;

$result = $conn->query($sql);
//ECHO $sql;

if ($result->num_rows== 0 )
	{
    echo "<div class='w3-panel w3-red'>";
    echo "<h3>Message!</h3>";
    echo "<p>No Allocation Found For Selected Date</p>";
    echo "</div>";
	}
	else
	{
		echo "<center><h1><b>".$_SESSION['dateForOverview']."-Overview " ,$_SESSION['blockforoverview'];
		echo"</b></h1></center><br>";

        	echo "<center><table id='customers'><tr>";

        	echo "<th>P/R</th>";

            echo "<th>CR1 [50]</th>";
            echo "<th>CR2 [50]</th>";
            echo "<th>CR3 [50]</th>";
            echo "<th>CR4 [50]</th>";
            echo "<th>CR5 [50]</th>";
            echo "<th>CR6 [50]</th>";
        	echo "<th>CR7 [50]</th>";
        	echo "<th>CR8 [50]</th>";
        	echo "<th>CR ITI [25]</th>";
        	echo "<th>SIM-III lab [25]</th>";



$period=array( "06:00AM - 7:00AM","7:00AM - 8:00AM","08:00AM - 09:00AM","09:00AM - 10:00AM","10:10AM - 11:10AM", "11:10AM - 12:10PM", "12:40PM - 01:40PM","01:40PM - 02:40PM","02:50PM - 03:50PM", "03:50PM - 04:50PM","4:50PM- 5:50PM","5:50PM - 6:50PM","6:50PM - 7:50PM","7:50PM - 8:50PM");

echo "<tr>";

for ($k=0; $k <14; $k++) {

	echo "<td>".$period[$k]."</td>";


//for ($i=1; $i <= 12; $i++)
//{
//$i=1;
        $sql="SELECT `resource`, `period` FROM `test` WHERE day='".$_SESSION['dayForOverview']."' and period='p".($k+1)."'";
//echo $sql;
$result = $conn->query($sql);
$v=1;
$resultset=array("r1"=>"FREE","r2"=>"FREE","r3"=>"FREE","r4"=>"FREE","r5"=>"FREE","r6"=>"FREE","r7"=>"FREE","r8"=>"FREE","r9"=>"FREE","r10"=>"FREE");
while($row=mysqli_fetch_array($result,MYSQLI_NUM))
//echo $row[0];
{
//echo "  ".$v++;
    if($row[0]=="CR1")
{
	$resultset['r1']=$row[1];
}
 else if($row[0]=="CR2")
{
	$resultset['r2']=$row[1];
}
 else if($row[0]=="CR3")
{
    $resultset['r3']=$row[1];
}
else if($row[0]=="CR4")
{
	$resultset['r4']=$row[1];
}
else if($row[0]=="CR5")
{
	$resultset['r5']=$row[1];
}
else if($row[0]=="CR6")
{
	$resultset['r6']=$row[1];
}
else if($row[0]=="CR7")
{
	$resultset['r7']=$row[1];
}
else if($row[0]=="CR8")
{
	$resultset['r8']=$row[1];
}
else if($row[0]==" CR ITI")
{
	$resultset['r9']=$row[1];
}
else if($row[0]=="SIM-III LAB")
{
	$resultset['r10']=$row[1];

}
//print_r($columnset);
//print_r($resultset);
//echo "<td style='color:red' title='Occupied by me'><center><b>".$resultset['r1']."</b></center></td>";
}//---end while ---

//$currentPeriod = "p".($k+1);
$temp = $resultset;
//print_r($resultset);
for($h=1;$h<11;$h++){
	$g="r".$h;
	//$resultset[$g] this has the period
    if($resultset[$g] != "FREE"){
         $sql2="SELECT `staff` , `department` , `year` , `subject`,`batch` FROM `test` WHERE `day`='".$_SESSION['dayForOverview']."' AND  `resource`='".getResourceName($g)."' AND `period`='$resultset[$g]' AND `block`='".$_SESSION['blockforoverview']."'";
        //echo $sql2 ."<br>";
        $result2 = $conn->query($sql2);
        $row2 = mysqli_fetch_array($result2,);
        $whoOccupied = $row2['staff'];
        $whichDept=$row2['department'];
        $whichYear=$row2['year'];
        $whichSub=$row2['subject'];
        $whichBatch=$row2['batch'];
        echo "<td style='color:red' title='Occupied by staff: $whoOccupied ,Subject:$whichSub ,Year: $whichYear year, Batch: $whichBatch ,Department: $whichDept'><center><b>OCCUPIED</b></center></td>";
    }
	else
		echo "<td  class='blink'><center><span class='span'><b>FREE</b></center></td>";
//echo $columnset[$h]['c4'];

} 
//echo $currentPeriod;
//$index =1;
/*foreach($temp as $item)
{
    $key='r'.$index;
    if($item != $currentPeriod &&  $item != "FREE")
    {
        //echo "<font color='blue'>Yes</font>";
      // $temp[$key] = "TTYRYT";
    }
    //echo $item;
    $index++;
}
//sprint_r($temp);
$key='r'.$index;*/

//print_r( $temp);
//echo "<br><BR>";
/*for ($i=1; $i <= 12; $i++)
{
 $j='r'.$i;
    if($temp[$j]!="FREE")
    {
		
print_r($resultset);
        if($temp[$j] == $currentPeriod)
        {
			
            //echo "<td style='color:red'><center><b>$temp[$j]</b></center></td>";
            //$sql2="SELECT `staff`  FROM `test` WHERE `day`='".$_SESSION['dateForOverview']."' AND  `resource`='".getResourceName($j)."' AND `period`='$currentPeriod'";
            //echo $sql2 ."<br>";
            //$result2 = $conn->query($sql2);
            //$row2 = mysqli_fetch_array($result2);
            //$whoOccupied = $row2['staff'];
            echo "<td style='color:red' title='Occupied by me'><center><b>OCCUPIED</b></center></td>";

        }
        else{
            echo "<td  class='blink'><center><span class='span'>FREE</span></center></td>";
        }
    }
    else
    {
      echo "<td  class='blink'><center><span class='span'>$temp[$j]</span></center></td>";

    }

} */ //--- end for loop 12 times (12 resources)

echo "</tr>";
//$i++;
} //--- end for loop 14 times (14 periods)

echo "</center></table>";


echo '<br><br>';


echo '<button class="btn btn-info btn-lg" onclick=location.href="select_date_for_overview.php" type="button">
     <span class="glyphicon glyphicon-repeat"></span> Check Another</button>';


     echo '<button onclick="myFunction()" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-print"></span> Print this page</button>
';
    }
}

///Function to return shorted Resources full Name
function getResourceName(string $short)
{
    $resourceFullName = "test";
	
    if($short =="r1")
    {
        $resourceFullName = "CR1";
    }
    else if($short =="r2")
    {
        $resourceFullName = "CR2";
    }
    else if($short =="r3")
    {
        $resourceFullName = "CR3";
    }
    else if($short =="r4")
    {
        $resourceFullName = "CR4";
    }
    else if($short =="r5")
    {
        $resourceFullName = "CR5";
    }
    else if($short =="r6")
    {
        $resourceFullName = "CR6";
    }
    else if($short =="r7")
    {
        $resourceFullName = "CR7";
    }
    else if($short =="r8")
    {
        $resourceFullName = "CR8";
    }
    else if($short =="r9")
    {
        $resourceFullName = "CR ITI";
    }
    else if($short =="r10")
    {
        $resourceFullName = "SIM III lab";
    }

    return $resourceFullName;
}

?>

<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>
