<?php 
    session_start() ;
    require_once 'db.php';

    if(isset($_SESSION['username'])){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>