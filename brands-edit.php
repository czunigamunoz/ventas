<?php
session_start();
$Usuario = $_SESSION['idUsuario'];
$Email = $_SESSION['emailUsuario'];
$Alias = $_SESSION['alias'];
$Perfil = $_SESSION['idPerfil'];
$Pagina = $_SESSION['pagina'];
if ($Perfil != "p0" && $Perfil != "p1" && $Perfil != "p2") {
    header('location: index.php');
    exit;
}
include("connectdb.php");
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript">
    if (history.forward(1))
        location.replace(history.forward(1));
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>The Wood Knot - Brands - Edit</title>
</head>

<body>
    <header class="header-window">
        <div class="header-container__window">
            <h2>The Wood Knot - Brands</h2>
            <h3><?php echo $Alias ?></h3>
        </div>
    </header>
    <main class="main-window">
        <div class="main-container-window">
            <div class="title-clients">
                <h3>Brands - Edit</h3>
                <img class="img-ico" src="assets/icon/product.png">
            </div>
            <?php
                $Connectdb = Connect();
                $Query = "SELECT * FROM marca WHERE id_marca = '".$_GET['Marid']."' LIMIT 1";
                $Result = $Connectdb->query($Query);
                $Reg = $Result->fetch_assoc();
                $Result->free();
                $Connectdb->close();                
            ?>
            <div class="content-clients">
                <form class="form" action="brands-update.php" method="POST">
                    <div class="form-input">
                        <label for="idMar" class="label">Id marca: </label>
                        <input class="input" type="text" name="idMar" value='<?php echo $Reg['id_marca'] ?>' readonly>
                    </div>
                    <div class="form-input">
                        <label for="Marp" class="label">Marca: </label>
                        <input class="input" type="text" name="Marp" value='<?php echo $Reg['marca'] ?>' required>
                    </div>
                    <div class="form-buttons">
                        <input type="submit" name="ok" class="btn" value="ok">
                        <input type="button" class="btn" onclick="location.href='products-brands.php'" value="cancel">
                    </div>
                </form>
            </div>
            <div class="btn-container">
                <button onclick="window.close()" class="close-window">close</button>
            </div>
        </div>
    </main>
</body>

</html>