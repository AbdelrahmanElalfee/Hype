<?php
$pageName = "Cart";
$userId = 2;
include "shared/header.php";

?>

<head>

</head>
<div class="contnainer col-12 mt-5">
  <div class="row">
    <div class="col-8">
      <table class="uk-table uk-table-middle uk-table-divider">
        <thead>
          <tr>
            <th class="uk-width-small">Product</th>
            <th></th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="admin/upload/p3.png" alt=""></td>
            <td>
              <h4 class="mb-0">ALLMAX LIQUID L-CARNITINE</h4>
              <p class="mt-0">WEIGHT LOSS</p>
            </td>
            <td>650 EGP</td>
            <td>
              <div class="qty-input">
                <button class="qty-count qty-count--minus text-center" data-action="minus" type="button">-</button>
                <input class="product-qty" type="number" name="product-qty" min="1" max="10" value="2">
                <button class="qty-count qty-count--add text-center" data-action="add" type="button">+</button>
              </div>
            </td>
            <td>1300 EGP</td>
            <td><button type="button" uk-close></button></td>
          </tr>
          <tr>
            <td><img src="admin/upload/p2.jpeg" alt=""></td>
            <td>
              <h4 class="mb-0">Commandos Weight Gainer Triple Chocolate 3 kg</h4>
              <p class="mt-0">WEIGHT GAINING</p>
            </td>
            <td>600 EGP</td>
            <td>
              <div class="qty-input">
                <button class="qty-count qty-count--minus text-center" data-action="minus" type="button">-</button>
                <input type="number" class="product-qty" type="number" name="product-qty" min="1" max="10" value="2">
                <button class="qty-count qty-count--add text-center" data-action="add" type="button">+</button>
              </div>
            </td>
            <td>1800 EGP</td>
            <td><button type="button" uk-close></button></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-4">
      <div class="uk-card order-summary">
        <div class="uk-card-header border-b order-summary-header">
          <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
              <h3 class="uk-text-meta uk-margin-remove-top">Order Summary</h3>
            </div>
          </div>
        </div>
        <div class="uk-card-body order-summary-body">
          <div>
            <div class="row">
              <p class="col-6">Subtotal</p>
              <p class="col-6 text-right">3100 EGP</p>
            </div>
            <div class="row">
              <p class="col-6">Shipping Fees</p>
              <p class="col-6 text-right">50 EGP</p>
            </div>
          </div>
        </div>
        <div class="uk-card-footer border-t order-summary-footer">
          <div class="row">
            <div class="col-6">Total</div>
            <div class="col-6 text-right">3150 EGP</div>
          </div>
        </div>
      </div>
      <div class="container mt-3 text-center">
        <button name="add" type="submit" class="btn btn-success btn-rounded mt-2 btn-product">Proceed to pay</button>
      </div>
    </div>
  </div>
</div>
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