<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
$showOnly = false;
if (isset($_GET['showGym'])) {
    $showOnly = true;
    $showGymId = $_GET['showGym'];
}
if (isset($_GET['delete'])) {
    $gymId = $_GET['delete'];
    $deleteGym = "DELETE FROM`gym`WHERE`gym_id`=$gymId";
    $runDelete = mysqli_query($mysqli, $deleteGym);
    if ($runDelete) {
        Alert("Deleted", "gym");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $gymId = $_GET['update'];
    $selectGym = "SELECT * FROM `gym` 
    JOIN `cities` ON `gym`.`gym_city`=`cities`.`cityId`
    WHERE`gym`.`gym_id`='$gymId'";
    $arrayGym = mysqli_fetch_array(mysqli_query($mysqli, $selectGym));
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.gov').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'govId=' + countryID,
                        success: function(html) {
                            $('.city').html(html);
                        }
                    });
                }
            });
        });
    </script>

</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="sticky-top bg-light">
                <tr>
                    <th scope="col">GYMS</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#gym" class="btn btn-success ">Add Gym</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Image</th>
                    <th scope="col ">From</th>
                    <th scope="col ">To</th>
                    <th scope="col ">Type</th>
                    <th scope="col ">Location</th>
                    <th scope="col ">Phone</th>
                    <th scope="col ">City</th>
                    <th scope="col ">Added By</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectGym = "SELECT *FROM ((`gym`
                JOIN`cities`
                ON  `gym`.`gym_city`=`cities`.`cityId`)
                JOIN `admin`
                ON `gym`.`added_admin`=`admin`.`admin_id`)";
                if ($showOnly) {
                    $selectGym .= "WHERE`gym`.`gym_id`='$showGymId'";
                }
                $show = mysqli_query($mysqli, $selectGym);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['gym_id'] ?></th>
                        <td><?php echo $data['gym_name'] ?></td>
                        <td><img src="<?php echo "upload/" . $data['gym_image'] ?>" width="100px" height="100px" alt="">
                        </td>
                        <td><?php echo $data['gym_from'] ?></td>
                        <td><?php echo $data['gym_to'] ?></td>
                        <td><?php echo $data['gym_type'] ?></td>
                        <td><a href="<?php echo $data['gym_location'] ?>"><?php echo $data['gym_location'] ?></a></td>
                        <td><?php echo $data['gym_phone'] ?></td>
                        <td><?php echo $data['city_name_en'] ?></td>
                        <td><?php echo $data['admin_name'] ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="gym.php?update=<?php
                                                                                        echo $data['gym_id'];
                                                                                        if ($showOnly) {
                                                                                            echo "&&showGym=$showGymId";
                                                                                        }
                                                                                        ?>&&#update ">Edit</a></li>
                                    <li><a class="dropdown-item " href="gym.php?delete=<?php echo $data['gym_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="gym" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD GYM</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Gym Name</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="gymName" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" name="gymImage" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">FROM</span>
                                        <input type="time" aria-label="From" name="gymFrom" class="form-control">
                                        <span class="input-group-text">TO</span>
                                        <input type="time" aria-label="to" name="gymTo" class="form-control">
                                    </div>
                                    <!-- radio buttons -->
                                    <!-- <div class="form-check">
                                        <input class="form-check-input my-auto" type="radio" name="gymType" id="flexRadioDefault2" value="mix">
                                        <span class="input-group-text w-auto" id="basic-addon1">Is the gym mix?</span>
                                    </div> -->

                                    <div class="uk-margin">
                                        <span class="input-group-text w-auto" id="basic-addon1">Gym Type</span>
                                        <div class="uk-form-controls uk-form-controls-text">
                                            <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="Mix">Mix</label>
                                            <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="Males Only">Males Only</label>
                                            <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="Females Only">Females Only</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon3">Location</span>
                                        <input type="url" class="form-control" name="gymLocation" id="basic-url" aria-describedby="basic-addon3">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">+20</span>
                                        <input type="number" class="form-control" name="gymPhone" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        <select name="govId" class="form-select gov" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <?php
                                            $select = "SELECT * FROM `governorates`";
                                            $querySelect = mysqli_query($mysqli, $select);
                                            foreach ($querySelect as $rows) {
                                            ?>
                                                <option value="<?php echo $rows['govId'] ?>">
                                                    <?php echo $rows['governorate_name_en'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <select name="cityId" class="form-select city" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addGym" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arrayGym['gym_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Gym Name</span>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo $arrayGym['gym_name']; ?>" aria-label="Username" name="gymName" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/*" name="gymImage" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">FROM</span>
                            <input type="time" aria-label="From" name="gymFrom" class="form-control" value="<?php echo $arrayGym['gym_from']; ?>">
                            <span class="input-group-text">TO</span>
                            <input type="time" aria-label="to" name="gymTo" class="form-control" value="<?php echo $arrayGym['gym_to']; ?>">
                        </div>
                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Is the gym mix?</span>
                            <input class="form-check-input ms-3 my-auto" <?php if ($arrayGym['gym_type'] == "mix") {
                                                                                echo "checked" . "value='mix'";
                                                                            } else {
                                                                            } ?> type="checkbox" name="gymType" value="mix" id="flexCheckDefault">
                            <label class="form-check-label ms-1 my-auto" for="flexCheckDefault">MIX</label>
                        </div> -->
                        <div class="uk-margin">
                            <span class="input-group-text w-auto" id="basic-addon1">Gym Type</span>
                            <div class="uk-form-controls uk-form-controls-text">
                                <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="mix">Mix</label>
                                <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="males">Males</label>
                                <label style="font-size: 20px;"><input class="uk-radio" type="radio" name="type" value="females">females</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Location</span>
                            <input type="url" class="form-control" value="<?php echo $arrayGym['gym_location']; ?>" name="gymLocation" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+20</span>
                            <input type="number" class="form-control" name="gymPhone" value="<?php echo $arrayGym['gym_phone']; ?>" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Selected City:
                                <?php echo $arrayGym['city_name_en']; ?></label>
                            <select name="govId" class="form-select gov" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <?php
                                $select = "SELECT * FROM `governorates`";
                                $querySelect = mysqli_query($mysqli, $select);
                                foreach ($querySelect as $rows) {
                                ?>
                                    <option value="<?php echo $rows['govId'] ?>"><?php echo $rows['governorate_name_en'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <select name="cityId" class="form-select city" id="inputGroupSelect01">
                                <option value="choose   " selected>Choose City</option>
                            </select>
                        </div>
                    </div>
                    <div class="container text-center">
                        <button type="submit" name="updateGym" class="btn btn-primary">Update</button>
                    </div>
                </form>
            <?php } ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js " integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk " crossorigin="anonymous ">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js " integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy " crossorigin="anonymous ">
            </script>
            <script src="js/app.js"></script>
    </div>
    <?php
    if (isset($_POST['updateGym'])) {
        $gymName = $mysqli->real_escape_string($_POST['gymName']);
        if (empty($gymName)) {
            array_push($error, "Gym Name is needed");
        }
        $fileName = $_FILES['gymImage']['name'];
        $tempName = $_FILES['gymImage']['tmp_name'];
        $dir = "upload/";
        $upload = move_uploaded_file($tempName, $dir . $fileName);
        if (empty($upload)) {
            $fileName = $arrayGym['gym_image'];
        }
        $gymFrom = $mysqli->real_escape_string($_POST['gymFrom']);
        if (empty($gymFrom)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymTo = $mysqli->real_escape_string($_POST['gymTo']);
        if (empty($gymTo)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymLocation = $mysqli->real_escape_string($_POST['gymLocation']);
        if (empty($gymLocation)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymType = $mysqli->real_escape_string($_POST['type']);
        if (empty($gymType)) {
            $gymType = "Mix";
        }
        $gymPhone = $mysqli->real_escape_string($_POST['gymPhone']);
        if (empty($gymPhone)) {
            array_push($error, "Gym Phone is needed");
        }
        $gymCityId = $mysqli->real_escape_string($_POST['cityId']);
        if (empty($gymCityId) || $gymCityId = "choose") {
            $gymCityId = $arrayGym['gym_city'];
        }
        foreach ($error as $msg) {
            echo "<h3>$msg</h3><br>";
        }
        if (empty($error)) {
            $updateGym = "UPDATE `gym` SET `gym_name`='$gymName',`gym_image`='$fileName',`gym_to`='$gymTo',`gym_from`='$gymFrom',`gym_type`='$gymType',`gym_location`='$gymLocation',`gym_phone`='$gymPhone',`gym_city`='$gymCityId'WHERE`gym_id`='$gymId'";
            $updateRun = mysqli_query($mysqli, $updateGym);
            if ($updateRun) {
                Alert("Updated", "gym");
                ob_end_flush();
            } else {
                echo "nooooooooo";
            }
        }
    }
    if (isset($_POST['addGym'])) {
        $update = false;
        $gymName = $mysqli->real_escape_string($_POST['gymName']);
        if (empty($gymName)) {
            array_push($error, "Gym Name is needed");
        }
        $fileName = $_FILES['gymImage']['name'];
        $tempName = $_FILES['gymImage']['tmp_name'];
        $dir = "upload/";
        $upload = move_uploaded_file($tempName, $dir . $fileName);
        if (empty($upload)) {
            $fileName = "logo.png";
        }
        $gymFrom = $mysqli->real_escape_string($_POST['gymFrom']);
        if (empty($gymFrom)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymTo = $mysqli->real_escape_string($_POST['gymTo']);
        if (empty($gymTo)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymLocation = $mysqli->real_escape_string($_POST['gymLocation']);
        if (empty($gymLocation)) {
            array_push($error, "Gym Working Hours is needed");
        }
        $gymType = $mysqli->real_escape_string($_POST['type']);
        if (empty($gymType)) {
            $gymType = "Males Only";
        }
        $gymPhone = $mysqli->real_escape_string($_POST['gymPhone']);
        if (empty($gymPhone)) {
            array_push($error, "Gym Phone is needed");
        }
        $gymCityId = $mysqli->real_escape_string($_POST['cityId']);
        if (empty($gymCityId)) {
            array_push($error, "City is needed");
        }
        foreach ($error as $msg) {
            echo "<br>";
        }
        if (empty($error)) {
            $insertGym = "INSERT INTO `gym` VALUES(NULL,'$gymName','$fileName','$gymFrom','$gymTo','$gymType','$gymLocation','$gymPhone','$gymCityId','$adminId')";
            $runInsert = mysqli_query($mysqli, $insertGym);
            Alert("Added", "gym");
        }
    }


    ?>