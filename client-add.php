<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = '"'.$_POST['Tipoc'].'"';
    $Query = "INSERT INTO tipo_cliente(tipo) VALUES (".$Valores.")";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: admin-clients.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>