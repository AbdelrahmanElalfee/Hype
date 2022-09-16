<?php
$link = $_SERVER["REQUEST_URI"];
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- Tailwind CDN CSS -->
  <link rel="stylesheet" href="../css/tailwind.min.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/5eb17c08cd.js" crossorigin="anonymous"></script>

  <!-- BoxIcons CDN -->
  <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' />

  <!-- UIKIT CSS -->
  <link rel="stylesheet" href="../css/uikit.min.css">

  <!-- Page Title -->
  <title>Hype Gym | Admin Panel</title>

</head>

<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <i class='bx bx-dumbbell bx-tada' style='color:#b2e000'></i>
        <div class="logo_name">
          Hype
        </div>
      </div>
      <i class='bx bx-menu' id="btn_menu"></i>
    </div>
    <ul class="nav_list">
      <!-- <li>
        <i class='bx bx-search' style='color:#b2e000'></i>
        <input type="text" placeholder="Search...">
      </li> -->
      <li>
        <a href="index.php" uk-tooltip="title: Dashboard; pos: left">
          <i class='bx bxs-dashboard' style='color:#b2e000'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#" uk-tooltip="title: Users; pos: left">
          <i class='bx bx-user' style='color:#b2e000'></i>
          <span class="links_name">Users</span>
        </a>
      </li>
      <li>
        <a href="bundle.php" uk-tooltip="title: Bundles; pos: left">
          <i class='bx bx-package' style='color:#b2e000'></i>
          <span class="links_name">Bundles</span>
        </a>
      </li>
      <li>
        <a href="shop.php" uk-tooltip="title: Shop; pos: left">
          <i class='bx bxs-store' style='color:#b2e000'></i>
          <span class="links_name">Shop</span>
        </a>
      </li>
      <li>
        <a href="product.php" uk-tooltip="title: Products; pos: left">
          <i class='bx bxl-product-hunt' style='color:#b2e000'></i>
          <span class="links_name">Products</span>
        </a>
      </li>
      <li>
        <a href="gym.php" uk-tooltip="title: Gyms; pos: left">
          <i class='bx bx-building' style='color:#b2e000'></i>
          <span class="links_name">Gym</span>
        </a>
      </li>
      <li>
        <a href="class.php" uk-tooltip="title: Classes; pos: left">
          <i class='bx bx-table' style='color:#b2e000'></i>
          <span class="links_name">Classes</span>
        </a>
      </li>
      <li>
        <a href="trainner.php" uk-tooltip="title: Trainers; pos: left">
          <i class='bx bx-run' style='color:#b2e000'></i>
          <span class="links_name">Trainer</span>
        </a>
      </li>
      <li>
        <a href="doctor.php" uk-tooltip="title: Nutritionists; pos: left">
          <i class='bx bxs-face' style='color:#b2e000'></i>
          <span class="links_name">Nutritionists</span>
        </a>
      </li>
      <li>
        <a href="#" uk-tooltip="title: Orders; pos: left">
          <i class='bx bx-cart' style='color:#b2e000'></i>
          <span class="links_name">Orders</span>
        </a>
      </li>
    </ul>
    <div class="profile_content">
      <div class="profile">
        <div class="profile_details">
          <img src="assets/img/boy.png" alt="profile Img">
          <div class="name_job">
            <div class="name">Abdelrahman</div>
            <div class="job">Admin</div>
          </div>
        </div>
        <a href="<?php echo $link; ?>?logout" data-toggle="tooltip" data-placement="right" title="Logout">
          <i class='bx bx-log-out' style='color:#b2e000' id="logout"></i>
        </a>
      </div>
    </div>
  </div>