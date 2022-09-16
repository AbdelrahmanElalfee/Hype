<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/hypegym.png" type="image/x-icon">

  <!-- Bootstrap 4 CDN CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <!-- Bootstrap 5 CDN CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- Tailwind CDN CSS -->
  <link rel="stylesheet" href="css/tailwind.min.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/5eb17c08cd.js" crossorigin="anonymous"></script>

  <!-- BoxIcons CDN CSS -->
  <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' />

  <!-- UIKIT CDN CSS -->
  <link rel="stylesheet" href="css/uikit.min.css">

  <!-- Page Title -->
  <title>Hype Gym | <?php echo $pageName; ?></title>

</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky">
    <div class="container">
      <div>
        <a class="navbar-brand logo text-uppercase" href="index.php">
          <img src="img/hypegym.png" width="80" alt="logo">
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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

          <?php if (isset($userId)) { ?>
            <div class="text-right pl-5 mb-0">
              <ul class="uk-iconnav">
                <li><a href="profile.php" style="font-size: 24px;"><span><i class='bx bx-user-circle' style='color:#b2e000;'></i></span></a></li>
                <li><a href="cart.php""><span style=" font-size: 24px;"><i class='bx bxs-cart-alt' style='color:#b2e000'></i></span>(<?php echo $rowCart; ?>)</a></li>
                <li><a href="shared/logout.php"><span style=" font-size: 24px;"><i class='bx bx-exit' style='color:#b2e000'></i></span></a></li>
              </ul>
            </div>
          <?php } else { ?>
            <div class="text-right pl-5 mb-0 nav-button">
              <a href="registration.php" class="nav-btn btn btn-outline-white btn-rounded">Get Started</a>
            </div>
          <?php }  ?>
        </div>
      </div>
    </div>
    </div>
  </nav>
  <?php


  // string contain
  if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
      return '' === $needle || false !== strpos($haystack, $needle);
    }
  }


  ?>