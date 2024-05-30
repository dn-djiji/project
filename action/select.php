<?php 
include_once "../db/conn.php";
if(isset($_POST['select']) && isset($_POST['id'])){
    $select = $_POST['select'];
    $id = $_POST['id'];

    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }

    $update = mysqli_query($conn,"UPDATE `orders` SET `status`='$select' ,date_ent = '$date' WHERE id=  '$id'");

}