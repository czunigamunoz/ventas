<?php
    include("connectdb.php");
    $Connectdb = Connect();

    $Valores = 'tipo="'.$_POST['Tipoc'].'"';
    $Query = "UPDATE tipo_cliente SET ".$Valores." WHERE id_tipo = '".$_POST['idTipo']."'";
    if($Exito = $Connectdb->query($Query)){
        $Connectdb->close();
        header('location: admin-clients.php');
    }else{
        $Connectdb->close();
        var_dump($Query);
        exit;
    }
?>