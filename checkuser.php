<?php
    session_start();
    $_SESSION['idUsuario'] = "";
    $_SESSION['emailUsuario'] = "";
    $_SESSION['alias'] = "";
    $_SESSION['idPerfil'] = "";
    $_SESSION['pagina'] = "";
    $_SESSION['pagina2'] = "";
    $_SESSION['foto'] = "";
    $_SESSION['idProd'] = "";
    include("connectdb.php");
    $Connectdb = Connect();
    $Usser = $_POST['email'];
    $Password = $_POST['password'];
    $Query = "SELECT * FROM usuario WHERE email = '".$Usser."'";

    if($Result = $Connectdb->query($Query)){
        $fila = $Result->fetch_assoc();
        if($Password == $fila['clave']){
            $_SESSION['idUsuario'] = $fila['id_usuario'];
            $_SESSION['emailUsuario'] = $fila['email'];
            $_SESSION['alias'] = $fila['alias'];
            $_SESSION['idPerfil'] = $fila['id_perfil'];
            $Result->free();
            $Connectdb->close();
            header('location: admin.php');
        }else {
            $Result->free();
            $Connectdb->close();
            header('location: index.php');
        }
    }else {
        mysqli_close($Connectdb);
        header('location: index.php');
    }
?>