<?php
include "shared/authUser.php";
if (isset($_GET['nutrition'])) {
  $nutId = $_GET['nutrition'];
  $selectDoc = "SELECT*FROM`doctor`WHERE`doctor_id`='$nutId'";
  $fetchDoc = mysqli_fetch_array(mysqli_query($mysqli, $selectDoc));
  $accounts = explode(",", $fetchDoc['doctor_account']);
  $accLength = count($accounts);
  $pageName = "Nutritionst";
  $personName = $fetchDoc['doctor_name'];
  $personImage = $fetchDoc['doctor_image'];
  $personDesc = $fetchDoc['doctor_experience'];
}
if (isset($_GET['trainer'])) {
  $trId = $_GET['trainer'];
  $selectTr = "SELECT*FROM`trainner`WHERE`trainner_id`='$trId'";
  $fetchTr = mysqli_fetch_array(mysqli_query($mysqli, $selectTr));
  $accounts = explode(",", $fetchTr['tr_account']);
  $accLength = count($accounts);
  $pageName = "Trainer";
  $personName = $fetchTr['trainner_name'];
  $personImage = $fetchTr['trainner_image'];
  $personDesc = $fetchTr['trainner_experience'];
}
include "shared/header.php";
?>

<head>
  <link rel="stylesheet" href="css/person.css">
</head>

<body>
  <div class="container d-flex justify-content-center mb-4">
    <div class="card text-center">
      <img src="admin/upload/<?php echo $personImage; ?>" class="card__image" alt="brown couch" />
      <div class="card__content">
        <h3 class="person_name"><?php echo $personName; ?></h3>
        <span class="card__title"><?php echo $personDesc; ?><span>
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
            <form method="post" class="container text-center mt-5">
              <?php if (isset($nutId)) { ?>
                <button name="addDoc" type="submit" class="btn btn-success btn-rounded mt-2 btn-product">Subscribe</button>
              <?php } elseif ($trId) { ?>
                <button name="addTr" type="submit" class="btn btn-success btn-rounded mt-2 btn-product">Subscribe</button>
              <?php } ?>
            </form>
      </div>
    </div>
  </div>
</body>
<?php
$date = date("y-m-d");
if (isset($_POST['addDoc'])) {
  $price = $fetchDoc['doctor_price'];
  $insertBook = "INSERT INTO `book`(`book_id`, `book_total`, `book_user`, `book_doctor`, `sub_time`,`payment_method`) 
                          VALUES (NULL,'$price','$userId','$nutId','$date','Cash - Pending')";
  $runBook = mysqli_query($mysqli, $insertBook);
  if ($runBook) {
    $_SESSION['Mail'] = $fetchDoc['doctor_email'];
    header('location:order.php');
  }
}
if (isset($_POST['addTr'])) {
  $price = $fetchTr['trainner_price'];
  $insertBook = "INSERT INTO `book`(`book_id`, `book_total`, `book_user`, `book_tr`, `sub_time`,`payment_method`) 
                          VALUES (NULL,'$price','$userId','$trId','$date','Cash - Pending')";
  $runBook = mysqli_query($mysqli, $insertBook);
  if ($runBook) {
    $_SESSION['Mail'] = $fetchTr['trainner_email'];
    header('location:order.php');
  }
}
include "shared/footer.php";
?>