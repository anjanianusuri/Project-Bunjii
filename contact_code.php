<?php
$user='root';
$pass='';
$db='project';

$con=mysqli_connect('localhost',$user, $pass, $db);
if($con)
	

$Name=$_POST['name'];
$Email=$_POST['email'];
$Message=$_POST['message'];

$sql="insert into contact (name, email, message) values('$Name', '$Email', '$Message')";
$query=mysqli_query($con,$sql);

if($query)
echo "<script>alert('same message');</script>";
header("Location:contact.php");

?>