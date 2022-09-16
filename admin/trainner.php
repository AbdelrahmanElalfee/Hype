<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
if (isset($_GET['delete'])) {
    $trainnerId = $_GET['delete'];
    $deleteTrainner = "DELETE FROM`trainner`WHERE`trainner_id`=$trainnerId";
    $runDelete = mysqli_query($mysqli, $deleteTrainner);
    if ($runDelete) {
        Alert("Deleted", "trainner");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $trainnerId = $_GET['update'];
    $selectTrainner = "SELECT * FROM `trainner` 
JOIN `gym` ON `trainner`.`trainner_gym`=`gym`.`gym_id`
WHERE`trainner`.`trainner_id`='$trainnerId'";
    $arrayTrainner = mysqli_fetch_array(mysqli_query($mysqli, $selectTrainner));
    $gymId = $arrayTrainner['gym_id'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <table class="table">
            <thead class=" bg-light sticky-top">
                <tr>
                    <th scope="col">Trainners</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#trainner" class="btn btn-success ">Add Trainner</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Email</th>
                    <th scope="col ">Phone</th>
                    <th scope="col ">Password</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">Image</th>
                    <th scope="col ">Gym</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectTrainner = "SELECT *FROM `trainner`";
                                if(isset($_GET['showTr'])){
                                    $showTr=$_GET['showTr'];
                                    $selectTrainner.="WHERE `trainner_id`='$showTr'";
                                }
                $show = mysqli_query($mysqli, $selectTrainner);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['trainner_id'] ?></th>
                        <td><?php echo $data['trainner_name'] ?></td>
                        <td><?php echo $data['trainner_email'] ?></td>
                        <td><?php echo $data['trainner_phone'] ?></td>
                        <td><?php echo $data['trainner_experience'] ?></td>
                        <td><?php echo $data['trainner_price'] ?></td>
                        <td><img src="<?php echo "upload/" . $data['trainner_image'] ?>" width="100px" height="100px" alt=""></td>
                        <?php if(isset($data["trainner_gym"])){
                            $trainnerGymId=$data["trainner_gym"];
                            $selectGym="SELECT *FROM`gym`WHERE`gym_id`='$trainnerGymId'";
                            $fetchGym=mysqli_fetch_array(mysqli_query($mysqli,$selectGym));
                            ?>
                        <td><a href="gym.php?showGym=<?php echo $fetchGym['gym_id'] ?>"><?php echo $fetchGym['gym_name'] ?></a></td>
                        <?php }else{ ?>
                        <td>Freelancing</td>
                        <?php } ?>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="trainner.php?update=<?php echo $data['trainner_id']; ?>&&#update ">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item " href="trainner.php?delete=<?php echo $data['trainner_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="trainner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD Trainner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Trainner Name</span>
                                        <input type="text" class="form-control" placeholder="Trainner Name" aria-label="Trainner Name" name="trainnerName" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email</span>
                                        <input type="email" aria-label="Email" placeholder="Email@gmail.com" name="trainnerEmail" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">+20</span>
                                        <input type="number" class="form-control" name="trainnerPhone" placeholder="Phone" aria-label="Phone" maxlength="11" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="number" class="form-control" name="trainnerPrice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Password</span>
                                        <input type="password" class="form-control" name="trainnerPass" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" name="trainnerImage" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
                                    <button type="submit" name="addTrainner" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arrayTrainner['trainner_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Trainner Name</span>
                            <input type="text" class="form-control" placeholder="Trainner Name" value="<?php echo $arrayTrainner['trainner_name']  ?>" aria-label="Trainner Name" name="trainnerName" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" aria-label="Email" name="trainnerEmail" class="form-control" value="<?php echo $arrayTrainner['trainner_email']  ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+20</span>
                            <input type="number" class="form-control" name="trainnerPhone" placeholder="Phone" value="<?php echo $arrayTrainner['trainner_phone']  ?>" maxlength="11" aria-label="Phone" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">$</span>
                            <input type="number" class="form-control" name="trainnerPrice" placeholder="Price" value="<?php echo $arrayTrainner['trainner_price']  ?>" aria-label="Price" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password" class="form-control" name="trainnerPass" placeholder="Password" value="<?php echo $arrayTrainner['trainner_password']  ?>" maxlength="11" aria-label="Phone" aria-describedby="basic-addon1">

                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/*" name="trainnerImage" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gym Name</label>
                            <select name="gymId" class="form-select gov" id="inputGroupSelect01">
                                <option value="<?php echo $arrayTrainner['gym_id'] ?>" selected>
                                    <?php echo $arrayTrainner['gym_id'] . "-" . $arrayTrainner['gym_name']; ?></option>
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
                            <button type="submit" name="updateTrainner" class="btn btn-primary">Update</button>
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
if (isset($_POST['updateTrainner'])) {
    $trainnerName = $mysqli->real_escape_string($_POST['trainnerName']);
    if (empty($trainnerName)) {
        array_push($error, "Trainner Name is needed");
    }
    $fileName = $_FILES['trainnerImage']['name'];
    $tempName = $_FILES['trainnerImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = $arrayTrainner['trainner_image'];
    }
    $trainnerEmail = $mysqli->real_escape_string($_POST['trainnerEmail']);
    if (empty($trainnerEmail)) {
        array_push($error, "Trainner Email is needed");
    }
    $trainnerPhone = $mysqli->real_escape_string($_POST['trainnerPhone']);
    if (empty($trainnerPhone)) {
        array_push($error, "Trainner Phone is needed");
    }
    $trainnerExperience = $mysqli->real_escape_string($_POST['trainnerExperience']);
    if (empty($trainnerExperience)) {
        array_push($error, "Trainner Experience is needed");
    }
    $trainnerGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($trainnerGymId)) {
        $trainnerGymId = null;
    }
    foreach ($error as $msg) {
        echo "<h3>$msg</h3><br>";
    }
    if (empty($error)) {
        $updateTrainner = "UPDATE `trainner` SET `trainner_name`='$trainnerName',`trainner_image`='$fileName',`trainner_phone`='$trainnerPhone',`trainner_email`='$trainnerEmail',`trainner_experience`='$trainnerExperience',`trainner_gym`='$trainnerGymId'WHERE`trainner_id`='$trainnerId'";
        $updateRun = mysqli_query($mysqli, $updateTrainner);
        if ($updateRun) {
            Alert("Updated", "trainner");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addTrainner'])) {
    $update = false;
    $trainnerName = $mysqli->real_escape_string($_POST['trainnerName']);
    if (empty($trainnerName)) {
        array_push($error, "Trainner Name is needed");
    }
    $fileName = $_FILES['trainnerImage']['name'];
    $tempName = $_FILES['trainnerImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $trainnerEmail = $mysqli->real_escape_string($_POST['trainnerEmail']);
    if (empty($trainnerEmail)) {
        array_push($error, "Trainner Email is needed");
    }
    $numDoc = mysqli_num_rows(mysqli_query($mysqli, "SELECT `trainner_email`FROM`trainner`WHERE`trainner_email`='$trainnerEmail'"));
    if ($numDoc > 0) {
        array_push($error, "Email Already exists");
    }
    $trainnerPhone = $mysqli->real_escape_string($_POST['trainnerPhone']);
    if (empty($trainnerPhone)) {
        array_push($error, "Trainner Phone is needed");
    }
    $numDocPhone = mysqli_num_rows(mysqli_query($mysqli, "SELECT `trainner_phone`FROM`trainner`WHERE`trainner_phone`='$trainnerPhone'"));
    if ($numDocPhone > 0) {
        array_push($error, "Phone Already exists");
    }
    $trainnerExperience = $mysqli->real_escape_string($_POST['trainnerExperience']);
    if (empty($trainnerExperience)) {
        array_push($error, "Trainner Experience is needed");
    }
    $trainnerGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($trainnerGymId)) {
        $trainnerGymId = null;
    }
    foreach ($error as $msg) {
        echo "$msg<br>";
    }
    if (empty($error)) {
        $insertTrainner = "INSERT INTO `trainner` VALUES(NULL,'$trainnerName','$trainnerEmail','$trainnerPhone','$fileName','$trainnerExperience','$trainnerGymId')";
        $runInsert = mysqli_query($mysqli, $insertTrainner);
        if ($runInsert) {
            echo "hi";
        } else {
            echo "noooooooooooo";
        }
    }
}

?>