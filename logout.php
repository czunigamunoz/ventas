<?php
    session_start();
    unset($_SESSION['Ingreso']);
    session_destroy();
    header('location: index.php');
?>