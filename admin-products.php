<?php
session_start();
$Usuario = $_SESSION['idUsuario'];
$Email = $_SESSION['emailUsuario'];
$Alias = $_SESSION['alias'];
$Perfil = $_SESSION['idPerfil'];
$_SESSION['pagina'] = "admin.php";
if ($Perfil != "p0" && $Perfil != "p1" && $Perfil != "p2") {
    header('location: index.php');
    exit;
}
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
    <title>The Wood Knot - Admin Panel</title>
</head>

<body>
    <header class="header">
        <div class="title-container">
            <h1>Admin Panel - The Wood Knot</h1>
        </div>
        <div class="logout-container">
            <a href="logout.php" class="btn-logout">Log Out</a>
        </div>
    </header>
    <nav class="nav">
        <div class="img-profile">
            <img src="assets/img/about/photo3.jpg" alt="">
            <h3><?php echo $Alias ?></h3>
        </div>
        <ul class="menu-main">
            <li class="menu-item">
                <a href="admin.php" class="menu-link">Home
                    <img src="assets/icon/home.png" alt="">
                </a>
            </li>
            <li class="menu-item">
                <a onclick='winOpen("admin-clients.php")' class="menu-link">Clients
                    <img src="assets/icon/user.png" alt="">
                </a>
            </li>
            <li class="menu-item">
                <a href="admin-products.php" class="menu-link">Products
                    <img src="assets/icon/product.png" alt="">
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">Images
                    <img src="assets/icon/img.png" alt="">
                </a>
            </li>
        </ul>
    </nav>
    <div class="content">
        <section class="products-container">
            <div class="products-btns">
                <button class="btn" onclick='winOpen("products-products.php", "width=1300, height=800")'>View Products</button>
                <button class="btn" onclick='winOpen("products-categories.php")'>Categories</button>
                <button class="btn" onclick='winOpen("products-lines.php")'>Lines</button>
                <button class="btn" onclick='winOpen("products-brands.php")'>Brands</button>
            </div>
        </section>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>