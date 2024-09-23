<?php $XIpass="uTestDbPass"?>
<?php

$servername="localhost";
$dbusername="XIu_t";
$password="$XIpass";
$dBName="XI_t";

$conn=mysqli_connect($servername,$dbusername,$password,$dBName);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
