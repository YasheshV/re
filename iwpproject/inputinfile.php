<?php
$servername="127.0.0.1";
$username="root";
$password="";
$dbname="iwpproject";

$connect = new mysqli("$servername",$username,$password,$dbname);  

if($connect->connect_error)
	echo "Connection failed" .$connect->connect_error;
else
	echo "Connection successful";

$name=$_POST['name'];
$age=$_POST['age'];
$regno=$_POST['regno'];
$branch=$_POST['branch'];
$school=$_POST['school'];

$cat1_m1_sp=$_POST['c1m1'];
$cat1_m2_sp=$_POST['c1m2'];
$cat1_m3_sp=$_POST['c1m3'];
$cat1_m4_sp=$_POST['c1m4'];
$cat1_m5_sp=$_POST['c1m5'];

$cat2_m1_sp=$_POST['c2m1'];
$cat2_m2_sp=$_POST['c2m2'];
$cat2_m3_sp=$_POST['c2m3'];
$cat2_m4_sp=$_POST['c2m4'];
$cat2_m5_sp=$_POST['c2m5'];

$fat_m1=$_POST['fm1'];
$fat_m2=$_POST['fm2'];
$fat_m3=$_POST['fm3'];
$fat_m4=$_POST['fm4'];
$fat_m5=$_POST['fm5'];
$got_grade=$_POST['got_grade'];


$cat1_m1_sc=$_POST['c1m1_cs'];
$cat1_m2_sc=$_POST['c1m2_cs'];
$cat1_m3_sc=$_POST['c1m3_cs'];
$cat1_m4_sc=$_POST['c1m4_cs'];
$cat1_m5_sc=$_POST['c1m5_cs'];

$cat2_m1_sc=$_POST['c2m1_cs'];
$cat2_m2_sc=$_POST['c2m2_cs'];
$cat2_m3_sc=$_POST['c2m3_cs'];
$cat2_m4_sc=$_POST['c2m4_cs'];
$cat2_m5_sc=$_POST['c2m5_cs'];



$t_cat1_m1_sp = $cat1_m1_sp*0.3;
$t_cat1_m2_sp = $cat1_m2_sp*0.3;
$t_cat1_m3_sp = $cat1_m3_sp*0.3;
$t_cat1_m4_sp = $cat1_m4_sp*0.3;
$t_cat1_m5_sp = $cat1_m5_sp*0.3;

$t_cat2_m1_sp = $cat2_m1_sp*0.3;
$t_cat2_m2_sp = $cat2_m2_sp*0.3;
$t_cat2_m3_sp = $cat2_m3_sp*0.3;
$t_cat2_m4_sp = $cat2_m4_sp*0.3;
$t_cat2_m5_sp = $cat2_m5_sp*0.3;

$t_fat_m1 = $fat_m1*0.7;
$t_fat_m2 = $fat_m2*0.7;
$t_fat_m3 = $fat_m3*0.7;
$t_fat_m4 = $fat_m4*0.7;
$t_fat_m5 = $fat_m5*0.7;


$avg1=$t_fat_m1 + $t_cat1_m1_sp + $t_cat2_m1_sp;  
$avg2=$t_fat_m2 + $t_cat1_m2_sp + $t_cat2_m2_sp;
$avg3=$t_fat_m3 + $t_cat1_m3_sp + $t_cat2_m3_sp;
$avg4=$t_fat_m4 + $t_cat1_m4_sp + $t_cat2_m4_sp;
$avg5=$t_fat_m5 + $t_cat1_m5_sp + $t_cat2_m5_sp;

$mean;

$avg =($avg1 + $avg2 + $avg3 + $avg4 + $avg5 ) / 5;
if($avg>=90)
	$act_grade='S';
else if($avg>=80 && $avg<90)
	$act_grade='A';
else if($avg>=70 && $avg<80)
	$act_grade='B';
else if($avg>=60 && $avg<70)
	$act_grade='C';
else if($avg>=50 && $avg<60)
	$act_grade='D';
else if($avg>=40 && $avg<50)
	$act_grade='E';
else 
	$act_grade='F';


$q2 = "INSERT INTO student VALUES ('$regno','$name','$age','$school')";
$q3 = "INSERT INTO nextsem_cat1 VALUES ('$cat1_m1_sp','$cat1_m2_sp','$cat1_m3_sp','$cat1_m4_sp','$cat1_m5_sp','$regno')";
$q4 = "INSERT INTO nextsem_cat2 VALUES ('$cat2_m1_sp','$cat2_m2_sp','$cat2_m3_sp','$cat2_m4_sp','$cat2_m5_sp','$regno')";
$q5 = "INSERT INTO w_cat1 VALUES ('$cat1_m1_sc','$cat1_m2_sc','$cat1_m3_sc','$cat1_m4_sc','$cat1_m5_sc','$regno')";
$q6 = "INSERT INTO w_cat2 VALUES ('$cat2_m1_sc','$cat2_m2_sc','$cat2_m3_sc','$cat2_m4_sc','$cat2_m5_sc','$regno')";
$q7 = "INSERT INTO w_fat VALUES ('$fat_m1','$fat_m2','$fat_m3','$fat_m4','$fat_m5','$regno')";

if($avg>0)
	$q1 = "INSERT INTO records(gotgrades,actualgrades,regno) VALUES ('$got_grade','$act_grade','$regno')";
else
	echo "PLEASE DO NOT SUBMIT A BLANK FORM";





if ($connect->query($q1) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q1 . "<br>" . $connect->error;

if ($connect->query($q2) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q2 . "<br>" . $connect->error;

if ($connect->query($q3) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q3 . "<br>" . $connect->error;

if ($connect->query($q4) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q4 . "<br>" . $connect->error;

if ($connect->query($q5) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q5 . "<br>" . $connect->error;

if ($connect->query($q6) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q6 . "<br>" . $connect->error;

if ($connect->query($q7) === TRUE) 
    echo "<br>"."New record created successfully";
else 
    echo "Error: " . $q7 . "<br>" . $connect->error;
   header("Location: profile.php");
   exit;
?>