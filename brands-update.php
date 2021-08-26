<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = 'marca="'.$_POST['Marp'].'"';
    $Query = "UPDATE marca SET ".$Valores." WHERE id_marca = '".$_POST['idMar']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-brands.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>