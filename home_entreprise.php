<?php

include_once "db/conn.php";

$_SESSION['error'] = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['nom_du_travail'])) {
    $nom_du_travail = $_POST['nom_du_travail'];
  }

  if (isset($_POST['localisation'])) {
    $localisation = $_POST['localisation'];
  }
  if (isset($_POST['start'])) {
    $start = $_POST['start'];
  }
  if (isset($_POST['end'])) {
    $end = $_POST['end'];
  }
  if (isset($_POST['description'])) {
    $description = $_POST['description'];
  }

  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  }

  $_SESSION['error'] = "Offre d'emploi ajoutée";
  $insert = mysqli_query($conn, "INSERT INTO `offres`(`nom_du_travail`, `localisation`, `start`, `end`, `description`, `email`) VALUES ('$nom_du_travail','$localisation','$start','$end','$description','$email')");
  header('location:home_entreprise.php#end');
}



?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Eentreprise</title>
  <meta content="" name="description">
  <meta content="" name="keywords">




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

        <h2>Ajouter un Emploi</h2>


      </div>
    </div>


    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">



        <div class="row gy-4 d-flex justify-content-end">




          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

            <div class="info-item d-flex">


              <br>
              <div>

              </div>
            </div>



            <div class="info-item d-flex">

              <button type="button" class="btn btn-dark">Toutes les offres (
                <?php
                $email = $_SESSION['email'];

                $get_count = mysqli_query($conn, "SELECT * FROM `offres` WHERE email = '$email'");

                echo mysqli_num_rows($get_count);


                ?>
                )</button>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">


            <div class="row">


              <?php if ($_SESSION['error'] != "") : ?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION['error']; ?>
                </div>
              <?php endif; ?>

              <form action="" method="post" role="form" class="php-email-form">




                <div class="col-md-6 form-group">
                  <input type="text" name="nom_du_travail" class="form-control" id="nom_du_travail" placeholder="Nom du travail" required>
                </div>
           
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="localisation" id="localisation" placeholder="localisation" required>
            </div>

            <div class="form-group mt-3">
              <span>Début</span>
              <input type="date" class="form-control" name="start" id="start" placeholder="start" required>
            </div>
            <div class="form-group mt-3">
              <span>Fin</span>
              <input type="date" class="form-control" name="end" id="end" placeholder="end" required>
            </div>


            <div class="form-group mt-3">
              <textarea class="form-control" name="description" rows="5" placeholder="Description de l'emploi" required></textarea>
            </div>
            <div class="my-3">


              <div class="text-center"><button type="submit" type="submit" class="btn btn-primary">Publication d'emploi</button></div>
              </form>

            </div>

          </div>

        </div>
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
            $select = mysqli_query($conn, "SELECT * FROM `offres` WHERE email = '$email'");

            $i = 0;
            while ($row = mysqli_fetch_assoc($select)) : ?>
              <?php $i++; ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row['nom_du_travail']; ?></td>
                
                <td><?= $row['localisation']; ?></td>
                <td><?= $row['start']; ?></td>
                <td><?= $row['end']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                  <?php


                  if ($row['end']  >= date("Y-m-d")) { ?>
                    <button type="button" class="btn btn-warning btn-sm">Activé</button>
                  <?php } else { ?>
                    <button type="button" class="btn btn-danger btn-sm">Désactivé</button>
                  <?php } ?>





                </td>
                <td><a class="btn btn-primary btn-sm" href="action/supprimer_offre.php?id=<?= $row['id']; ?>">Supprimer</a></td>
              </tr>
            <?php endwhile; ?>


          </tbody>
        </table>




        <style>

          table {
            overflow-y: auto;
          }
        </style>

        <h1 id="end">Demandes d'emploi</h1>
        <table class="table" id="table">
          <thead>
            <tr>
            
            <th>id</th>
              <th scope="col">Nom du travail</th>
              <!-- <th>Email</th> -->
              <th>Nom</th>
              <th>adresse</th>
              <th>Telephone</th>
              <th>Competences</th>
              <th>Sexe</th>
              <th>Experience</th>
              <th>Niveau</th>
              <th>Service national</th>
              <th>CV</th>
              <th scope="col">L'état</th>
              <th>Date de l'entretien</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            $email = $_SESSION['email'];
            $sql = "SELECT   
            users.name,
            users.adresse,
            users.phone,
            users.competences,
            users.experience,
            users.niveau,
            users.cv,
            users.email,
            users.sexe,
            users.service_national,
            orders.nom_du_travail,
            orders.cv,
            orders.status,
            orders.date_ent,
            orders.id,
            orders.email_entreprise,
            orders.email
            
             FROM orders INNER JOIN users WHERE orders.email_entreprise = '$email' AND users.email = orders.email";
            $select = mysqli_query($conn, $sql);

          
           

          
            while ($row = mysqli_fetch_assoc($select)){ ?>

            
           
              <tr>
               
           <td><?= $row['id']; ?></td>
                <td><?= $row['nom_du_travail']; ?></td>
                <!-- <td><?= $row['email']; ?></td> -->

                <td><?= $row['name']; ?></td>
                <td><?= $row['adresse']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['competences']; ?></td>
                <td><?= $row['sexe']; ?></td>
                <td><?= $row['experience']; ?></td>
                <td><?= $row['niveau']; ?></td>
                <td><?= $row['service_national']; ?></td>
              

                <td>
               <?php if($row['cv'] != ""){ ?> 
                  <a href="cv/<?= $row['cv']; ?>" download="cv/<?= $row['cv']; ?>" class="btn btn-dark">CV</a>
                  <?php } else{ echo "/"; }?>

                </td>
                <td style="width:100px">
                  <select id="select" style="width: 200px;" onchange="Status('<?= $row['id']; ?>')" class="form-select w-50" aria-label="Default select example">
                    <option selected disabled>L'état</option>
                    <option value="1" title="Acceptation" <?php if ($row['status'] == 1) {
                                        echo "selected";
                                      }; ?>>Acceptation</option>
                    <option value="2" <?php if ($row['status'] == 2) {
                                        echo "selected";
                                      }; ?> title="Rejeter">Rejeter</option>
                  </select>
                </td>

                <td>
                  <?= $row['date_ent'] ?>
                </td>

             
              </tr>
            <?php } ?>


          </tbody>
        </table>
        <div class="w-25 m-3">
        

<form action="" method="post">
<select name="get_id" class="form-select" aria-label="Default select example">
           
         <?php   
         
         $select = mysqli_query($conn, "SELECT *  FROM orders WHERE email_entreprise = '$email'");


while ($row = mysqli_fetch_assoc($select)):?>
<option value="<?= $row['id'];?>"><?= $row['id'];?></option>
<?php endwhile ;?>
</select>
          <br>
<input class="form-control" id="date" type="date" name="date">
<br>
<button class="btn btn-primary" name="submit" type="submit">Sauvegarder</button>     
</form>
</div>
<?php 

if(isset($_POST['submit'])){

  if(isset($_POST['date'])){
    $date = $_POST['date'];
  }
  if(isset($_POST['get_id'])){
    $get_id = $_POST['get_id'];
  }

  $update = mysqli_query($conn,"UPDATE `orders` SET `date_ent`='$date' WHERE id = '$get_id'");
  header('location:home_entreprise.php#table');

}




?>
  </section>

   

  </main>

  <script>
    
    function Status(id) {
      let date = $("#date").val();
      let status = $("#id" + id).val();
      let select = $("#select").val();
      $.ajax({
        url: "action/select.php",
        method: "POST",
        data: "id=" + id + "&select=" + select+"&date="+date,
        success: function(res) {}
      })
      return false;
    }
  </script>



  <?php include_once "structure/footer.php"; ?>


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>



  <script src="assets/js/main.js"></script>

</body>

</html>
