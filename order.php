<?php
$pageName = "Order";
include "shared/authUser.php";
include "shared/header.php";
$selectLast = "SELECT MAX(`book_id`) AS `last` FROM `book`WHERE`book_user`='$userId'AND `book_tr` IS NOT NULL OR `book_doctor` IS NOT NULL OR `book_gym`IS NOT NULL OR `book_product` ";
$fetchLast = mysqli_fetch_assoc(mysqli_query($mysqli, $selectLast));
$lastId = $fetchLast['last'];
$orderLast = "SELECT * FROM `book` WHERE `book_id`='$lastId' AND `book_user`='$userId' ";
$least = mysqli_fetch_array(mysqli_query($mysqli, $orderLast));
if (isset($least['book_tr'])) {
  $person = "trainner";
} elseif (isset($least['book_doctor'])) {
  $person = "doctor";
} elseif (isset($least['book_gym'])) {
  $person = "gym";
} elseif (isset($least['book_product'])) {
  $person = "product";
}
?>
<div class="container mt-5 d-flex justify-content-center">
  <div class="card p-4 mt-3 order_card">
    <div class="first d-flex justify-content-between align-items-center mb-3">
      <div class="info">
        <span class="d-block name">Thank you, <?php echo $fetchUser['user_name'] ?></span>
        <span class="order">Order - <?php echo $lastId ?>
        </span>
      </div>
      <img src="https://i.imgur.com/NiAVkEw.png" width="40" />
    </div>
    <div class="detail">
      <?php if (isset($_SESSION['Mail'])) { ?>
        <span class="d-block summery">Your Subscribation has added.You Can message with <?php echo $_SESSION['Mail'] ?></span>
      <?php } else { ?>
        <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
    </div>
    <hr>
    <div class="text row">
      <div class="col-sm text-left"><span>Total:</span></div>
      <div class="col-sm text-right">
        <p><?php echo $least['book_total'] ?>.00 EGP</p>
      </div>
    </div>
    <span class="d-block address mb-3">672 Conaway Street Bryantiville Massachusetts 02327</span>
    <div class="  money d-flex flex-row mt-2 align-items-center">
      <img src="https://i.imgur.com/ppwgjMU.png" width="20" />
      <span class="ml-2">Cash on Delivery</span>
    </div>
  <?php } ?>
  <div class="last align-items-center mt-3 text-center">
    <a href="orderView.php?view=<?php echo $lastId . "&&type=$person" ?>" class="btn btn-outline-white btn-rounded">View Order</a>
    <a href="home.php" class="btn btn-outline-white btn-rounded mt-2">Home Pages</a>
  </div>
  </div>
</div>