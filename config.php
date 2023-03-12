<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$database = "admin";

$conn = mysqli_connect($sname, $unmae, $password, $database);

if (!$conn) {
	echo "Connection failed!";
}