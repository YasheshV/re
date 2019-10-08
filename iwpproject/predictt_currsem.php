<?php


$servername="127.0.0.1";
$host='localhost';
$username='root';
$password='';
$dbname='iwpproject';

$connect = new mysqli("$servername",$username,$password,$dbname);  

$summ1=0;
$summ2=0;



$total_sub1_cat1_sc = "SELECT mark1_CAT1,mark1_CAT2 FROM nextsem_cat1,nextsem_cat2";

$query=mysqli_query($connect,$total_sub1_cat1_sc);
while($row = mysqli_fetch_assoc($query))
{

	$summ1+=$row['mark1_CAT1'];
	$summ2+=$row['mark1_CAT2'];
	
}

$sum_sub1=($summ1)/8 + ($summ2)/8;
$mean_sub1 = $sum_sub1/16.0;

$summ1=0;
$summ2=0;

$total_sub2_cat1_sc = "SELECT mark2_CAT1,mark2_CAT2 FROM nextsem_cat1,nextsem_cat2";

$query1=mysqli_query($connect,$total_sub2_cat1_sc);
while($row = mysqli_fetch_assoc($query1))
{

	$summ1+=$row['mark2_CAT1'];
	$summ2+=$row['mark2_CAT2'];
	
}
$sum_sub2=($summ1)/7 + ($summ2)/7;
$mean_sub2 = $sum_sub2/16.0;


$summ1=0;
$summ2=0;


$total_sub3_cat1_sc = "SELECT mark3_CAT1,mark3_CAT2 FROM nextsem_cat1,nextsem_cat2";

$query2=mysqli_query($connect,$total_sub3_cat1_sc);
while($row = mysqli_fetch_assoc($query2))
{

	$summ1+=$row['mark3_CAT1'];
	$summ2+=$row['mark3_CAT2'];
	
}

$sum_sub3=($summ1)/7 + ($summ2)/7;
$mean_sub3 = $sum_sub3/16.0;

$summ1=0;
$summ2=0;



$total_sub4_cat1_sc = "SELECT mark4_CAT1,mark4_CAT2 FROM nextsem_cat1,nextsem_cat2";

$query3=mysqli_query($connect,$total_sub4_cat1_sc);
while($row = mysqli_fetch_assoc($query3))
{

	$summ1+=$row['mark4_CAT1'];
	$summ2+=$row['mark4_CAT2'];
	
}
$sum_sub4=($summ1)/7 + ($summ2)/7;
$mean_sub4 = $sum_sub4/16.0;


$summ1=0;
$summ2=0;


$total_sub5_cat1_sc = "SELECT mark5_CAT1,mark5_CAT2 FROM nextsem_cat1,nextsem_cat2";

$query4=mysqli_query($connect,$total_sub5_cat1_sc);
while($row = mysqli_fetch_assoc($query4))
{

	$summ1+=$row['mark5_CAT1'];
	$summ2+=$row['mark5_CAT2'];	
}

$sum_sub5=($summ1)/7 + ($summ2)/7;
$mean_sub5 = $sum_sub5/16.0;


$regno=$_POST['regno'];	

$tp = "SELECT gotgrades,actualgrades,regno FROM records WHERE regno='$regno'";

$query = mysqli_query($connect,$tp);

echo "<table border=15px width=80% align='center' bordercolor=black>
	<tr>
	<th><font size='7'> Registration Number</font></th>
<th><font size='7'> Grade Got</font></th>
<th><font size='7'> Actual Grade</font></th>	
	</tr>";

$sd_sub1 = 0.0;
$sd_sub2 = 0.0;
$sd_sub3 = 0.0;
$sd_sub4 = 0.0;
$sd_sub5 = 0.0;


while($row = mysqli_fetch_assoc($query))
{
	echo "<tr>";
	echo "<td align='center'><font size='6'>" .$row['regno']. "</td></font>";
	echo "<td align='center'><font size='6'>" .$row['gotgrades']. "</td></font>";
	echo "<td align='center'><font size='6'>" .$row['actualgrades']. "</td></font>";	
	
}
	$temp1 = ($row['mark1_CAT1'] + $row['mark1_CAT2'] - $mean_sub1) * ($row['mark1_CAT1'] + $row['mark1_CAT2'] - $mean_sub1);
	$sd_sub1 = $sd_sub1 + $temp1;
	
	$temp2 = ($row['mark2_CAT1'] + $row['mark2_CAT2'] - $mean_sub2) * ($row['mark2_CAT1'] + $row['mark2_CAT2'] - $mean_sub2);
	$sd_sub2 = $sd_sub2 + $temp2;
	
	$temp3 = ($row['mark3_CAT1'] + $row['mark3_CAT2'] - $mean_sub3) * ($row['mark3_CAT1'] + $row['mark3_CAT2'] - $mean_sub3);
	$sd_sub3 = $sd_sub3 + $temp3;
	
	$temp4 = ($row['mark4_CAT1'] + $row['mark4_CAT2'] - $mean_sub4) * ($row['mark4_CAT1'] + $row['mark4_CAT2'] - $mean_sub4);
	$sd_sub4 = $sd_sub4 + $temp4;
	
	$temp5 = ($row['mark5_CAT1'] + $row['mark5_CAT2'] - $mean_sub5) * ($row['mark5_CAT1'] + $row['mark5_CAT2'] - $mean_sub5);
	$sd_sub5 = $sd_sub5 + $temp5;
	
	
$sd_sub1 = $sd_sub1 / 15.0;
$sd_sub1=sqrt(sqrt($sd_sub1));


$E_sub1 = $mean_sub1;
$D_sub1 = $mean_sub1 + (0*($sd_sub1));
$C_sub1 = $mean_sub1 + (1*($sd_sub1));
$B_sub1 = $mean_sub1 + (2*($sd_sub1));
$A_sub1 = $mean_sub1 + (3*($sd_sub1));
$S_sub1 = $mean_sub1 + (4*($sd_sub1));



$sd_sub2 = $sd_sub2 / 15.0;
$sd_sub2=sqrt(sqrt($sd_sub2));


$E_sub2 = $mean_sub2;
$D_sub2 = $mean_sub2 + (0*($sd_sub2));
$C_sub2 = $mean_sub2 + (1*($sd_sub2));
$B_sub2 = $mean_sub2 + (2*($sd_sub2));
$A_sub2 = $mean_sub2 + (3*($sd_sub2));
$S_sub2 = $mean_sub2 + (4*($sd_sub2));


$sd_sub3 = $sd_sub3 / 15.0;
$sd_sub3=sqrt(sqrt($sd_sub3));


$E_sub3 = $mean_sub3;
$D_sub3 = $mean_sub3 + (0*($sd_sub3));
$C_sub3 = $mean_sub3 + (1*($sd_sub3));
$B_sub3 = $mean_sub3 + (2*($sd_sub3));
$A_sub3 = $mean_sub3 + (3*($sd_sub3));
$S_sub3 = $mean_sub3 + (4*($sd_sub3));


$sd_sub4 = $sd_sub4 / 15.0;
$sd_sub4=sqrt(sqrt($sd_sub4));


$E_sub4 = $mean_sub4;
$D_sub4 = $mean_sub4 + (0*($sd_sub4));
$C_sub4 = $mean_sub4 + (1*($sd_sub4));
$B_sub4 = $mean_sub4 + (2*($sd_sub4));
$A_sub4 = $mean_sub4 + (3*($sd_sub4));
$S_sub4 = $mean_sub4 + (4*($sd_sub4));


$sd_sub5 = $sd_sub5 / 15.0;
$sd_sub5=sqrt(sqrt($sd_sub5));

$E_sub5 = $mean_sub5;
$D_sub5 = $mean_sub5 + (0*($sd_sub5));
$C_sub5 = $mean_sub5 + (1*($sd_sub5));
$B_sub5 = $mean_sub5 + (2*($sd_sub5));
$A_sub5 = $mean_sub5 + (3*($sd_sub5));
$S_sub5 = $mean_sub5 + (4*($sd_sub5));


//$pa=array(5);
$a=0;
$a1=0;
$a2=0;
$b=0;
$c=0;
$d=0;
$e=0;
$i=0;

$gradeexp_sc_sub=array(5);


$total1= "SELECT mark1_CAT1 FROM nextsem_cat1 WHERE nextsem_cat1.regno='$regno'";
$total_1= "SELECT mark1_CAT2 FROM nextsem_cat2 WHERE nextsem_cat2.regno='$regno'";
$q1=mysqli_query($connect,$total1);
while($row = mysqli_fetch_assoc($q1))
{

	$a1+=$row['mark1_CAT1'];
	
}

$q_1=mysqli_query($connect,$total_1);
while($row = mysqli_fetch_assoc($q_1))
{
	$a2+=$row['mark1_CAT2'];
	
}

$a=(($a1+$a2)/1.5)+$sd_sub1;



if($a>=$A_sub1)
	$gradeexp_sc_sub[0]='S';
if($a<=$A_sub1 && $a>$B_sub1)
	$gradeexp_sc_sub[0]='A';
if($a<=$B_sub1 && $a>$C_sub1)
	$gradeexp_sc_sub[0]='B';
if($a<=$C_sub1 && $a>$D_sub1)
	$gradeexp_sc_sub[0]='C';
if($a<=$D_sub1 && $a>$E_sub1)
	$gradeexp_sc_sub[0]='D';
if($a<=$E_sub1 && $a>$mean_sub1)
	$gradeexp_sc_sub[0]='E';
if($a<=$mean_sub1)
	$gradeexp_sc_sub[0]='F';

$a2=0;
$a1=0;




$total2= "SELECT mark2_CAT1 FROM nextsem_cat1 WHERE nextsem_cat1.regno='$regno'";
$total_2= "SELECT mark2_CAT2 FROM nextsem_cat2 WHERE nextsem_cat2.regno='$regno'";
$q2=mysqli_query($connect,$total2);
while($row = mysqli_fetch_assoc($q2))
{

	$a1+=$row['mark2_CAT1'];
	
}

$q_2=mysqli_query($connect,$total_2);
while($row = mysqli_fetch_assoc($q_2))
{
	$a2+=$row['mark2_CAT2'];
	
}

$b=(($a1+$a2)/1.5)+$sd_sub2;


if($b>=$A_sub2)
	$gradeexp_sc_sub[1]='S';
if($b<=$A_sub2 && $b>$B_sub2)
	$gradeexp_sc_sub[1]='A';
if($b<=$B_sub2 && $b>$C_sub2)
	$gradeexp_sc_sub[1]='B';
if($b<=$C_sub2 && $b>$D_sub2)
	$gradeexp_sc_sub[1]='C';
if($b<=$D_sub2 && $b>$E_sub2)
	$gradeexp_sc_sub[1]='D';
if($b<=$E_sub2 && $b>$mean_sub2)
	$gradeexp_sc_sub[1]='E';
if($b<=$mean_sub2)
	$gradeexp_sc_sub[1]='F';
$a2=0;
$a1=0;



$total3= "SELECT mark3_CAT1 FROM nextsem_cat1 WHERE nextsem_cat1.regno='$regno'";
$total_3= "SELECT mark3_CAT2 FROM nextsem_cat2 WHERE nextsem_cat2.regno='$regno'";
$q3=mysqli_query($connect,$total3);
while($row = mysqli_fetch_assoc($q3))
{

	$a1+=$row['mark3_CAT1'];
	
}

$q_3=mysqli_query($connect,$total_3);
while($row = mysqli_fetch_assoc($q_3))
{
	$a2+=$row['mark3_CAT2'];
	
}

$c=(($a1+$a2)/1.5)+$sd_sub3;

if($c>=$A_sub3)
	$gradeexp_sc_sub[2]='S';
if($c<=$A_sub3 && $c>$B_sub3)
	$gradeexp_sc_sub[2]='A';
if($c<=$B_sub3 && $c>$C_sub3)
	$gradeexp_sc_sub[2]='B';
if($c<=$C_sub3 && $c>$D_sub3)
	$gradeexp_sc_sub[2]='C';
if($c<=$D_sub3 && $c>$E_sub3)
	$gradeexp_sc_sub[2]='D';
if($c<=$E_sub3 && $c>$mean_sub3)
	$gradeexp_sc_sub[2]='E';
if($c<=$mean_sub3)
	$gradeexp_sc_sub[2]='F';
$a2=0;
$a1=0;

$total4= "SELECT mark4_CAT1 FROM nextsem_cat1 WHERE nextsem_cat1.regno='$regno'";
$total_4= "SELECT mark4_CAT2 FROM nextsem_cat2 WHERE nextsem_cat2.regno='$regno'";
$q4=mysqli_query($connect,$total4);
while($row = mysqli_fetch_assoc($q4))
{

	$a1+=$row['mark4_CAT1'];
	
}

$q_4=mysqli_query($connect,$total_4);
while($row = mysqli_fetch_assoc($q_4))
{
	$a2+=$row['mark4_CAT2'];
	
}



$d=(($a1+$a2)/1.5)+$sd_sub4;

if($d>=$A_sub4)
	$gradeexp_sc_sub[3]='S';
if($d<=$A_sub4 && $d>$B_sub4)
	$gradeexp_sc_sub[3]='A';
if($d<=$B_sub4 && $d>$C_sub4)
	$gradeexp_sc_sub[3]='B';
if($d<=$C_sub4 && $d>$D_sub4)
	$gradeexp_sc_sub[3]='C';
if($d<=$D_sub4 && $d>$E_sub4)
	$gradeexp_sc_sub[3]='D';
if($d<=$E_sub4 && $d>$mean_sub4)
	$gradeexp_sc_sub[3]='E';
if($d<=$mean_sub4)
	$gradeexp_sc_sub[3]='F';

$a2=0;
$a1=0;



$total5= "SELECT mark5_CAT1 FROM nextsem_cat1 WHERE nextsem_cat1.regno='$regno'";
$total_5= "SELECT mark5_CAT2 FROM nextsem_cat2 WHERE nextsem_cat2.regno='$regno'";
$q5=mysqli_query($connect,$total5);
while($row = mysqli_fetch_assoc($q5))
{

	$a1+=$row['mark5_CAT1'];
	
}

$q_5=mysqli_query($connect,$total_5);
while($row = mysqli_fetch_assoc($q_5))
{
	$a2+=$row['mark5_CAT2'];
	
}


$e=(($a1+$a2)/1.5)+$sd_sub5;


if($e>=$A_sub5)
	$gradeexp_sc_sub[4]='S';
if($e<=$A_sub5 && $e>$B_sub5)
	$gradeexp_sc_sub[4]='A';
if($e<=$B_sub5 && $e>$C_sub5)
	$gradeexp_sc_sub[4]='B';
if($e<=$C_sub5 && $e>$D_sub5)
	$gradeexp_sc_sub[4]='C';
if($e<=$D_sub5 && $e>$E_sub5)
	$gradeexp_sc_sub[4]='D';
if($e<=$E_sub5 && $e>$mean_sub5)
	$gradeexp_sc_sub[4]='E';
if($e<=$mean_sub5)
	$gradeexp_sc_sub[4]='F';
$a1=0;
$a2=0;

?>





<html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to current semester's result) you will get in this semester (sub1) :\n' <?php echo $gradeexp_sc_sub[0]; ?> '");
		});
	});
	
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to current semester's result) you will get in this semester (sub2) :\n' <?php echo $gradeexp_sc_sub[1]; ?> '");
		});
	});
	
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to current semester's result) you will get in this semester (sub3) :\n' <?php echo $gradeexp_sc_sub[2]; ?> '");
		});
	});
	
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to current semester's result) you will get in this semester (sub4) :\n' <?php echo $gradeexp_sc_sub[3]; ?> '");
		});
	});
	
	$(document).ready(function()
	{
		$("h3").click(function()
		{
			alert("PREDICTION DETAILS\nExpected Grade (according to current semester's result) you will get in this semester (sub5) :\n' <?php echo $gradeexp_sc_sub[4]; ?> '");
		});
	});
</script>

</br></br></br></br></br></br>
<h3><button id="b456" onmouseover="changetext()" , onmouseout="changetextagain()">PREDICT ACCORDING TO CURRENT SEMESTER'S RESULT</button></h3>
<script src="tpp.js">
</script>

<body bgcolor="#2b7d88">
</br></br></br>
<!--<h3 id="pqr">
<button>PREDICT ACCORDING TO CURRENT SEMESTER'S RESULT</button>
</h3>-->
</body>

</br></br></br></br></br></br>
<h2><center><u>YOUR CURRENT RESULT IS : </u></center></h2>
</html>
