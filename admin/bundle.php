<?php
include("authAdmin.php");
include("shared/sidebar.php");
$update = false;
if (isset($_GET['delete'])) {
    $bundleId = $_GET['delete'];
    $deletebundle = "DELETE FROM`bundle`WHERE`bundle_id`=$bundleId";
    $runDelete = mysqli_query($mysqli, $deletebundle);
    if ($runDelete) {
        Alert("Deleted", "bundle");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $bundleId = $_GET['update'];
    $selectbundle = "SELECT * FROM `bundle` 
    JOIN `gym` ON `bundle`.`bundle_id`=  `gym`.`gym_id`
    WHERE`bundle`.`bundle_id`='$bundleId'";
    $arraybundle = mysqli_fetch_array(mysqli_query($mysqli, $selectbundle));
    $gymId = $arraybundle['gym_id'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bundle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="m-auto sticky-top bg-light">
                <tr>
                    <th scope="col">bundles</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#bundle" class="btn btn-success ">Add bundle</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">duration</th>
                    <th scope="col ">Gym Name</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectbundle = "SELECT *FROM (`bundle`
                JOIN`gym`
                ON  `bundle`.`bundle_gym`=`gym`.`gym_id`)";
                $show = mysqli_query($mysqli, $selectbundle);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['bundle_id'] ?></th>
                        <td><?php echo $data['bundle_price'] ?></td>
                        <td><?php echo $data['bundle_duration'] ?></td>
                        <td><a href="gym.php?showGym=<?php echo $data['gym_id'] ?>"><?php echo $data['gym_name'] ?></a></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="bundle.php?update=<?php echo $data['bundle_id'] ?>&&#update ">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item " href="bundle.php?delete=<?php echo $data['bundle_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="bundle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD bundle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="number" class="form-control" name="bundlePrice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Duration</span>
                                        <input type="text" class="form-control" name="bundleDuration" placeholder="6 months" aria-label="Duration" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Gym Name</label>
                                        <select name="gymId" class="form-select gov" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
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
                                    <button type="submit" name="addbundle" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arraybundle['gym_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">bundle Duration</span>
                            <input type="text" class="form-control" placeholder="Duration" value="<?php echo $arraybundle['bundle_duration']; ?>" aria-label="Duration" name="bundleDuration" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">$</span>
                            <input type="number" class="form-control" name="bundlePrice" value="<?php echo $arraybundle['bundle_price']; ?>" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gym Name</label>
                            <select name="gymId" class="form-select gov" id="inputGroupSelect01">
                                <option value="<?php echo $arraybundle['gym_id'] ?>" selected>
                                    <?php echo $arraybundle['gym_id'] . "-" . $arraybundle['gym_name']; ?></option>
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
                    </div>
                    <div class="modal-footer d-grid col-12 mx-auto">
                        <button type="submit" name="updatebundle" class="btn btn-primary">Update</button>
                </form>
            </div>
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
if (isset($_POST['updatebundle'])) {
    $bundleDuration = $mysqli->real_escape_string($_POST['bundleDuration']);
    if (empty($bundleDuration)) {
        array_push($error, "bundle Duration is needed");
    }
    $bundlePrice = $mysqli->real_escape_string($_POST['bundlePrice']);
    if (empty($bundlePrice)) {
        array_push($error, "bundle Price is needed");
    }
    $bundleGymId = $mysqli->real_escape_string($_POST['gymId']);
    foreach ($error as $msg) {
        echo "<h3>$msg</h3><br>";
    }
    if (empty($error)) {
        $updatebundle = "UPDATE `bundle` SET `bundle_duration`='$bundleDuration',`bundle_price`='$bundlePrice',`bundle_gym`='$bundleGymId'WHERE`bundle_id`='$bundleId'";
        $updateRun = mysqli_query($mysqli, $updatebundle);
        if ($updateRun) {
            Alert("Updated", "bundle");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addbundle'])) {
    $update = false;
    $bundlePrice = $mysqli->real_escape_string($_POST['bundlePrice']);
    if (empty($bundlePrice)) {
        array_push($error, "bundle Price is needed");
    }
    $bundleDuration = $mysqli->real_escape_string($_POST['bundleDuration']);
    if (empty($bundleDuration)) {
        array_push($error, "bundle Duration is needed");
    }
    $bundleGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($bundleGymId)) {
        array_push($error, "Gym is needed");
    }
    echo $bundleGymId;
    foreach ($error as $msg) {
        echo "<br>";
    }
    if (empty($error)) {
        $insertbundle = "INSERT INTO `bundle` VALUES(NULL,'$bundlePrice','$bundleDuration','$bundleGymId')";
        $runInsert = mysqli_query($mysqli, $insertbundle);
        if ($runInsert) {
            Alert("added", "bundle");
        } else {
            echo "nooooooooooo";
        }
    }
}

?>