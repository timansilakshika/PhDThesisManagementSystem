
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>APTMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="asste/img/favicon.png" rel="icon">
  <link href="asste/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="asste/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="asste/vendor/aos/aos.css" rel="stylesheet">
  <link href="asste/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asste/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asste/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="asste/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="asste/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="asste/css/style.css" rel="stylesheet">
<style>
  #header .logo a {
    color: #696cff;
}

.get-started-btn {background: #696cff;}
li a.active{color: #696cff  !important;}
.why-us .content {background: #696cff;}
.why-us .icon-boxes .icon-box i {
  color: #696cff  !important;
  background: #e6eaf9  !important;
}
#footer .footer-newsletter form input[type=submit] {background: #696cff;}
#footer .social-links a {
    background: #696cff;}
    #footer .footer-top .footer-links ul i{
      color: #696cff  !important;
    }
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">APTMS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="asste/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="index.php">About</a></li>
          <li><a href="index.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
<?php 
session_start();
if (isset($_SESSION['user_id'])) {
  echo '<a href="dashboard" class="get-started-btn">Dashboard</a>';
}else{
   echo '<a href="login" class="get-started-btn">Login</a>';
}
 ?>
      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>Automated PhD Thesis Management System</h2>
      <a href="login.php" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose US?</h3>
              <p>
              Choose our automated PhD thesis management system for streamlined thesis handling. We offer efficient submission processes, progress tracking, and communication interfaces for students, supervisors, and reviewers. With intuitive interfaces and comprehensive features, we simplify thesis management, ensuring a seamless and productive experience for all stakeholders.
              </p>
              <div class="text-center">
                <a href="index.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Store Submissions</h4>
                    <p>Easily store and organize thesis submissions securely with our automated system's robust database management.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Track Progress</h4>
                    <p>Effortlessly monitor thesis progress with our system's comprehensive tracking feature for enhanced project oversight.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>New Submissions</h4>
                    <p>Seamlessly submit new theses with our user-friendly interface, simplifying the process for students and supervisors.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>APTMS</h3>
            <p>
              UCSC <br>
              University of Colombo<br>
              Sri Lanka <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@aptms.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Store Sumissions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Track Progress</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">New Submissions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marking & Grading</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Reporting</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Stay updated on thesis management news. Join our newsletter today!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>APTMS</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="">T. L. K. Arachchi</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="asste/vendor/purecounter/purecounter.js"></script>
  <script src="asste/vendor/aos/aos.js"></script>
  <script src="asste/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asste/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="asste/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="asste/js/main.js"></script>

</body>

</html>