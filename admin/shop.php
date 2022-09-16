<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
if (isset($_GET['delete'])) {
    $shopId = $_GET['delete'];
    $deleteshop = "DELETE FROM`shop`WHERE`shop_id`=$shopId";
    $runDelete = mysqli_query($mysqli, $deleteshop);
    if ($runDelete) {
        Alert("Deleted", "shop");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $shopId = $_GET['update'];
    $selectshop = "SELECT * FROM `shop` 
    WHERE`shop_id`='$shopId'";
    $arrayshop = mysqli_fetch_array(mysqli_query($mysqli, $selectshop));
    $gymId = $arrayshop['shop_id'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="sticky-top bg-light">
                <tr>
                    <th scope="col">Shops</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#shop" class="btn btn-success ">Add shop</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Image</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectshop = "SELECT * FROM `shop`";
                $show = mysqli_query($mysqli, $selectshop);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['shop_id'] ?></th>
                        <td><?php echo $data['shop_name'] ?></td>
                        <td><img src="upload/<?php echo $data['shop_image'] ?>" alt="" width="100px" height="100px"></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="shop.php?update=<?php echo $data['shop_id'] ?>&&#update ">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item " href="shop.php?delete=<?php echo $data['shop_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="shop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD shop</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Shop Name</span>
                                        <input type="text" class="form-control" name="shopName" placeholder="Shop Name" aria-label="Shop Name" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" name="shopImage" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addshop" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arrayshop['shop_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">shop Name</span>
                            <input type="text" class="form-control" placeholder="Duration" value="<?php echo $arrayshop['shop_name']; ?>" aria-label="Duration" name="shopName" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/*" name="shopImage" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer d-grid col-12 mx-auto">
                        <button type="submit" name="updateshop" class="btn btn-primary">Update</button>
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
if (isset($_POST['updateshop'])) {
    $shopName = $mysqli->real_escape_string($_POST['shopName']);
    if (empty($shopName)) {
        array_push($error, "shop Name is needed");
    }
    $fileName = $_FILES['shopImage']['name'];
    $tempName = $_FILES['shopImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = $arrayshop['shop_image'];
    }
    foreach ($error as $msg) {
        echo "<h3>$msg</h3><br>";
    }
    if (empty($error)) {
        $updateshop = "UPDATE `shop` SET `shop_name`='$shopName',`shop_image`='$fileName'WHERE`shop_id`='$shopId'";
        $updateRun = mysqli_query($mysqli, $updateshop);
        if ($updateRun) {
            Alert("Updated", "shop");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addshop'])) {
    $update = false;
    $shopName = $mysqli->real_escape_string($_POST['shopName']);
    if (empty($shopName)) {
        array_push($error, "shop Name is needed");
    }
    $fileName = $_FILES['shopImage']['name'];
    $tempName = $_FILES['shopImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    foreach ($error as $msg) {
        echo "<br>";
    }
    if (empty($error)) {
        $insertshop = "INSERT INTO `shop` VALUES(NULL,'$shopName','$fileName')";
        $runInsert = mysqli_query($mysqli, $insertshop);
        if ($runInsert) {
            Alert("added", "shop");
        } else {
            echo "nooooooooooo";
        }
    }
}

?>