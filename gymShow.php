<?php
$pageName = "GymShow";
include "shared/authUser.php";
include "shared/header.php";
if (isset($_GET['showGym'])) {
  $gymId = $_GET['showGym'];
  $selectGym = "SELECT * FROM`gym`
  JOIN`bundle`
  ON`gym_id`=`bundle_gym`
  WHERE`gym_id`='$gymId'";
  $runGym = mysqli_query($mysqli, $selectGym);
  $dataGym = mysqli_fetch_array($runGym);
}
?>
<div class="main section">
  <div class="container col-10">
    <div class="row">
      <div class="col-sm product_img">
        <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1" uk-slider="center: true">
          <ul class="uk-slider-items uk-grid uk-grid-match" uk-height-viewport="offset-top: true; offset-bottom: 30">
            <li class="uk-width-3-4">
              <div class="uk-cover-container">
                <img src="img/<?php echo $dataGym['gym_image'] ?>" alt="" uk-cover>
              </div>
            </li>
            <li class="uk-width-3-4">
              <div class="uk-cover-container">
                <img src="img/formbg.jpg" alt="" uk-cover>
              </div>
            </li>
            <li class="uk-width-3-4">
              <div class="uk-cover-container">
                <img src="img/formbg.jpg" alt="" uk-cover>
              </div>
            </li>
            <li class="uk-width-3-4">
              <div class="uk-cover-container">
                <img src="img/formbg.jpg" alt="" uk-cover>
              </div>
            </li>
            <li class="uk-width-3-4">
              <div class="uk-cover-container">
                <img src="img/formbg.jpg" alt="" uk-cover>
              </div>
            </li>
          </ul>

          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>
      </div>
      <div class="col-sm justify-content-center m-auto">
        <div class="product_details">
          <h2><?php echo $dataGym['gym_name'] ?></h2>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque tenetur quod quisquam
            amet saepe numquam ab, asperiores a eveniet iure, iusto incidunt hic accusamus placeat
            mollitia animi exercitationem fuga assumenda?</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-10 mt-3">
    <div class="container col-12">
      <h2 class="font-weight-bold">Nutritionists </h2>
    </div>
    <div class="row pb-5">
      <?php
      $selectDoctor = "SELECT*FROM`doctor`WHERE`doctor_gym`='$gymId'";
      $runDoctor = mysqli_query($mysqli, $selectDoctor);
      foreach ($runDoctor as $data) {
        $accounts = explode(",", $data['doctor_account']);
        $accLength = count($accounts);
      ?>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <!-- Card-->
          <div class="card shadow-sm border-0 rounded">
            <div class="card-body p-0 text-center"><img src="img/<?php echo $data['doctor_image'] ?>" style="height: 40vh;" alt="" class="w-100 card-img-top">
              <div class="p-4">
                <h5 class="mb-0"><?php echo $data['doctor_name']; ?></h5>
                <p class="small text-muted"><?php echo $data['doctor_experience']; ?></p>
                <ul class="social mb-0 list-inline mt-3">
                  <?php
                  for ($i = 0; $i < $accLength; $i++) {
                    if (str_contains($accounts[$i], 'https://www.instagram.com/')) {
                  ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <?php }
                    if (str_contains($accounts[$i], 'https://www.facebook.com/')) {
                    ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <?php
                    }
                    if (str_contains($accounts[$i], 'https://twitter.com/')) {
                    ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <?php }
                    if (str_contains($accounts[$i], 'https://www.linkedin.com/')) { ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                  <?php }
                  } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="container col-10 mt-3">
      <h2 class="font-weight-bold">Trainers</h2>
    </div>
    <div class="row pb-5">
      <?php
      $selectTrainner = "SELECT*FROM`trainner`WHERE`trainner_gym`='$gymId'";
      $runTrainner = mysqli_query($mysqli, $selectTrainner);
      foreach ($runTrainner as $data) {
        $accounts = explode(",", $data['tr_account']);
        $accLength = count($accounts);
      ?>
        <div class="col-lg-auto col-md-auto mb-4 mb-lg-0">
          <!-- Card-->
          <div class="card shadow-sm border-0 rounded">
            <div class="card-body p-0 text-center"><img src="img/<?php echo $data['trainner_image'] ?>" style="height: 40vh;" alt="" class="w-100 card-img-top">
              <div class="p-4">
                <h5 class="mb-0"><?php echo $data['trainner_name']; ?></h5>
                <p class="small text-muted"><?php echo $data['trainner_experience']; ?></p>
                <ul class="social mb-0 list-inline mt-3">
                  <?php
                  for ($i = 0; $i < $accLength; $i++) {
                    if (str_contains($accounts[$i], 'https://www.instagram.com/')) {
                  ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <?php }
                    if (str_contains($accounts[$i], 'https://www.facebook.com/')) {
                    ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <?php
                    }
                    if (str_contains($accounts[$i], 'https://twitter.com/')) {
                    ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <?php }
                    if (str_contains($accounts[$i], 'https://www.linkedin.com/')) { ?>
                      <li class="list-inline-item m-0"><a href="<?php echo $accounts[$i] ?>" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                  <?php }
                  } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="container">
      <?php
      $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ];
      ?>
      <div class="row">
        <div class="col-md-12">
          <h4 class="text-center mb-4">Class Schedule Table</h4>
          <div class="table-wrap">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <?php foreach ($days as $week) { ?>
                    <th><?php echo $week ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $selectClass = "SELECT * FROM `class` WHERE`class_gym`='$gymId' ORDER BY `class_days`ASC";
                $runClass = mysqli_query($mysqli, $selectClass);
                foreach ($runClass as $data) {
                ?>
                  <tr>
                    <?php for ($i = 0; $i < 7; $i++) { ?>
                      <td>
                        <?php if (str_contains($data["class_days"], "$days[$i]")) {  ?>
                          <a href="class.php?class=<?php echo $data['class_id'] ?>" class="class-name"><strong><?php echo $data['class_name'] ?></strong> <br>
                            <?php echo $data['class_time'] ?> PM</a>
                        <?php
                        } else {
                        ?>
                          <i class="fa fa-close">
                          </i>
                        <?php
                        }
                        ?>
                      </td>
                    <?php } ?>

                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container col-12 mt-5">
      <div class="row container text-center">
        <div class="col-sm-4">
          <div class="card">
            <img src="img/plans.svg" class="card-img-top" alt="..." style="width: 100%;">
            <div class="card-body">
              <div class="container col-10 text-center">
                <form method="POST">
                  <div class="form-floating">

                    <select class="form-select" id="floatingSelect" name="bundleId" aria-label="Floating label select example">
                      <?php foreach ($runGym as $data) { ?>
                        <option value="<?php echo $data['bundle_id'] ?>">
                          <?php echo $data['bundle_duration'] . "-" . $data['bundle_price'] ?> EGP
                        </option>
                      <?php } ?>
                    </select>
                    <label for="floatingSelect">Bundle</label>
                  </div>
                  <?php
                  $selectCheck = "SELECT * FROM `book` WHERE `book_user`='$userId' AND `book_gym` IS NOT NULL";
                  $runCheck = mysqli_query($mysqli, $selectCheck);
                  $fetchCheck = mysqli_fetch_array($runCheck);
                  $time = $fetchCheck['sub_time'];
                  $diff = time() - strtotime($time);
                  $diffMin = round($diff / (60 * 60 * 24 ))-3;
                  $bundleDuration=$data['bundle_duration'];
                  if($bundleDuration=="full year"){
                    $diffMonth=12;
                  }elseif($bundleDuration=="half year"){
                    $diffMonth=6;
                  }elseif($bundleDuration=="three month"){
                    $diffMonth=3;
                  }elseif($bundleDuration=="one month"){
                    $diffMonth=1;
                  }
                  if ($diffMin < ($diffMonth* 30)) {
                    ?>
                    <button name="add" type="submit" class="btn btn-success btn-rounded mt-2 btn-product">Subscribe</button>
                    <?php }else{?>
                      <button class="btn btn-success btn-rounded mt-2 btn-product"disabled>You have already Subscribed</button>
                    <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8 mt-0">
          <div class="mapouter container">
            <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=cairo,%20Egypt&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 500px;
                  width: 600px;
                }
              </style><a href="https://www.embedgooglemap.net">google maps for websites</a>
              <style>
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 500px;
                  width: 600px;
                }
              </style>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<?php
if (isset($_POST['add'])) {
  $bundleId = $_POST['bundleId'];
  $selectPrice = "SELECT`bundle_price`FROM`bundle`WHERE`bundle_id`='$bundleId'";
  $price = mysqli_fetch_array(mysqli_query($mysqli, $selectPrice));
  $bundlePrice = $price["bundle_price"];
  $date = date("y-m-d");
  $insertBook = "INSERT INTO`book`(`book_id`, `book_total`, `book_user`, `book_gym`, `book_bundle`,`sub_time`,`payment_method`) 
                        VALUES (NULL,'$bundlePrice','$userId','$gymId','$bundleId','$date','Cash - Pending')";
  $runBook = mysqli_query($mysqli, $insertBook);
  if ($runBook) {
    $_SESSION["Mail"] = "+20" . $dataGym['gym_phone'];
    $_SESSION["type"] = "GYM";
    header("location:payment.php");
  }
}
include "shared/footer.php";
?>