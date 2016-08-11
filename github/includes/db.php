<?php
$mysql_host = "fdb12.atspace.me";
$mysql_database = "2173748_alex";
$mysql_user = "2173748_alex";
$mysql_password = "Alexander1";

//$con = mysqli_connect("localhost","root","root","onestop");

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password)or die(mysql_error());

if(mysqli_connect_errno()){
	echo " Failed to connect to MySQL: ".mysqli_connect_err();
}

?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->