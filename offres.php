<?php

include_once "db/conn.php";






?>

<!DOCTYPE html>
<html lang="fr" > 

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recherche d'emploi</title>
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

<body class="page-blog">

  
  <?php include_once "structure/header.php"; ?>
  
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Veuillez vous connecter pour soumettre une candidature
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
 
      </div>
    </div>
  </div>
</div>



  <main id="main">

    
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Recherche d'emploi</h2>
      

      </div>
    </div>

    
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

      <?php if(isset($_SESSION['error']) && $_SESSION['error'] != ""):?>
      <div class="alert alert-danger" role="alert">
      <?= $_SESSION['error']; ?>
      </div>
      <?php endif; ?>

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div id="display">
            <div class="row gy-5">


                <?php 
            if(isset($_SESSION['email'])){
              $email = $_SESSION['email'];
            }
            
            if(isset($_SESSION['role'])){
              $link = 'hidden';
              $select = mysqli_query($conn,"SELECT * FROM `offres` WHERE email = '$email'");
            }
            else{
              $link  = "";
              $select = mysqli_query($conn,"SELECT * FROM `offres`");
            
            }
            
              
               
                
                while($row = mysqli_fetch_assoc($select)){
                ?>
              <div class="col-lg-6">
          <div class="card-group">
  <div class="card">
    <img src="assets/img/offre-demploi.jpg" class="card-img-top" width="50" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $row['nom_du_travail'];?>Da / mois</h5>
      <p class="card-text"><?= $row['description'] ;?></p>
      <hr>
      <p class="card-text"><?= $row['localisation'] ;?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?= $row['end'] ;?>

   </small>
      <div class="float-end">

        <?php 
        if($row['end']  >= date("Y-m-d")){?>
                     <button type="button" class="btn btn-warning btn-sm">Activé</button>
                     <?php }else{ ?>
                     <button type="button" class="btn btn-danger btn-sm">Désactivé</button>
                     <?php } ?>

                     <?php if(isset($_SESSION['role'])) { ?>
<a  <?php if(isset($link)){echo $link;} ?> href="action/demander.php?id=<?= $row['id'];?>">Demander</a>


                  <?php }elseif(!isset($_SESSION['email'])){ 
                    
                    echo ' <a  href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Demander</a>';
                    
                    
                    ?>
                 
                  


                  <?php }else { 
                    echo '<a  href="action/demander.php?id='.$row['id'].'">Demander</a>';}
                  
                  ?>
      </div>
 
    </div>
  </div>
  
  
  
</div>

</div>
<?php } ?>
</div>

            </div>


          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Recherche d'emploi</h3>
                <form action="" method="POST"  class="mt-3">
                  <input type="text" id="search" name="search" autofocus>
               
                </form>
              </div>

              <div class="sidebar-item categories">
         
                <ul class="mt-3">
                  <li><a href="#">Toutes les offres <span>(
                    <?php 
                     $get_count = mysqli_query($conn,"SELECT * FROM `offres`");

                     echo mysqli_num_rows($get_count);
                     ?>)</span></a></li>
                
          
                </ul>
              </div>

         

            </div>

          </div>

        </div>

      </div>
    </section>

  </main>

  <script src="js/jquery.js"></script>
                    <script>
            
                        function fill(Value) {
                            $('#search').val(Value);
                           $('#display').hide();
                        }
                        $(document).ready(function() {
                            $("#search").keyup(function() {
                                var search = $('#search').val();
                                if (search == "") {
                                    window.location ="offres.php";
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/search.php",
                                        data: {
                                            search: search
                                        },
                                        success: function(html) {
                                            $("#display").html(html).show();
                                        }
                                    });
                                }
                            });
                        });
                    </script>
  
  <?php include_once "structure/footer.php"; ?>
  

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="js/jquery.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>