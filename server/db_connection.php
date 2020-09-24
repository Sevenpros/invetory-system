<?php
$servername="localhost";
$username="root";
$password="";
$db="invetory";
// Create Connection
$con=mysqli_connect($servername,$username,$password,$db);
//Check connection
if(!$con){
	die("connection failed:" .mysqli_connect_error());
}
?>