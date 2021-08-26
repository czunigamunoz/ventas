<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = '"'.$_POST['Marp'].'"';
    $Query = "INSERT INTO marca(marca) VALUES (".$Valores.")";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-brands.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>