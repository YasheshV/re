<?php

if( isset( $_POST['regno'] ) )
{
$servername="127.0.0.1";
$host='localhost';
$username='root';
$password='';
$dbname='iwpproject';

$connect = new mysqli("$servername",$username,$password,$dbname);  
$selectdata = " SELECT records.*,student.* FROM records,student WHERE records.regno='" . $_POST['regno'] . "'   and     student.regno='" . $_POST['regno'] . "'";

$query = mysqli_query($connect,$selectdata);

echo "<table border=15px width=80% bordercolor=black>
	<tr>
	<th><font size='7'>Registration Number</font></th>
<th><font size='7'> Name</font></th>
<th><font size='7'> gotgrades</font></th>
<th><font size='7'> actualgrades</font></th>	
	</tr>";

while($row = mysqli_fetch_assoc($query))
{
	echo "<tr>";
	echo "<td><font size='6'>" .$row['regno']. "</td></font>";
	echo "<td><font size='6'>" .$row['name']. "</td></font>";
	echo "<td><font size='6'>" .$row['gotgrades']. "</td></font>";
	echo "<td><font size='6'>" .$row['actualgrades']. "</td></font>";	
	
	
	if ($row['actualgrades']==$row['gotgrades'])	
	{
		$gradeexp=$row['gotgrades'];
	}
	else
	{
		if($row['actualgrades']=='S')
			$temp1=10;
		if($row['actualgrades']=='A')
			$temp1=9;
		if($row['actualgrades']=='B')
			$temp1=8;
		if($row['actualgrades']=='C')
			$temp1=7;
		if($row['actualgrades']=='D')
			$temp1=6;
		if($row['actualgrades']=='E')
			$temp1=5;
		if($row['actualgrades']=='F')
			$temp1=4;
		
		if($row['actualgrades']=='S')
			$temp2=10;
		if($row['actualgrades']=='A')
			$temp2=9;
		if($row['actualgrades']=='B')
			$temp2=8;
		if($row['actualgrades']=='C')
			$temp2=7;
		if($row['actualgrades']=='D')
			$temp2=6;
		if($row['actualgrades']=='E')
			$temp2=5;
		if($row['actualgrades']=='F')
			$temp2=4;	

		$temp=$temp1;
		$temp+=$temp2;
		$temp/=2;
		
		if($temp==10)
			$gradeexp='S';
		if($temp==9)
			$gradeexp='A';
		if($temp==8)
			$gradeexp='B';
		if($temp==7)
			$gradeexp='C';
		if($temp==6)
			$gradeexp='D';
		if($temp==5)
			$gradeexp='E';
		if($temp==4)
			$gradeexp='F';		
	}
}

}

?>

<html>
<body bgcolor="#71670f"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to previous semester's result) you will get in next semester :\n'<?php echo $gradeexp; ?>'");
		});
	});
	
	
</script>
</br></br></br></br></br></br>
<body>
<h3 id="abc">
<button>PREDICT ACCORDING TO PREVIOUS SEMESTER'S RESULT</button>
</h3>
</body>

</br></br></br></br></br></br>
<h2><u>YOUR CURRENT RESULT IS : </u></h2>
</html>