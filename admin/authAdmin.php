<?php
include("config.php");
if (isset($_SESSION['adminEmail'])) {
    $adminMail = $_SESSION['adminEmail'];
    $selectData = "SELECT * FROM `admin`WHERE `admin_mail`='$adminMail'";
    $runSelectData;
    $adminRow = mysqli_fetch_array(mysqli_query($mysqli, $selectData));
    $adminId = $adminRow['admin_id'];
    $adminName = $adminRow['admin_name'];
    $adminPhone = $adminRow['admin_phone'];
    $adminImage = $adminRow['admin_img'];
    $adminAction = $adminRow['admin_action'];

    if (isset($_GET['logout'])) {
        session_destroy();
        session_unset();
        Alert("logged out", "login");
        // header("refresh:2;url=login.php");
    }
} else {
    echo "YOU SHOULD BE LOGGED IN FIRST";
    header("refresh:2;url=login.php");
}

function Alert($msg, $page)
{
    echo "<div class='fixed-top mb-3 alert alert-success' role='alert'>
    $msg
  </div>";
    header("refresh:2;url=$page.php");
}
