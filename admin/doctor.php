<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
if (isset($_GET['delete'])) {
    $doctorId = $_GET['delete'];
    $deleteDoctor = "DELETE FROM`doctor`WHERE`doctor_id`=$doctorId";
    $runDelete = mysqli_query($mysqli, $deleteDoctor);
    if ($runDelete) {
        Alert("Deleted", "doctor");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $doctorId = $_GET['update'];
    $selectDoctor = "SELECT * FROM `doctor` 
    JOIN `gym` ON `doctor`.`doctor_gym`=`gym`.`gym_id`
    WHERE`doctor`.`doctor_id`='$doctorId'";
    $arrayDoctor = mysqli_fetch_array(mysqli_query($mysqli, $selectDoctor));
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="sticky-top bg-light">
                <tr>
                    <th scope="col">Nutritionists</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#doctor" class="btn btn-success ">Add Doctor</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Email</th>
                    <th scope="col ">Phone</th>
                    <th scope="col ">Image</th>
                    <th scope="col ">Experience</th>
                    <th scope="col ">Account</th>
                    <th scope="col ">Gym</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectDoctor = "SELECT *FROM `doctor`";
                if(isset($_GET['showDr'])){
                    $showDr=$_GET['showDr'];
                    $selectDoctor.="WHERE `doctor_id`='$showDr'";
                }
                $show = mysqli_query($mysqli, $selectDoctor);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['doctor_id'] ?></th>
                        <td><?php echo $data['doctor_name'] ?></td>
                        <td><?php echo $data['doctor_email'] ?></td>
                        <td><?php echo $data['doctor_phone'] ?></td>
                        <td><img src="<?php echo "upload/" . $data['doctor_image'] ?>" width="100px" height="100px" alt="">
                        </td>
                        <td><?php echo $data['doctor_experience'] ?></td>
                        <?php if(isset($data["doctor_gym"])){
                            $doctorGymId=$data["doctor_gym"];
                            $selectGym="SELECT *FROM`gym`WHERE`gym_id`='$doctorGymId'";
                            $fetchGym=mysqli_fetch_array(mysqli_query($mysqli,$selectGym));
                            ?>
                        <td><a href="gym.php?showGym=<?php echo $fetchGym['gym_id'] ?>"><?php echo $fetchGym['gym_name'] ?></a></td>
                        <?php }else{ ?>
                        <td>FreeLancing</td>
                        <?php } ?>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="doctor.php?update=<?php echo $data['doctor_id']; ?>&&#update ">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item " href="doctor.php?delete=<?php echo $data['doctor_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD Doctor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Doctor Name</span>
                                        <input type="text" class="form-control" placeholder="Doctor Name" aria-label="Doctor Name" name="doctorName" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email</span>
                                        <input type="email" aria-label="Email" placeholder="Email@gmail.com" name="doctorEmail" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">+20</span>
                                        <input type="number" class="form-control" name="doctorPhone" placeholder="Phone" aria-label="Phone" maxlength="11" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" name="doctorImage" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="doctorExperience" placeholder="leave your comment" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Doctor Experience</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Gym</label>
                                        <select name="gymId" class="form-select" id="inputGroupSelect01">
                                            <option value="">Freelancing</option>
                                            <?php
                                            $select = "SELECT * FROM `gym`";
                                            $querySelect = mysqli_query($mysqli, $select);
                                            foreach ($querySelect as $rows) {
                                            ?>
                                                <option value="<?php echo $rows['gym_id'] ?>">
                                                    <?php echo $rows['gym_id'] . "-" . $rows['gym_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addDoctor" class="btn btn-primary">Add</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
        <!-- ########################################################### ############################-->
        <!-- Update Form -->
        <!-- ################################################################ -->
        <?php if ($update) { ?>
            <div id="update">
                <img src="upload/<?php echo $arrayDoctor['doctor_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Doctor Name</span>
                            <input type="text" class="form-control" placeholder="Doctor Name" value="<?php echo $arrayDoctor['doctor_name']  ?>" aria-label="Doctor Name" name="doctorName" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" aria-label="Email" name="doctorEmail" class="form-control" value="<?php echo $arrayDoctor['doctor_email']  ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+20</span>
                            <input type="number" class="form-control" name="doctorPhone" placeholder="Phone" value="<?php echo $arrayDoctor['doctor_phone']  ?>" maxlength="11" aria-label="Phone" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/*" name="doctorImage" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="doctorExperience" placeholder="leave your comment" id="floatingTextarea"><?php echo $arrayDoctor['doctor_experience']  ?></textarea>
                            <label for="floatingTextarea">Doctor Experience</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gym Name</label>
                            <select name="gymId" class="form-select gov" id="inputGroupSelect01">
                                <option value="<?php echo $arrayDoctor['gym_id'] ?>" selected>
                                    <?php echo $arrayDoctor['gym_id'] . "-" . $arrayDoctor['gym_name']; ?></option>
                                <option value="">Freelancing</option>
                                <?php
                                $select = "SELECT * FROM `gym` EXCEPT SELECT * FROM `gym` WHERE `gym_id`='$gymId' ";
                                $querySelect = mysqli_query($mysqli, $select);
                                foreach ($querySelect as $rows) {
                                ?>
                                    <option value="<?php echo $rows['gym_id'] ?>">
                                        <?php echo  $rows['gym_id'] . "-" . $rows['gym_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-footer d-grid col-12 mx-auto">
                            <button type="submit" name="updateDoctor" class="btn btn-primary">Update</button>
                        </div>
                </form>
            <?php } ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js " integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk " crossorigin="anonymous ">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js " integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy " crossorigin="anonymous ">
            </script>
            <script src="js/app.js"></script>
</body>

</html>
<?php
if (isset($_POST['updateDoctor'])) {
    $doctorName = $mysqli->real_escape_string($_POST['doctorName']);
    if (empty($doctorName)) {
        array_push($error, "Doctor Name is needed");
    }
    $fileName = $_FILES['doctorImage']['name'];
    $tempName = $_FILES['doctorImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = $arrayDoctor['gym_image'];
    }
    $doctorEmail = $mysqli->real_escape_string($_POST['doctorEmail']);
    if (empty($doctorEmail)) {
        array_push($error, "Doctor Email is needed");
    }
    $doctorPhone = $mysqli->real_escape_string($_POST['doctorPhone']);
    if (empty($doctorPhone)) {
        array_push($error, "Doctor Phone is needed");
    }
    $doctorExperience = $mysqli->real_escape_string($_POST['doctorExperience']);
    if (empty($doctorExperience)) {
        array_push($error, "Doctor Experience is needed");
    }
    $doctorGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($doctorGymId)) {
        $doctorGymId = null;
    }
    foreach ($error as $msg) {
        echo "<h3>$msg</h3><br>";
    }
    if (empty($error)) {
        $updateDoctor = "UPDATE `doctor` SET `doctor_name`='$doctorName',`doctor_image`='$fileName',`doctor_phone`='$doctorPhone',`doctor_email`='$doctorEmail',`doctor_experience`='$doctorExperience',`doctor_gym`='$doctorGymId'WHERE`doctor_id`='$doctorId'";
        $updateRun = mysqli_query($mysqli, $updateDoctor);
        if ($updateRun) {
            Alert("Updated", "doctor");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addDoctor'])) {
    $update = false;
    $doctorName = $mysqli->real_escape_string($_POST['doctorName']);
    if (empty($doctorName)) {
        array_push($error, "Doctor Name is needed");
    }
    $fileName = $_FILES['doctorImage']['name'];
    $tempName = $_FILES['doctorImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $doctorEmail = $mysqli->real_escape_string($_POST['doctorEmail']);
    if (empty($doctorEmail)) {
        array_push($error, "Doctor Email is needed");
    }
    $numDoc = mysqli_num_rows(mysqli_query($mysqli, "SELECT `doctor_email`FROM`doctor`WHERE`doctor_email`='$doctorEmail'"));
    if ($numDoc > 0) {
        array_push($error, "Email Already exists");
    }
    $doctorPhone = $mysqli->real_escape_string($_POST['doctorPhone']);
    if (empty($doctorPhone)) {
        array_push($error, "Doctor Phone is needed");
    }
    $numDocPhone = mysqli_num_rows(mysqli_query($mysqli, "SELECT `doctor_phone`FROM`doctor`WHERE`doctor_phone`='$doctorPhone'"));
    if ($numDocPhone > 0) {
        array_push($error, "Phone Already exists");
    }
    $doctorExperience = $mysqli->real_escape_string($_POST['doctorExperience']);
    if (empty($doctorExperience)) {
        array_push($error, "Doctor Experience is needed");
    }
    $doctorGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($doctorGymId)) {
        $doctorGymId = null;
    }
    foreach ($error as $msg) {
        echo "$msg<br>";
    }
    if (empty($error)) {
        $insertDoctor = "INSERT INTO `doctor` VALUES(NULL,'$doctorName','$doctorEmail','$doctorPhone','$fileName','$doctorExperience','$doctorGymId')";
        $runInsert = mysqli_query($mysqli, $insertDoctor);
        if ($runInsert) {
            echo "hi";
        } else {
            echo "noooooooooooo";
        }
    }
}

?>