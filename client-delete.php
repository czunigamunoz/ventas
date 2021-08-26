<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Query = "DELETE FROM tipo_cliente WHERE id_tipo = '".$_GET['Tipoid']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: admin-clients.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>