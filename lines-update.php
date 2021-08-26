<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = 'linea="'.$_POST['Linep'].'"';
    $Query = "UPDATE linea SET ".$Valores." WHERE id_linea = '".$_POST['idLine']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-lines.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>