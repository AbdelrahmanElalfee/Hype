<?php
$localhost="localhost";
$dbUser="root";
$dbPassword="";
$dbName="hype";
$mysqli=mysqli_connect($localhost,$dbUser,$dbPassword,$dbName);
// error_reporting(0);
$error=array();
session_start();
ob_start();