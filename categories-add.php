<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = '"'.$_POST['Catep'].'"';
    $Query = "INSERT INTO categoria(categoria) VALUES (".$Valores.")";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-categories.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>