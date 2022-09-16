<?php
include("authAdmin.php");
include "shared/sidebar.php";
$update = false;
$showOnly = false;
if (isset($_GET['showProduct'])) {
    $showOnly = true;
    $showProductId = $_GET['showProduct'];
}
if (isset($_GET['delete'])) {
    $productId = $_GET['delete'];
    $deleteProduct = "DELETE FROM`product`WHERE`product_id`=$productId";
    $runDelete = mysqli_query($mysqli, $deleteProduct);
    if ($runDelete) {
        Alert("Deleted", "product");
    }
}
if (isset($_GET['update'])) {
    $update = true;
    $productId = $_GET['update'];
    $selectProduct = "SELECT * FROM `product` 
JOIN `shop` ON `product`.`product_shop`=`shop`.`shop_id`
WHERE`product`.`product_id`='$productId' ORDER BY `product`.`product_id`ASC";
    $arrayProduct = mysqli_fetch_array(mysqli_query($mysqli, $selectProduct));
    $shopId = $arrayProduct['product_shop'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <table class="table">
            <thead class="sticky-top bg-light">
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-end"><button type="button" data-bs-toggle="modal" data-bs-target="#product" class="btn btn-success ">Add Product</button>
                    </th>
                </tr>
                <tr>
                    <th scope="col ">#</th>
                    <th scope="col ">Name</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">Descripcation</th>
                    <th scope="col ">Quantity</th>
                    <th scope="col ">Image</th>
                    <th scope="col ">Shop</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $selectProduct = "SELECT *FROM `product`
                JOIN`shop`
                ON  `product`.`product_shop`=`shop`.`shop_id`";
                $show = mysqli_query($mysqli, $selectProduct);
                foreach ($show as $data) {
                ?>
                    <tr>
                        <th scope="row "><?php echo $data['product_id'] ?></th>
                        <td><?php echo $data['product_name'] ?></td>
                        <td><?php echo $data['product_price'] ?></td>
                        <td><?php echo $data['product_descripcation'] ?></td>
                        <td><?php echo $data['product_quantity'] ?></td>
                        <td><img src="<?php echo "upload/" . $data['product_image'] ?>" width="100px" height="100px" alt="">
                        </td>
                        <td><?php echo $data['shop_name'] ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTIONS
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="product.php?update=<?php echo $data['product_id']; ?>&&#update">Edit</a></li>
                                    <li><a class="dropdown-item " href="product.php?delete=<?php echo $data['product_id'] ?>">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Product Name</span>
                                        <input type="text" class="form-control" placeholder="Product Name" aria-label="name" name="productName" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" aria-label="Price" name="productPrice" class="form-control">
                                        <span class="input-group-text">Quantity</span>
                                        <input type="number" aria-label="quantity" name="productQuantity" class="form-control">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="productDescripcation" placeholder="leave your comment" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Product Descripcation</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" name="productImage" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Shop</label>
                                        <select name="shopId" class="form-select gov" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <?php
                                            $select = "SELECT * FROM `shop`";
                                            $querySelect = mysqli_query($mysqli, $select);
                                            foreach ($querySelect as $rows) {
                                            ?>
                                                <option value="<?php echo $rows['shop_id'] ?>">
                                                    <?php echo $rows['shop_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addProduct" class="btn btn-primary">Add</button>
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
                <img src="upload/<?php echo $arrayProduct['product_image'] ?>" class="rounded mx-auto d-block " width="200px" height="200px" alt="...">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Product Name</span>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo $arrayProduct['product_name']; ?>" aria-label="Username" name="productName" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" aria-label="Price" name="productPrice" class="form-control" value="<?php echo $arrayProduct['product_price']; ?>">
                            <span class="input-group-text">Quantity</span>
                            <input type="number" aria-label="quantity" name="productQuantity" class="form-control" value="<?php echo $arrayProduct['product_quantity']; ?>">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="productDescripcation" placeholder="leave your comment" id="floatingTextarea"><?php echo $arrayProduct['product_descripcation']; ?></textarea>
                            <label for="floatingTextarea">Product Descripcation</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" accept="image/*" name="productImage" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Selected City:
                            </label>
                            <select name="shopId" class="form-select gov" id="inputGroupSelect01">
                                <option value="<?php echo $arrayProduct['product_shop'] ?>" selected><?php echo $arrayProduct['shop_name'] ?></option>
                                <?php
                                $select = "SELECT * FROM `shop`EXCEPT SELECT * FROM `shop`WHERE `shop_id`=$shopId";
                                $querySelect = mysqli_query($mysqli, $select);
                                foreach ($querySelect as $rows) {
                                ?>
                                    <option value="<?php echo $rows['shop_id'] ?>"><?php echo $rows['shop_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-grid col-12 mx-auto">
                        <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
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
if (isset($_POST['updateProduct'])) {
    $productName = $mysqli->real_escape_string($_POST['productName']);
    if (empty($productName)) {
        array_push($error, "Product Name is needed");
    }
    $fileName = $_FILES['productImage']['name'];
    $tempName = $_FILES['productImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = $arrayProduct['product_image'];
    }
    $productPrice = $mysqli->real_escape_string($_POST['productPrice']);
    if (empty($productPrice)) {
        array_push($error, "Product Price is needed");
    }
    $productQuantity = $mysqli->real_escape_string($_POST['productQuantity']);
    if (empty($productQuantity)) {
        array_push($error, "Product Quantity is needed");
    }
    $productDescripcation = $mysqli->real_escape_string($_POST['productDescripcation']);
    if (empty($productDescripcation)) {
        array_push($error, "Product Descripcation Hours is needed");
    }
    $productShopId = $mysqli->real_escape_string($_POST['shopId']);
    foreach ($error as $msg) {
        echo "<h3>$msg</h3><br>";
    }
    if (empty($error)) {
        $updateProduct = "UPDATE `product` SET `product_name`='$productName',`product_image`='$fileName',`product_quantity`='$productQuantity',`product_price`='$productPrice',`product_descripcation`='$productDescripcation',`product_shop`='$productShopId'WHERE`product_id`='$productId'";
        $updateRun = mysqli_query($mysqli, $updateProduct);
        if ($updateRun) {
            Alert("Updated", "product");
            ob_end_flush();
        } else {
            echo "nooooooooo";
        }
    }
}
if (isset($_POST['addProduct'])) {
    $update = false;
    $productName = $mysqli->real_escape_string($_POST['productName']);
    if (empty($productName)) {
        array_push($error, "Product Name is needed");
    }
    $fileName = $_FILES['productImage']['name'];
    $tempName = $_FILES['productImage']['tmp_name'];
    $dir = "upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        array_push($error, "Product Image is needed");
    }
    $productPrice = $mysqli->real_escape_string($_POST['productPrice']);
    if (empty($productPrice)) {
        array_push($error, "Product price is needed");
    }
    $productQuantity = $mysqli->real_escape_string($_POST['productQuantity']);
    if (empty($productQuantity)) {
        array_push($error, "Product Quantity is needed");
    }
    $productDescripcation = $mysqli->real_escape_string($_POST['productDescripcation']);
    if (empty($productDescripcation)) {
        array_push($error, "Product Descripcation is needed");
    }
    $productShopId = $mysqli->real_escape_string($_POST['shopId']);
    if (empty($productShopId)) {
        array_push($error, "Shop is needed");
    }
    foreach ($error as $msg) {
        echo "<br>";
    }
    if (empty($error)) {
        $insertProduct = "INSERT INTO `product` VALUES(NULL,'$productName','$productPrice','$productDescripcation','$productQuantity','$fileName','$productShopId')";
        $runInsert = mysqli_query($mysqli, $insertProduct);
        if ($runInsert) {
            Alert("Added", "product");
            // header("refresh:2;url=product.php");
        }
    }
}


?>