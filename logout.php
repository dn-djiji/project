<?php 
session_start();
session_unset();
session_destroy();
unset($_SESSION['role']);
header('location:index.php');