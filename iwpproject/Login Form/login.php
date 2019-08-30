<?php

$servername="127.0.0.1";
$host='localhost';
$username='root';
$password='';
$dbname='tp';

$connect = new mysqli("$servername",$username,$password,$dbname);  
$regno=$_POST['uname'];
$age=$_POST['psw'];
$q1="SELECT * from student where regno='$regno'";
$query=mysqli_query($connect,$q1);

while($row = mysqli_fetch_assoc($query))
{
		$pass_db=$row['age'];
}
if($pass_db==$age)
{
	echo "<script>alert('Login Successful...');";
	echo "href='main_menu.html'</script>";
	
}
else
{
	echo "<script>alert('Invalid Credentials.');";
	echo "href='login.html'</script>";
}
?>