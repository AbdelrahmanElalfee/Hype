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

// encrypt
function encryptIt( $q ) {
    $cryptKey  = "qJB0rGtIn5UB1xG03efyCp";
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
  }
  // decrypt
  function decryptIt( $q ) {
    $cryptKey  = "qJB0rGtIn5UB1xG03efyCp";
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
  }
  
?>