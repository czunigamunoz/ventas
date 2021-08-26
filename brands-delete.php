<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Query = "DELETE FROM marca WHERE id_marca = '".$_GET['Marid']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-brands.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>