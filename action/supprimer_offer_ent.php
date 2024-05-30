<?php 
include_once "../db/conn.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $delete = mysqli_query($conn,"DELETE FROM `offres` WHERE id = '$id'");
    header('location:../home_admin.php');
}


?>