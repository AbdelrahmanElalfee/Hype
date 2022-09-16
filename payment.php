<?php
$pageName = "Payment";
include "shared/authUser.php";
include "shared/header.php";
$selectLast = "SELECT MAX(`book_id`) AS `last` FROM `book`WHERE`book_user`='$userId'AND `book_tr` IS NOT NULL OR `book_doctor` IS NOT NULL OR `book_gym`IS NOT NULL OR `book_product` ";
$fetchLast = mysqli_fetch_assoc(mysqli_query($mysqli, $selectLast));
$lastId = $fetchLast['last'];
$orderLast = "SELECT * FROM `book` WHERE `book_id`='$lastId' AND `book_user`='$userId' ";
$least = mysqli_fetch_array(mysqli_query($mysqli, $orderLast));
if (isset($_POST['addVisa'])) {
  $updatePayment = "UPDATE `book`SET `payment_method`='VISA - Pending'WHERE`book_id`='$lastId'AND `book_user`='$userId'";
  $runUpdate = mysqli_query($mysqli, $updatePayment);
  if ($runUpdate) {
    header("location:order.php");
  }
}
if (isset($_POST['addCash'])) {
  header("location:order.php");
}
?>
<div class="container col-8  mt-5">
  <ul uk-accordion>
    <li>
      <a class="uk-accordion-title" href="#">Cash on delivery</a>
      <div class="uk-accordion-content">
        <div class="container col-12 text-center mb-5">
          <div class="card">
            <form method="POST">
              <?php if (isset($least['book_product'])) {   ?>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>

                  <label for="floatingInput">Address</label>
                </div>
              <?php } ?>
              <div class="container text-center">
                <button name="addCash" class="btn btn-success btn-rounded mt-2 btn-product">Confirm
                  order</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </li>
    <li class="uk-open">
      <a class="uk-accordion-title active" href="#">Credit card</a>
      <div class="uk-accordion-content">
        <div class="container col-12 text-center d-flex justify-content-center mb-5">
          <div class="card">
            <form method="POST">
              <?php
              if (isset($least['book_product'])) {
              ?>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                  <label for="floatingInput">Address</label>
                </div>
              <?php } ?>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Card Number</label>
              </div>
              <div class="row">
                <div class="col-sm">
                  <div class="form-floating mb-3">
                    <input type="month" class="form-control" id="floatingInput" placeholder="MM/YY" required>
                    <label for="floatingInput">Expiry Date</label>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" maxlength="3" required>
                    <label for="floatingInput">CVV/CVC</label>
                  </div>
                </div>
                <div class="container text-center">
                  <button name="addVisa" class="btn btn-success btn-rounded mt-2 btn-product">Confirm
                    order</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-0 fixed-bottom" style="background-color: #242424;">
  <p class="col-md-4 mb-0 text-muted">Team 17 &copy; 2022 Bis, Helwan University</p>

  <a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <img src="img/hypegym.png" alt="logo" width="60">
  </a>

  <ul class="nav col-md-4 justify-content-end">
    <li class="nav-item"><a href="home.php" class="nav-link px-2 text-muted">Home</a></li>
    <li class="nav-item"><a href="gym.php" class="nav-link px-2 text-muted">Gym</a></li>
    <li class="nav-item"><a href="shop.php" class="nav-link px-2 text-muted">Shop</a></li>
    <li class="nav-item"><a href="trainer.php" class="nav-link px-2 text-muted">Trainners</a></li>
    <li class="nav-item"><a href="nutrition.php" class="nav-link px-2 text-muted">Nutritionists</a></li>
  </ul>
</footer>
<!-- Back to top -->
<a href="#" class="back-to-top" id="back-to-top">
  <i class="fa-solid fa-arrow-up"></i>
</a>
<!-- JQuery CDN -->
<script src="js/jquery-3.6.0.min.js"></script>

<!-- JS Custom  -->
<script src="js/app.js"></script>

<!-- Bootstrap 4 JS CDN -->
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!-- UIKIT JS CDN -->
<script src="js/uikit.min.js"></script>
</body>

</html>