<?php
include_once "../db/conn.php";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $select = mysqli_query($conn,"SELECT * FROM `offres` WHERE  nom_du_travail LIKE '%$search%' or salaire LIKE '%$search%' OR localisation LIKE '%$search%' ");

}

?>

<div class="" id="display">

     <?php $select = mysqli_query($conn,"SELECT * FROM `offres` WHERE  nom_du_travail LIKE '%$search%' or salaire LIKE '%$search%' OR localisation LIKE '%$search%' ");
                
                while($row = mysqli_fetch_assoc($select)){
                ?>
              <div class="col-lg-6">
          <div class="card-group">
  <div class="card">
    <img src="assets/img/offre-demploi.jpg" class="card-img-top" width="50" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $row['nom_du_travail'] . "  ". $row['salaire'] ;?>Da / mois</h5>
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
      </div>
 
    </div>
  </div>
  
  
  
</div>

</div>
<?php }  ?>


