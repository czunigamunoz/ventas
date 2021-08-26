<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = '"'.$_POST['Linep'].'"';
    $Query = "INSERT INTO linea(linea) VALUES (".$Valores.")";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-lines.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>