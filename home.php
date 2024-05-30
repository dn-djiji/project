<?php

include_once "db/conn.php";
ob_start();

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

}

$_SESSION['error'] = "";




if (isset($_POST['submit'])) {
  if (isset($_POST['service_national'])) {
    $service_national = $_POST['service_national'];
  }
  if (isset($_POST['niveau'])) {
    $niveau = $_POST['niveau'];
  }
  if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
  }

  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
  if (isset($_POST['experience'])) {
    $experience = $_POST['experience'];
  }
  if (isset($_POST['adresse'])) {
    $adresse = $_POST['adresse'];
  }
  if (isset($_POST['competences'])) {
    $competences = $_POST['competences'];
  }

  if (isset($_POST['sexe'])) {
    $sexe = $_POST['sexe'];
  }

  if(isset($_FILES['file']['name'])){
      $file = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_error = $_FILES['file']['error'];
      $fileExt = explode(".", $file);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array("jpg", "jpeg", "png", "svg", "pdf", "txt");
      if (in_array($fileActualExt, $allowed)) {
        if ($file_error == 0) {
          if ($file_size < 600000000) {
            $new_name = time() . '.' . $fileActualExt;
            $target = "cv/" . $new_name;
            if (!empty($file)) {
              move_uploaded_file($_FILES['file']['tmp_name'], $target);
              $update = mysqli_query($conn, "UPDATE `users` SET `cv`='$new_name' WHERE email = '$email'");
              $_SESSION['error'] = "Vos données ont été mises à jour";
              header('location:home.php');
            }
          }
        }
      }
  }


  
    $update = mysqli_query($conn, "UPDATE `users` SET `name`='$name',`adresse`='$adresse',`phone`='$phone',`competences`='$competences',`sexe`='$sexe',`experience`='$experience',`niveau`='$niveau',`service_national`='$service_national' WHERE email = '$email'");
    $_SESSION['error'] = "Vos données ont été mises à jour";
    header('location:home.php');
  


  
}






?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>les informations personnelles</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="page-contact">

  <!-- ======= Header ======= -->
  <?php

  ob_start();
  include_once "structure/header.php"; ?>

  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>les informations personnelles</h2>


      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

        <?php if ($_SESSION['error'] != "") : ?>
          <div class="alert alert-success" role="alert">
            <?= $_SESSION['error']; ?>
          </div>
        <?php endif; ?>
        <div class="row gy-4 d-flex justify-content-end">


          <?php 
          $email = $_SESSION['email'];
          $select  = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
          while ($row = mysqli_fetch_assoc($select)) : ?>

            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

              <div class="info-item d-flex">
                <form action="" method="post" role="form" enctype="multipart/form-data" class="php-email-form">

                  <br>
                  <div>
                    <div class="form-group w-50">
                      <label for="my-select">Sexe</label>
                      <select id="sexe" class="form-control" name="sexe" required>
                        <option value="" selected disabled>-----</option>
                        <option value="Homme" <?php if ($row['sexe'] == "Homme") {
                                                echo "selected";
                                              }; ?>>Homme</option>
                        <option value="Femme" <?php if ($row['sexe'] == "Femme") {
                                                echo "selected";
                                              }; ?>>Femme</option>
                      </select>
                    </div>
                  </div>
              </div><!-- End Info Item -->


              <div>
                <div class="form-group w-50">
                  <label for="my-select">le service national</label>
                  <select id="service_national" class="form-control" name="service_national" >
                    <option value="" selected disabled>-----</option>
                    <option value="Carte jaune" <?php if ($row['service_national'] == "Carte jaune") {
                                                  echo "selected";
                                                }; ?>>Carte jaune</option>
                    <option value="Service dépassé" <?php if ($row['service_national'] == "Service dépassé") {
                                                              echo "selected";
                                                            }; ?>>Service dépassé</option>
                  </select>
                </div>
              </div>

              <br>

              <div class="info-item d-flex">

                <div class="form-group w-50">
                  <label for="my-select">le niveau</label>
                  <select id="niveau" class="form-control" name="niveau" required>
                    <option value="">----</option>
                    <option <?php if ($row['niveau'] == "Rien") {
                              echo "selected";
                            }; ?> value="Rien">Rien</option>
                    <option <?php if ($row['niveau'] == "BEM") {
                              echo "selected";
                            }; ?> value="BEM">BEM</option>
                    <option <?php if ($row['niveau'] == "BAC") {
                              echo "selected";
                            }; ?> value="BAC">BAC</option>
                    <option <?php if ($row['niveau'] == "L1") {
                              echo "selected";
                            }; ?> value="L1">L1</option>
                    <option <?php if ($row['niveau'] == "L2") {
                              echo "selected";
                            }; ?> value="L2">L2</option>
                    <option <?php if ($row['niveau'] == "L3") {
                              echo "selected";
                            }; ?> value="L3">L3</option>
                    <option <?php if ($row['niveau'] == "M1") {
                              echo "selected";
                            }; ?> value="M1">M1</option>
                    <option <?php if ($row['niveau'] == "M2") {
                              echo "selected";
                            }; ?> value="M2">M2</option>

<option <?php if ($row['niveau'] == "M2") {
                              echo "selected";
                            }; ?> value="electrecien superieure">electrecien superieure</option>

                  </select>
                  <?php if (!is_null($row['cv'])) : ?>
                    <br>
                    <a href="cv/<?= $row['cv']; ?>" download="cv/<?= $row['cv']; ?>" class="btn btn-dark">Télécharger Mon CV</a>
                  <?php endif; ?>
                </div>

              </div>

            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">


              <div class="row">

                <div class="form-group mt-3">



         
                  <label for="file">CV</label>
                  <input type="file" name="file" class="form-control" id="file" placeholder="CV">

                
                  <br>
                 
                </div>



                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" value="<?= $row['name']; ?>" id="name" placeholder="name">
                  <br>
                  <input type="text" name="phone" class="form-control" value="<?= $row['phone']; ?>" id="phone" placeholder="Téléphone">
                </div>


                <b class="col-md-6 form-group">
                  <input type="text" name="experience" value="<?= $row['experience']; ?>" class="form-control" id="experience" placeholder="Expérience">
                  <br>
                  <input type="text" name="adresse" value="<?= $row['adresse']; ?>" class="form-control" id="adresse" placeholder="l'adresse">
                </b>






              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" readonly value="<?= $_SESSION['email'] ?>" name="email" id="email" placeholder="البريد الالكتروني">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="competences" rows="5" placeholder="Compétences"><?= $row['competences']; ?></textarea>
              </div>
              <div class="my-3">


                <div class="text-center"><button type="submit" name="submit" class="btn btn-primary">Sauvegarder</button></div>
                </form>

              </div>

            </div>

        </div>
        <?php endwhile; ?>
        <table class="table">
              <thead>
                <tr>
                 
                  <th scope="col">Nom du travail</th>
                  <th scope="col">l'état</th>
                 <th>Date de l'entretien</th>
        
                </tr>
              </thead>
              <tbody>
                <?php 
                $email = $_SESSION['email'];
             $sql = "SELECT 
             offres.id,
             offres.nom_du_travail,
             offres.localisation,
             offres.email,

             orders.email,
             orders.id_offer,
             orders.status,
             orders.date_ent
              FROM orders INNER JOIN offres WHERE orders.id_offer = offres.id and orders.email = '$email'";
                $select = mysqli_query($conn,$sql);
                $i = 0;
                while($row = mysqli_fetch_assoc($select)) : ?>

           <tr>

          <td><?= $row['nom_du_travail']; ?></td>
                
                  <td><?php 
                    if(is_null($row['status'])){

                      echo "En attente";
            
                    }elseif($row['status'] == 1){
                      echo "Accepté";
                    }
                    elseif($row['status'] == 2){
                      echo "Rejete";
                    }?></td>

<td><?php 

if(is_null($row['status']) ||$row['status'] == 2 ){

  echo "/";

}else {
  echo $row['date_ent']; 
}




?></td>
                  
   </tr>

   
         
                <?php endwhile; ?>
               
              
         
              </tbody>
            </table>
    </section>


  </main>

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