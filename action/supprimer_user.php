<?php 
include_once "../db/conn.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $delete = mysqli_query($conn,"DELETE FROM `users` WHERE id = '$id'");
    header('location:../home_admin.php');
}


?>