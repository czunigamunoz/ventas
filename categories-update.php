<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = 'categoria="'.$_POST['Catep'].'"';
    $Query = "UPDATE categoria SET ".$Valores." WHERE id_categoria = '".$_POST['idCate']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: products-categories.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>