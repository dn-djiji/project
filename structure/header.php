<script src="./assets/js/jquery.js"></script>

  <header id="header" class="header d-flex align-items-center fixed-top" dir="rtl"> 
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">JOB IDO</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if(isset($_SESSION['email']) && !isset($_SESSION['type'])): ?>

            <li>
            <div class="dropdown m-2">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  Notifications
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <?php 
    $email = $_SESSION['email'];

    $select = mysqli_query($conn,"SELECT * FROM `orders` WHERE email = '$email'");
    if(mysqli_num_rows($select) <= 0){
      echo "aucune notification";

    }else{
      while($row = mysqli_fetch_assoc($select)){ 
        

        if(is_null($row['status'])){

          echo "En attente<br>";

        }elseif($row['status'] == 1){
          echo "Accepté<br>";
        }
        elseif($row['status'] == 2){
          echo "Rejete<br>";
        }
      }

    }
   
    
     
    
    ?>
    

   



<?php ?>
  </ul>
</div>
            </li>
        <li><a class="" href="logout.php">Sortie</a></li>

        <li><a class="" href="home.php">Profile</a></li>
        <?php endif;?>

        <?php 

if(isset($_SESSION['email']) && isset($_SESSION['type'])):?>
   <li><a class="" href="logout.php">Sortie</a></li>
 <li><a class="" href="home_entreprise.php">Profile</a></li>
<?php endif;?>

        
        <?php if(!isset($_SESSION['email'])): ?>
          
          <li><a href="index.php">Accueil</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="login.php">Candidat</a></li>
          <li><a href="entreprise.php">Entreprise</a></li>
          <?php endif;?>
          <li><a href="offres.php">Offres</a></li>
         
         
          </li>
        </ul>
      </nav>

    </div>
  </header>