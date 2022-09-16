<?php
include "shared/authUser.php";
$pageName = "";
include "shared/header.php";
if (isset($_GET['product'])) {
  $productId = $_GET['product'];
  $selectProduct = "SELECT*FROM`product`WHERE`product_id`='$productId'";
  $runProduct = mysqli_query($mysqli, $selectProduct);
  $fetchProduct = mysqli_fetch_array($runProduct);
}
?>
<div class="main section">
  <div class="container col-10">
    <div class="row">
      <div class="col-sm product_img">
        <div class="uk-child-width-1-1@m" uk-grid uk-lightbox="animation: slide">
          <div>
            <a class="uk-inline" href="img/<?php echo $fetchProduct['product_image']; ?>" data-caption="img/<?php echo $fetchProduct['product_name']; ?>">
              <img src="admin/upload/<?php echo $fetchProduct['product_image']; ?>" width="1800" height="1200" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="product_details">
          <h2 style="font-size: 24px;" class="mb-3"><?php echo $fetchProduct['product_name']; ?></h2>
          <p><?php echo $fetchProduct['product_descripcation']; ?></p>
          <div class="container mt-4 text-center">
            <p style="font-size: 24px;"><?php echo $fetchProduct['product_price']; ?> EGP</p>
          </div>
        </div>
        <form method="post" class="container text-center">
          <p class="mb-2">Quantity</p>
          <div class="qty-input">
            <button class="qty-count qty-count--minus text-center" data-action="minus" type="button">-</button>
            <input class="product-qty" type="number" name="product-qty" min="1" max="<?php echo $fetchProduct['product_quantity'] ?>" value="1">
            <button class="qty-count qty-count--add text-center" data-action="add" type="button">+</button>
          </div>
          <div class="container text-center mt-4">
            <?php if ($fetchProduct['product_quantity'] > 0) {  ?>
              <button type="submit" name="add" class="btn btn-success btn-rounded mt-2 btn-product">Add to cart</button>
            <?php } else { ?>
              <button disabled class="btn btn-success btn-rounded mt-2 btn-product">NOT AVALIABLE</button>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
</div>

<?php
if (isset($_POST['add'])) {
  $quantity = $_POST['product-qty'];
  $selectProduct = "SELECT * FROM `cart`WHERE`cart_product`='$productId'AND`cart_user`='$userId'";
  $runSelectProduct = mysqli_query($mysqli, $selectProduct);
  $noSelectProduct = mysqli_num_rows($runSelectProduct);
  $fetchProduct = mysqli_fetch_array($runSelectProduct);
  if ($noSelectProduct == 0) {
    $insertProduct = "INSERT INTO`cart`VALUES('$userId','$productId','$quantity')";
    $runInsert = mysqli_query($mysqli, $insertProduct);
    if ($runInsert) {
      header('location:cart.php');
    }
  } else {
    $cartId = $fetchProduct['cart_product'];
    $qty = $fetchProduct['cart_product_quantity'];
    $finalqty = $qty + $quantity;
    $updateProduct = "UPDATE`cart`SET`cart_product_quantity`='$finalqty'WHERE`cart_product`='$cartId'";
    $runUpdate = mysqli_query($mysqli, $updateProduct);
    if ($runUpdate) {
      header('location:cart.php');
    }
  }
}
include "shared/footer.php";
?>