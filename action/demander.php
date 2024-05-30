<?php 
include_once "../db/conn.php";

if(isset($_GET['id']) && isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $get_cv = mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$email' LIMIT 1");
    while($row = mysqli_fetch_assoc($get_cv)){
        $cv = $row['cv'];
    }
    $id_offer = $_GET['id'];
    $select = mysqli_query($conn,"SELECT * FROM `offres` WHERE id = '$id_offer' LIMIT 1");
    while($row = mysqli_fetch_assoc($select)){
       
        $nom_du_travail = $row['nom_du_travail'];
        $salaire = $row['salaire'];
        $localisation = $row['localisation'];
        $start = $row['start'];
        $end = $row['end'];
        $description = $row['description'];
        $email_entreprise = $row['email'];
        $insert = mysqli_query($conn,"INSERT INTO `orders`(`cv`, `email`, `id_offer`, `nom_du_travail`, `salaire`, `localisation`, `start`, `end`, `description`, `email_entreprise`) 
        VALUES ('$cv','$email','$id_offer','$nom_du_travail','$salaire','$localisation','$start','$end','$description','$email_entreprise')");
        $_SESSION['error'] = "La demande a été envoyée, veuillez patienter";
        header('location:../offres.php');

    }



   
}


?>