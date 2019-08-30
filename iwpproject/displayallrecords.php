<?php

$servername="127.0.0.1";
$host='localhost';
$username='root';
$password='';
$dbname='iwpproject';

$connect = new mysqli("$servername",$username,$password,$dbname);  


$selectdata = " SELECT records.*,student.* FROM records,student WHERE records.regno=student.regno";

$query = mysqli_query($connect,$selectdata);

echo "</br></br></br></br></br></br></br></br></br></br></br></br>";
echo "<table border='20' align='center'>
	<tr>
	<th> <font color='white'>Registration Number</font></th>
<th><font color='white'> Name</font></th>
<th><font color='white'> Grade Got</font></th>
<th><font color='white'> Actual Grade Got</font></th>	
	</tr>";

while($row = mysqli_fetch_assoc($query))
{
	echo "<tr>";
	echo "<td style='font-color: #00FF00;'><font color='#ffffff'>".$row['regno']."</td></font>";
	echo "<td style='font-color: #00FF00;'><font color='#ffffff'>".$row['name']."</td></font>";
	echo "<td style='font-color: #00FF00;'><font color='#ffffff'>".$row['gotgrades']."</td></font>";
	echo "<td style='font-color: #00FF00;'><font color='#ffffff'>".$row['actualgrades']."</td></font>";
}
?>

<html>
<body bgcolor="#4e1818"/>
</html>