<?php

if( isset( $_POST['regno'] ) )
{
$servername="127.0.0.1";
$host='localhost';
$username='root';
$password='';
$dbname='iwpproject';

$connect = new mysqli("$servername",$username,$password,$dbname);  


$selectdata = " SELECT records.*,student.* FROM records,student WHERE student.regno='" . $_POST['regno'] . "'  and  records.regno='" . $_POST['regno'] . "' ";


$query = mysqli_query($connect,$selectdata);

echo "<table border='25' width=80% >
	<tr>
	<th> Registration Number</th>
<th> Name</th>
<th> Grade Got</th>
<th> Actual Got</th>	
	</tr>";

while($row = mysqli_fetch_assoc($query))
{
	echo "<tr>";
	echo "<td>" .$row['regno']. "</td>";
	echo "<td>" .$row['name']. "</td>";
	echo "<td>" .$row['gotgrades']. "</td>";
	echo "<td>" .$row['actualgrades']. "</td>";	
}

}

?>