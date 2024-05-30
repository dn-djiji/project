<?php 

include_once "db/conn.php";


$_SESSION['login'] = "";




if (isset($_POST['login'])) {

  if (isset($_POST['email'])) {
      $email = $_POST['email'];
  }
  if (isset($_POST['password'])) {
      $password = $_POST['password'];
  }

  $select = mysqli_query($conn,"SELECT * FROM `admin` WHERE email='$email' AND password = '$password' ");
  if (mysqli_num_rows($select) === 1) {
      $row = mysqli_fetch_assoc($select);
      if ($row['email'] === $email &&  $row['password'] === $password) {
          $_SESSION['email'] = $email;
          $_SESSION['admin'] = "admin";
          header('location:home_admin.php');die();
      }
  } else {
     $_SESSION['login']  =  "Mauvais email ou mot de passe";
  }
}

?>

<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <script src="js/jquery"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="page-contact" onload="getLocation()" >

  <!-- ======= Header ======= -->
  <?php include_once "structure/header.php"; ?>
  

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
              




  <script src="js/jquery.js"></script>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Admin</h2>
       

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

      
           
            <hr>
        
        <div class="row gy-4 d-flex justify-content-end">

       

        
        
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

        
<h1 id="title">Admin Se connecter</h1> <br>

</div>
         

       

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

        
          <h1 id="title"> Se connecter</h1> <br>
          <?php if ($_SESSION['login'] != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['login']; ?>
        </div>
    <?php endif; ?>
       
              <div class="php-email-form">
                <form action="" method="post">
        
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" id="email" name="email" class="form-control"  placeholder="Email" required   >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                </div>
              </div>
          

             
              <button type="submit" class="btn btn-primary"  name="login" >Se connecter</button>
              <div class="text-center">
              </form>
              <br> <br>
          

              
              
              
            </div>
              
           
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->










  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once "structure/footer.php"; ?>
  <!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>