<?php
include('shared/config.php');
if(isset($_SESSION['uMail'])){
$userMail=$_SESSION['uMail'];
$selectUser="SELECT*FROM`user`WHERE`user_mail`='$userMail'";
$runSelectUser=mysqli_query($mysqli,$selectUser);
$fetchUser=mysqli_fetch_array($runSelectUser);
$userId=$fetchUser['user_id'];
$selectCart="SELECT * FROM `cart` WHERE`cart_user`='$userId'";
$rowCart=mysqli_num_rows(mysqli_query($mysqli,$selectCart));
}
// else{
//     echo"<h2>you should be logged in</h2>";
//     header("refresh:2;url=login.php");
// }
