<?php
$pageName = "Profile";
include "shared/authUser.php";
// include "shared/header.php";

$selectUser = "SELECT * FROM`user`
JOIN`cities`
ON`user_city`=`cityId`
JOIN`governorates`
ON`cities`.`governorate_id`=`governorates`.`govId`
JOIN `book`
ON`user_id`=`book_user`
WHERE`user_id`='$userId'";
$dataUser = mysqli_fetch_assoc(mysqli_query($mysqli, $selectUser));
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/hypegym.png" type="image/x-icon">

    <!-- Bootstrap 4 CDN CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- Bootstrap 5 CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5eb17c08cd.js" crossorigin="anonymous"></script>

    <!-- BoxIcons CDN CSS -->
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' />

    <!-- UIKIT CSS -->
    <link rel="stylesheet" href="css/uikit.min.css">

    <!-- Page Title -->
    <title>Hype Gym | <?php echo $pageName; ?></title>
    <!-- script  -->

</head>
<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky">
    <div class="container">
        <div>
            <a class="navbar-brand logo text-uppercase" href="index.php">
                <img src="img/hypegym.png " width="70" height="50" alt="logo">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gym.php">Gym</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trainer.php">Trainers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nutrition.php">Nutritionists</a>
                </li>
            </ul>
            <div>
                <!-- Mansour dol session lw logged in wla l2 -->
                <!-- <div class="text-right pl-5 mb-0 nav-button">
          <a href="registration.php" class="nav-btn btn btn-outline-white btn-rounded btn-custom">Get Started</a>
        </div> -->
                <div class="text-right pl-5 mb-0">
                    <ul class="uk-iconnav">
                        <li><a href="profile.php" style="font-size: 24px;"><span><i class='bx bx-user-circle'
                                        style='color:#b2e000;'></i></span></a></li>
                        <li><a href="cart.php""><span style=" font-size: 24px;"><i class='bx bxs-cart-alt'
                                    style='color:#b2e000'></i></span>(<?php echo $rowCart ?>)</a></li>
                        <li><a href="shared/logout.php"><span style=" font-size: 24px;"><i class='bx bx-exit'
                                        style='color:#b2e000'></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<section class="section" id="profile" style="background-color: #2CB67D !important;">
    <div class="bg-gradiant-overlay"></div>
    <div class="container">
        <div class="row d-flex justify-content-center text-center mt-5 img_container">
            <form method="POST">
                <div class="js-upload" uk-form-custom>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" id="file" />
                    </form>
                    <img src="img/<?php echo $dataUser['user_img'] ?>" class="profile_pic" alt="profile picture">
                </div>
                <div class="edit">
                    <div class="js-upload" uk-form-custom>
                        <input type="file" name="sd" id="ds">
                        <a href="#"><i class='bx bx-edit-alt' style='color:#b2e000; font-size: 28px;'></i></a>
                    </div>
                </div>
            </form>
            <div class="container text-center">
                <h3> <?php echo $dataUser['user_name'] ?> </h3>
                <p style="font-size: 12px; color: #f9f9f9 ;">
                    <span><?php echo $dataUser['city_name_en'] . "," . $dataUser['governorate_name_en']  ?>,
                        Egypt</span>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="container profile_details">
    <div class="uk-margin-medium-top">
        <ul class="uk-flex-center" uk-tab>
            <li class="uk-active"><a href="#">Details</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Gym</a></li>
            <li><a href="#">Subscribed</a></li>
        </ul>
        <ul class="uk-switcher uk-margin">
            <li>
                <div class="container">
                    <dl class="uk-description-list">
                        <dt>EMAIL ADDRESS</dt>
                        <dd><?php echo $dataUser['user_mail'] ?></dd>
                        <dt>ADDRESS</dt>
                        <dd><?php if (isset($dataUser['user_address'])) {
                  echo $dataUser['user_address'];
                } else {
                  echo "NO ADDRESS ADDED YET";
                } ?></dd>
                        <dt>Phone Number</dt>
                        <dd><?php echo $dataUser['user_phone'] ?></dd>
                    </dl>
                </div>
                <div class="container text-center">
                    <a href="#modal-example" uk-toggle style="color: #b2e000;"
                        class="btn btn-outline-white btn-rounded"><span>Edit Details</span></a>
                    <div id="modal-example" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="container text-center">
                                <img src="img/hypegym.png" alt="" width="100px">
                            </div>
                            <form method="POST">
                                <div class="form-floating mt-4">
                                    <input type="email" class="form-control" name="newEmail" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">EMAIL ADDRESS</label>
                                </div>
                                <div class="form-floating mt-4">
                                    <input type="text" class="form-control" name="newPassword" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">ADDRESS</label>
                                </div>
                                <div class="form-floating mt-4">
                                    <input type="tel" class="form-control" id="floatingPassword" name="newPhone"
                                        placeholder="Password">
                                    <label for="floatingPassword">Phone Number</label>
                                </div>
                                <div class="container text-center mt-4">
                                    <button name="add" class="btn btn-success btn-rounded btn-product"
                                        type="submit">Save Details</button>
                                </div>
                            </form>
                            <?php
              if (isset($_POST['add'])) {
                $email = $mysqli->real_escape_string($_POST['newEmail']);
                $address = $mysqli->real_escape_string($_POST['newPassword']);
                $phone = $mysqli->real_escape_string($_POST['newPhone']);
                $update = "UPDATE `user` SET `user_mail`='$email',`user_address`='$address',`user_phone`='$phone'WHERE`user_id`='$userId'";
                $runUpdate = mysqli_query($mysqli, $update);
                if ($runUpdate) {
                  $_SESSION['uMail'] = $email;
                  header("location:profile.php");
                }
              }
              ?>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <?php
          $selectOrder = "SELECT *FROM`book`WHERE`book_user`='$userId'AND `book_product`IS NOT NULL";
          $runBook = mysqli_query($mysqli, $selectOrder);
          ?>
                    <table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($runBook as $data) { ?>
                            <tr>
                                <td><a
                                        href="orderView.php?type=product&view=<?php echo $data['book_id'] ?>">#<?php echo $data['book_id'] ?></a>
                                </td>
                                <td><?php echo $data['book_total'] ?> EGP</td>
                                <td><?php echo $data['payment_method'] ?></td>
                                <td><?php echo $data['sub_time'] ?></td>
                                <td style="color: green;">Approved</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <div class="container">
                    <table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th>Gym Name</th>
                                <th>Period</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              $selectOrder = "SELECT * FROM `book`
              JOIN`gym`
              ON `book_gym`=`gym_id`
              JOIN`bundle`
              ON`book_bundle`=`bundle_id`
              WHERE`book_user`='$userId' AND `book_gym` IS NOT NULL";
              $runOrder = mysqli_query($mysqli, $selectOrder);
              foreach ($runOrder as $data) {
              ?>
                            <tr>
                                <td><a
                                        href="gymShow.php?showGym=<?php echo $data['book_gym'] ?>"><?php echo $data['gym_name'] ?></a>
                                </td>
                                <td><?php echo $data['bundle_duration'] ?></td>
                                <td><?php echo $data['bundle_price'] ?> EGP</td>
                                <?php
                  $time = $data['sub_time'];
                  $diff = time() - strtotime($time);
                  $diffMin = round($diff / (60 * 60 * 24)) - 3;
                  $bundleDuration = $data['bundle_duration'];
                  if ($bundleDuration == "full year") {
                    $diffMonth = 12;
                  } elseif ($bundleDuration == "half year") {
                    $diffMonth = 6;
                  } elseif ($bundleDuration == "three month") {
                    $diffMonth = 3;
                  } elseif ($bundleDuration == "one month") {
                    $diffMonth = 1;
                  }
                  if ($diffMin < ($diffMonth * 30)) {
                  ?>
                                <td style="color: green;"><?php echo ($diffMonth * 30) - ($diffMin)  ?> Days remaining
                                </td>
                                <?php
                  } else {
                  ?>
                                <td style="color: red;">Ended</td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <div class="container">
                    <table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Period</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              $selectTr = "SELECT * FROM `book`
                            JOIN`trainner`
                            ON `book_tr`=`trainner_id`
                            WHERE`book_user`='$userId' AND `book_tr` IS NOT NULL ";
              $selectDr = "SELECT * FROM `book`
                            JOIN`doctor`
                            ON`book_doctor`=`doctor_id`
                            WHERE`book_user`='$userId' AND `book_doctor` IS NOT NULL";
              $runTr = mysqli_query($mysqli, $selectTr);
              $runDr = mysqli_query($mysqli, $selectDr);
              // echo date();
              foreach ($runDr as $data) {
              ?>
                            <tr>
                                <td><a
                                        href="personView.php?nutrition=<?php echo $data['book_doctor'] ?>"><?php echo $data['doctor_name'] ?></a>
                                </td>
                                <td>Doctor</td>
                                <td>1 Month</td>
                                <td><?php echo $data['doctor_price'] ?></td>
                                <?php
                  $time = $data['sub_time'];
                  $diff = time() - strtotime($time);
                  $diffMin = date("m", $diff);
                  if ($diffMin <= 1) {
                  ?>
                                <td style="color: green;">Currently</td>
                                <?php } else { ?>
                                <td style="color: red;">Ended</td>
                                <?php } ?>
                            </tr>
                            <?php }
              foreach ($runTr as $data) { ?>
                            <tr>
                                <td><a
                                        href="personView.php?trainer=<?php echo $data['book_tr'] ?>"><?php echo $data['trainner_name'] ?></a>
                                </td>
                                <td>Trainer</td>
                                <td>1 Month</td>
                                <td><?php echo $data['trainner_price'] ?></td>
                                <?php
                  $time = $data['sub_time'];
                  $diff = time() - strtotime($time);
                  $diffMin = date("m", $diff);
                  if ($diffMin <= 1) {
                  ?>
                                <td style="color: green;">Currently</td>
                                <?php } else { ?>
                                <td style="color: red;">Ended</td>
                                <?php } ?>
                            </tr>
                            <?php }   ?>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('change', '#file', function() {
        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image File");
        } else {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);
            var f = document.getElementById("file").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('file').files[0]);
                $.ajax({
                    url: "upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#uploaded_image').html(
                            "<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function(data) {
                        window.location.href = "http://localhost/hype/hypeGym/profile.php";
                    }
                });
            }
        }
    });
});
</script>
<?php
include "shared/footer.php";
?>