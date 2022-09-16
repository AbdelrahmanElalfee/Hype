<?php
$pageName = "Landing Page";
$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
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

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/5eb17c08cd.js" crossorigin="anonymous"></script>

  <!-- BoxIcons CDN CSS -->
  <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' />

  <!-- UIKIT CSS -->
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
          <img src="img/hypegym.png " width="70" height="50" alt="logo">
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa-solid fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link nav-btn-custom" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-btn-custom" href="#service">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-btn-custom" href="#client">Clients</a>
          </li>
        </ul>
        <div>
          <div class="text-right pl-5 mb-0 nav-button">
            <a href="registration.php" class="nav-btn btn btn-outline-white btn-rounded btn-custom">Get Started</a>
          </div>
          <!-- Mansour dol session lw logged in wla l2 -->
          <!-- <div class="text-right pl-5 mb-0">
            <ul class="uk-iconnav">
              <li><a href="profile.php" style="font-size: 24px;"><span><i class='bx bx-user-circle' style='color:#b2e000;'></i></span></a></li>
              <li><a href="cart.php""><span style=" font-size: 24px;"><i class='bx bxs-cart-alt' style='color:#b2e000'></i></span>(3)</a></li>
              <li><a href="#""><span style=" font-size: 24px;"><i class='bx bx-exit' style='color:#b2e000'></i></span></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Vision & Mission  Section -->

  <section class="section bg-home home-clip bg-home-full" id="landing">
    <div class="bg-gradiant-overlay"></div>
    <div class="container">
      <div class="row vertical-content justify-content-center mt-5">
        <div class="col-lg-6 mt-5">
          <div class="home-content mt-5">
            <h6 class="home-title">
              “Making the healthy way one click away” </h6>
            <p class="home-subtitle mt-3">
              Online platform that provides everything to help those who are seeking to have
              a healthy body by gathering a wide range of gyms and freelance trainers and nutritionists
              in one place to facilitate the process of finding the suitable alternative in a short time.
            </p>
            <div class="mt-2">
              <a href="home.php" class="btn btn-outline-white btn-custom">Explore</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services & Features Section -->

  <section class="section bg-service" id="service">

    <div class="container text-center">
      <div class="service-title">
        <h3 class="header">Our Services</h3>
      </div>

      <div class="row mt-5 pt-4">
        <div class="col-lg-4">
          <div class="service-content p-2">
            <div class="services-icon mb-5 text-center">
              <img src="img/booking.png" alt="" class="img-fluid" />
            </div>
            <div class="services-desc text-center">
              <h5>Online Booking</h5>
              <p class="text-muted">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="service-content p-2">
            <div class="services-icon mb-5 text-center">
              <img src="img/male.png" alt="" class="img-fluid" />
            </div>
            <div class="services-desc">
              <h5>Personal Trainers</h5>
              <p class="text-muted">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="service-content p-2">
            <div class="services-icon mb-5 text-center">
              <img src="img/diet.png" alt="" class="img-fluid" />
            </div>

            <div class="services-desc">
              <h5>Nutritions Supplements</h5>
              <p class="text-muted">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Q&A Section -->
  <section class="section">
    <div class="container text-center">
      <div class="service-title">
        <h3 class="header">Q&A</h3>
      </div>
      <div class="uk-column-1-2 uk-column-divider">
        <div>
          <h3>What is the purpose of our web application?</h3>
          <p class="text-left">
            To facilitate the process for our customers to choose from a large number of gyms, private trainers, private nutritionists , health shops to buy supplements only from one place and they could easily know all the details about each gym, trainer, nutritionist , shops without the need of making a lot of searches.
          </p>
        </div>
        <div>
          <h3>How to Access and correct your personal Info?</h3>
          <p class="text-left">
            Our web application is known with it’s usability which means the ease ar which you can use our web application in a friendly way.
            So you could access and correct your personal info in a very simple way From your profile you could edit your information “Mail” , “Phone”, “Address”.
          </p>
        </div>
      </div>
      <div class="uk-column-1-2 uk-column-divider mt-5">
        <div>
          <h3>How could I reset the password?</h3>
          <p class="text-left">
            If you have a problem with logging into your account we add a feature that allow you to reset your password and change it into new one through some steps Click on reset Password then Check your Mail.
          </p>

        </div>

        <div>
          <h3>How can our service Improve your life?</h3>
          <p class="text-left">
            To help people who are seeking to have a healthy lifestyle through technology, to reach all available gyms around you with the suitable price for you.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="background-color: #242424;">
    <div class="container text-center">
      <div class="service-title">
        <h1 class="header text-light">Join Us</h1>
      </div>
      <div class="uk-flex uk-flex-center mt-2">
        <div><a href="https://www.facebook.com/cohypee/"><i class='bx bxl-facebook-circle' style='color:#b2e000; font-size: 74px;'></i></a></div>
        <div class="uk-margin-left"><a href="https://www.instagram.com/hype_eco/"><i class='bx bxl-instagram-alt' style='color:#b2e000; font-size: 74px;'></i></a></div>
        <div class="uk-margin-left"><a href="https://www.linkedin.com/in/hype-co-251615243/"><i class='bx bxl-linkedin' style='color:#b2e000; font-size: 74px;'></i></a></div>
      </div>
    </div></a>
  </section>


  <?php
  include "shared/footer.php";
  ?>
</body>

</html>