<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "2021-04-defi-kasir";

$dbconnect = new mysqli ("$host", "$user", "$pass", "$db");

if($dbconnect-> connect_error)
{
	echo "koneksi gagal -> ".$dbconnect->connect_error;
}
?>
