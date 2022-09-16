<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
if (isset($_GET['delete'])) {
    $classId = $_GET['delete'];
    $deleteclass = "DELETE FROM`class`WHERE`class_id`=$classId";
    $runDelete = mysqli_query($mysqli, $deleteclass);
    if ($runDelete) {
        Alert("Deleted", "class");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $classId = $_GET['update'];
    $selectclass = "SELECT * FROM `class` 
    JOIN `gym` ON `class`.`class_gym`=  `gym`.`gym_id`
    WHERE`class`.`class_id`='$classId'";
    $arrayclass = mysqli_fetch_array(mysqli_query($mysqli, $selectclass));
    $gymId = $arrayclass['gym_id'];
    $clsDays = $arrayclass['class_days'];
    $arr = explode(" ", $clsDays);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="sticky-top bg-light m-auto">
                <tr>
                    <th scope="col">classs</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#class" class="btn btn-success ">Add class</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">Description</th>
                    <th scope="col ">Days</th>
                    <th scope="col ">Time</th>
                    <th scope="col ">Gym Name</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectclass = "SELECT *FROM (`class`
                JOIN`gym`
                ON  `class`.`class_gym`=`gym`.`gym_id`)";
                $show = mysqli_query($mysqli, $selectclass);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['class_id'] ?></th>
                        <td><?php echo $data['class_name'] ?></td>
                        <td><?php echo $data['class_price'] ?></td>
                        <td><?php echo $data['class_description'] ?></td>
                        <td><?php echo $data['class_days'] ?></td>
                        <td><?php echo $data['class_time'] ?></td>
                        <td><a href="gym.php?showGym=<?php echo $data['gym_id'] ?>"><?php echo $data['gym_name'] ?></a></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="class.php?update=<?php echo $data['class_id'] ?>&&#update ">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item " href="class.php?delete=<?php echo $data['class_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD class</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Class Name</span>
                                        <input type="text" class="form-control" name="className" placeholder="Class Name" aria-label="className" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="number" class="form-control" name="classPrice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">Class Time</span>
                                        <input type="time" class="form-control" name="classTime" aria-label="Time" aria-describedby="basic-addon1">

                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="classDescription" placeholder="leave your comment" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Description</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Class Days</span>
                                        <select class="form-select" name="classDays[]" size="7" aria-label="size 7 select example" multiple aria-label="multiple select example">
                                            <option value="Sunday" selected>Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wendesday">Wendesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
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
                                    <button type="submit" name="addclass" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arrayclass['gym_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Class Name</span>
                            <input type="text" class="form-control" name="className" placeholder="Class Name" aria-label="className" aria-describedby="basic-addon1" value="<?php echo $arrayclass['class_name'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">$</span>
                            <input type="number" class="form-control" name="classPrice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" value="<?php echo $arrayclass['class_price'] ?>">
                            <span class="input-group-text" id="basic-addon1">Class Time</span>
                            <input type="time" class="form-control" name="classTime" aria-label="Time" value="<?php echo $arrayclass['class_time'] ?>" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="classDescription" placeholder="leave your comment" id="floatingTextarea"><?php echo $arrayclass['class_description'] ?></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Class Days Selected Days:<br><?php  ?></span>
                            <select class="form-select" name="classDays[]" size="7" aria-label="size 7 select example" multiple aria-label="multiple select example">
                                <option value="Sunday" <?php if (in_array("Sunday", $arr)) {
                                                            echo "selected";
                                                        } ?>> Sunday</option>
                                <option value="Monday" <?php if (in_array("Monday", $arr)) {
                                                            echo "selected";
                                                        } ?>>Monday</option>
                                <option value="Tuesday" <?php if (in_array("Tuesday", $arr)) {
                                                            echo "selected";
                                                        } ?>>Tuesday</option>
                                <option value="Wendesday" <?php if (in_array("Wendesday", $arr)) {
                                                                echo "selected";
                                                            } ?>>Wendesday</option>
                                <option value="Thursday" <?php if (in_array("Thursday", $arr)) {
                                                                echo "selected";
                                                            } ?>>Thursday</option>
                                <option value="Friday" <?php if (in_array("Friday", $arr)) {
                                                            echo "selected";
                                                        } ?>>Friday</option>
                                <option value="Saturday" <?php if (in_array("Saturday", $arr)) {
                                                                echo "selected";
                                                            } ?>>Saturday</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gym Name</label>
                            <select name="gymId" class="form-select gov" id="inputGroupSelect01">
                                <option value="<?php echo $arrayclass['gym_id'] ?>" selected>
                                    <?php echo $arrayclass['gym_id'] . "-" . $arrayclass['gym_name']; ?></option>
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
                        <button type="submit" name="updateclass" class="btn btn-primary">Update</button>
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
if (isset($_POST['updateclass'])) {
    $className = $mysqli->real_escape_string($_POST['className']);
    if (empty($className)) {
        array_push($error, "class Name is needed");
    }
    $classPrice = $mysqli->real_escape_string($_POST['classPrice']);
    if (empty($classPrice)) {
        array_push($error, "class Price is needed");
    }
    $classDays = $_POST['classDays'];
    $days = "";
    foreach ($classDays as $subject) {
        $days .= $subject . " ";
        // echo "You selected $subject<br/>";
    }
    if (empty($classDays)) {
        array_push($error, "Class Days is needed");
    }
    $classTime = $mysqli->real_escape_string($_POST['classTime']);
    if (empty($classTime)) {
        array_push($error, "class Time is needed");
    }
    $classDescription = $mysqli->real_escape_string($_POST['classDescription']);
    if (empty($classDescription)) {
        array_push($error, "class Description is needed");
    }
    $classGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($classGymId)) {
        array_push($error, "Gym is needed");
    }
    foreach ($error as $msg) {
        echo $msg . "<br>";
    }
    if (empty($error)) {
        $updateclass = "UPDATE `class` SET `class_name`='$className',`class_time`='$classTime', `class_description`='$classDescription',`class_price`='$classPrice',`class_Days`='$days',`class_gym`='$classGymId'WHERE`class_id`='$classId'";
        $updateRun = mysqli_query($mysqli, $updateclass);
        if ($updateRun) {
            Alert("Updated", "class");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addclass'])) {
    $update = false;
    $className = $mysqli->real_escape_string($_POST['className']);
    if (empty($className)) {
        array_push($error, "class Name is needed");
    }
    $classPrice = $mysqli->real_escape_string($_POST['classPrice']);
    if (empty($classPrice)) {
        array_push($error, "class Price is needed");
    }
    $classDays = $_POST['classDays'];
    $days = "";
    foreach ($classDays as $subject) {
        $days .= $subject . " ";
        echo "You selected $subject<br/>";
    }
    if (empty($classDays)) {
        array_push($error, "Class Days is needed");
    }
    $classTime = $mysqli->real_escape_string($_POST['classTime']);
    if (empty($classTime)) {
        array_push($error, "class Time is needed");
    }
    $classDescription = $mysqli->real_escape_string($_POST['classDescription']);
    if (empty($classDescription)) {
        array_push($error, "class Description is needed");
    }
    $classGymId = $mysqli->real_escape_string($_POST['gymId']);
    if (empty($classGymId)) {
        array_push($error, "Gym is needed");
    }
    foreach ($error as $msg) {
        echo $msg . "<br>";
    }
    if (empty($error)) {
        $insertclass = "INSERT INTO `class` VALUES(NULL,'$className','$classPrice','$classDescription','$days','$classTime','$classGymId')";
        $runInsert = mysqli_query($mysqli, $insertclass);
        if ($runInsert) {
            Alert("added", "class");
        } else {
            echo "nooooooooooo";
        }
    }
}

?>