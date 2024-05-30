<?php 

include_once "db/conn.php";

$_SESSION['register'] = "";
$_SESSION['login'] = "";

if (isset($_POST['register'])) {

  if (isset($_POST['email'])) {
      $email = $_POST['email'];
  }
  if (isset($_POST['password'])) {
      $password = $_POST['password'];
  }

  if (isset($_POST['name'])) {
      $name = $_POST['name'];
  }

  if (isset($_POST['address'])) {
    $address = $_POST['address'];
}

if (isset($_POST['type'])) {
    $type = $_POST['type'];
}


  $select = mysqli_query($conn,"INSERT INTO `entreprise`( `name`,`address`,`type`, `email`, `password`,`role`) 
  VALUES ('$name','$address','$type','$email','$password','entreprise')");
  if($select){
      $_SESSION['register'] =  "Un compte a été créé pour votre entreprise. Merci.";
      
     
  } else {
      $_SESSION['register'] = "Erreur lors de la création du compte";
  }
}


if (isset($_POST['login'])) {

  if (isset($_POST['email'])) {
      $email = $_POST['email'];
  }
  if (isset($_POST['password'])) {
      $password = $_POST['password'];
  }

  $select = mysqli_query($conn,"SELECT * FROM `entreprise` WHERE email='$email' AND password = '$password'");
  if (mysqli_num_rows($select) === 1) {
      $row = mysqli_fetch_assoc($select);
      if ($row['email'] === $email &&  $row['password'] === $password) {
          $_SESSION['email'] = $email;
          $_SESSION['role'] = 'entreprise';
          $_SESSION['type'] = $row['type'];
          header('location:home_entreprise.php');die();
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

  <title>Espace privé pour entreprises</title>
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

<body class="page-contact"  >

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

        <h2>Espace privé pour entreprises</h2>
       

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

      
           
            <hr>
        
        <div class="row gy-4 d-flex justify-content-end">

       

        
        
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

        
<h1 id="title">S'inscrire</h1> <br>

<?php if ($_SESSION['register'] != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['register']; ?>
        </div>
    <?php endif; ?>

    <div class="php-email-form">
    <form action="" method="post">
    <div class="row">
      <div class="col-md-6 form-group">
        <input type="text" id="name" name="name" class="form-control"  placeholder="Nom de l'entreprise" required>
      </div>
      <div class="col-md-6 form-group mt-3 mt-md-0">
        <input type="text" class="form-control" name="address" id="address" placeholder="Address Entreprise" required>
      </div>
    </div>
     
    <select required name="type" class="form-select" aria-label="Default select example">
      <option selected disabled >Type entreprise</option>
      <option value="Public">Public</option>
      <option value="Privé">Privé</option>
 
    </select>

    <div class="form-group mt-3">
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
    <br>
      <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
    </div>

   
    <button type="submit" class="btn btn-primary"  name="register" >S'inscrire</button>
    </form>

    <div class="text-center">

    <br> <br>
 
    
    
    
  </div>
    
 
  </div>
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