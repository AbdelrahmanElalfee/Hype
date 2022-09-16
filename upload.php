<?php
include('shared/authUser.php');
//upload.php
if($_FILES["file"]["name"]!='')
{
    $test=explode(".",$_FILES["file"]["name"]);
    $extension= end($test);
    $name=rand(100,999).'.'.$extension;
    $location='./img/'.$name;
    $upload=move_uploaded_file($_FILES["file"]["tmp_name"],$location);
    // echo'<img src="'.$location.'" height="150" width="225" class="img-thumbnail"/>';
  if($upload){
    $updateImg="UPDATE`user`SET`user_img`='$name'WHERE`user_id`='$userId'";
    $runUpdate=mysqli_query($mysqli,$updateImg);
    header('location:profile.php');

  }
}
  ?>  