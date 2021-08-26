<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Query = "DELETE FROM categoria WHERE id_categoria = '".$_GET['Cateid']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-categories.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>