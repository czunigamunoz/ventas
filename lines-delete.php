<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Query = "DELETE FROM linea WHERE id_linea = '".$_GET['Lineid']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-lines.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>