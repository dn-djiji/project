<?php

include_once "db/conn.php";

$_SESSION['error'] = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  

}



?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="page-contact">

  
  <?php include_once "structure/header.php"; ?>
  
  

  <main id="main">

    
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Panneau de contrôle</h2>
       

      </div>
    </div>

    
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

      <h1>Tous les utilisateurs (<?php 
      $select = mysqli_query($conn,"SELECT * FROM `users`");
      echo mysqli_num_rows($select);
      
      
      ?>)</h1>
        
    
      <table class="table">
              <thead>
                <tr>
                 
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mot de passe</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Sexe</th>
                  <th scope="col">Competences</th>
                  <th scope="col">Experience</th>
                  <th scope="col">CV</th>
                  <th scope="col">Niveau</th>
                  <th scope="col">Service National</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php 
          
                $select = mysqli_query($conn,"SELECT * FROM `users`");
                $i = 0;
                while($row = mysqli_fetch_assoc($select)) : ?>

           <tr>
                
                  <td><?= $row['name'];?></td>
                  <td><?= $row['email'];?></td>
                  <td><?= $row['password'];?></td>
                  <td><?= $row['adresse'];?></td>
                  <td><?= $row['phone'];?></td>
                  <td><?= $row['sexe'];?></td>
                  <td><?= $row['competences'];?></td>
                  <td><?= $row['experience'];?></td>
                 <td> <?php if (!is_null($row['cv'])) : ?>
                    
                    <a href="cv/<?= $row['cv']; ?>" download="cv/<?= $row['cv']; ?>" class="btn btn-dark">CV</a>
                  <?php endif; ?></td>
               
                    
                   
                  <td><?= $row['niveau'];?></td>

                  <td><?= $row['service_national'];?></td>

                  <td><a class="btn btn-primary btn-sm" href="action/supprimer_user.php?id=<?= $row['id'];?>">Supprimer</a></td>
               
                
                
                </tr>
                <?php endwhile; ?>
               
              
              </tbody>
            </table>


            <h1>Toutes les offres d'emploi (<?php 
      $select = mysqli_query($conn,"SELECT * FROM `offres`");
      echo mysqli_num_rows($select);
      
      
      ?>)</h1>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom du travail</th>
                
                  <th scope="col">Localisation</th>
                  <th scope="col">Début</th>
                  <th scope="col">Fin</th>
                  <th scope="col">Description de l'emploi</th>
                  <th scope="col">L'état</th>
                  <th scope="col">supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $email = $_SESSION['email'];
                $select = mysqli_query($conn,"SELECT * FROM `offres`");
                $i = 0;
                while($row = mysqli_fetch_assoc($select)) : ?>
<?php $i ++; ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $row['nom_du_travail'];?></td>
                  
                  <td><?= $row['localisation'];?></td>
                  <td><?= $row['start'];?></td>
                  <td><?= $row['end'];?></td>
                  <td><?= $row['description'];?></td>
                  <td>
                    <?php 
                   

                    if($row['end']  >= date("Y-m-d")){?>
                    <button type="button" class="btn btn-warning btn-sm">Activé</button>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-danger btn-sm">Désactivé</button>
                    <?php } ?>

                    



                  </td>
                  <td><a class="btn btn-primary btn-sm" href="action/supprimer_offer_ent.php?id=<?= $row['id'];?>">Supprimer</a></td>
                </tr>
                <?php endwhile; ?>
               
              
              </tbody>
            </table>



            <br>
            <h1>Toutes les Entreprise (<?php 
      $select = mysqli_query($conn,"SELECT * FROM `entreprise`");
      echo mysqli_num_rows($select);
      
      
      ?>)</h1>
            <table class="table">
              <thead>
                <tr>
              
                  <th scope="col">Nom d'Entreprise</th>
                  <th scope="col">Address</th>
                  <th scope="col">Type</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mot de passe</th>
        
                  <th scope="col">supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $email = $_SESSION['email'];
                $select = mysqli_query($conn,"SELECT * FROM `entreprise`");
                $i = 0;
                while($row = mysqli_fetch_assoc($select)) : ?>

                <tr>
               
                  <td><?= $row['name'];?></td>
                  <td><?= $row['address'];?></td>
                  <td><?= $row['type'];?></td>
                  <td><?= $row['email'];?></td>
                  <td><?= $row['password'];?></td>
               
               
                  <td><a class="btn btn-primary btn-sm" href="action/supprimer_entrepris.php?id=<?= $row['id'];?>">Supprimer</a></td>
                </tr>
                <?php endwhile; ?>
               
              
              </tbody>
            </table>
    </section>

  </main>

  
  <?php include_once "structure/footer.php"; ?>
  

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>