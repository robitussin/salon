
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Brusko Barbershop</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/simple-line-icons/css/simple-line-icons.css'); ?>">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/device-mockups/device-mockups.min.css'); ?>">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/new-age.min.css'); ?>" rel="stylesheet">

  <style>

    </style>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">GET AN APPOINTMENT</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="login/loginaccount">Log in</a>
        </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#download">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#features">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <!--<h1 class="mb-5">New Age is an app landing page that will help you beautifully showcase your new mobile app, or anything else!</h1>-->
            <h1>
              <b>Brusko Barbershop</b>
            </h1>
            <h3>
              the place where you will get all your personal grooming needs!           
            </h3>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="device-container">
            <div class="device-mockup ipad_pro portrait gold">
              <div class="device">
                <div class="screen">
                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                  <img src="<?= base_url('assets/img/demo-screen-7.jpg'); ?>" class="img-fluid" alt="">
                </div>
                <div class="button">
                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="download bg-primary text-center" id="download">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2 class="section-heading">Sign up today!</h2>
          <a href="signup/createaccount" class="btn btn-outline btn-xl js-scroll-trigger">Click here to sign up!</a>
          <p style="margin-top:20px">Our website is can be accessed on any mobile device!</p>
          <div class="badges">
            <a class="badge-link" href="#"><img src="<?= base_url('assets/img/firefox.png'); ?>" alt=""></a>
            <a class="badge-link" href="#"><img src="<?= base_url('assets/img/chrome.png'); ?>" alt=""></a>
            <a class="badge-link" href="#"><img src="<?= base_url('assets/img/safari.png'); ?>" alt=""></a>
          </div>
          </div>
      </div>
    </div>
  </section>

  <section class="features" id="features">
    <div class="container">
      <div class="section-heading text-center">
        <h2> Sit Back and Relax</h2>
        <p class="text-muted">Ask what you need and we will provide!</p>
        <hr>
      </div>
      <div class="row">
        <div class="col-lg-4 my-auto">
          <div class="device-container">
            <div class="device-mockup ipad_pro portrait black">
              <div class="device">
                <div class="screen">
                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                  <img src="<?= base_url('assets/img/demo-screen-9.jpg') ?>" class="img-fluid" alt="">
                </div>
                <div class="button">
                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-emotsmile text-primary"></i>
                  <h3>Haircut</h3>
                  <p class="text-muted">We accept any haistyles provided by our highly trained barbers and stylists</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-like text-primary"></i>
                  <h3>Massage</h3>
                  <p class="text-muted">Fairly priced foot, calf and hand massages for the average juan</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-magic-wand text-primary"></i>
                  <h3>Pedicure</h3>
                  <p class="text-muted">We provide exfoliation, moisturizing, massage and nail cosmetics. Pedicure your feet like magic!</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-heart text-primary"></i>
                  <h3>Manicure</h3>
                  <p class="text-muted">We provide nail filing, shaping, pushing, clipping, polish for your fingernails. We put the care into manicure</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="cta-content">
      <div class="container">
          <h2>Contact Us</h2>
          <h3 style="color:#ffffff">
            <i class="fas fa-mobile-alt"></i>
            09475787567
          </h3>
          <h3 style="color:#ffffff">
            <i class="fas fa-map-marker-alt"></i>
            0033 L(A) Olympus Street North Olympus Subdvision Brgy. Kaligayahan Quezon City Philippines
          </h3  >
          <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
      </div>
    </div>
    <div class="overlay"></div>
  </section>

  <!-- Map-->
  <div class="map" id="contact">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d482.3148891223083!2d121.0426712873721!3d14.739758723518147!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c5a100f2bf3321b!2sBrusko%20Barbershop!5e0!3m2!1sen!2sph!4v1621062932869!5m2!1sen!2sph"></iframe>
      <br />
      <small><a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d482.3148891223083!2d121.0426712873721!3d14.739758723518147!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c5a100f2bf3321b!2sBrusko%20Barbershop!5e0!3m2!1sen!2sph!4v1621062932869!5m2!1sen!2sph"></a></small>
  </div>

  <section class="contact bg-primary" id="contact">
    <div class="container">
      <h2>We
        <i class="fas fa-heart"></i>
        new friends! Follow or Subscribe!</h2>
      <ul class="list-inline list-social">
        <li class="list-inline-item social-twitter">
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item social-facebook">
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="list-inline-item social-google-plus">
          <a href="#">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Brusko Barbershop 2021. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for this template -->
  <script src="<?= base_url('assets/js/new-age.min.js'); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url('assets/js/new-age.js'); ?>"></script>

</body>

</html>
