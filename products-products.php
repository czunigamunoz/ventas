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
    <title>The Wood Knot - Admin Products</title>
</head>

<body>
    <header class="header-window">
        <div class="header-container__window">
            <h2>The Wood Knot - Products</h2>
            <h3><?php echo $Alias ?></h3>
        </div>
    </header>
    <main class="main-window">
        <div class="main-container-window" style="width: 1200px; height: 600px;">
            <div class="title-clients">
                <h3 style="font-size: 3em;">Products</h3>
                <div class="search-container">
                    <input id="textSearch" type="text" class="search" placeholder="Search...">
                    <button class="search-btn" type="button">
                        <svg class="ico ico-search" viewBox="0 0 24 24">
                            <path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" /></svg>
                    </button>
                </div>
            </div>
            <div class="content-clients">
                <table class="table">
                    <colgroup>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                        <col class="col5">
                        <col class="col6">
                        <col class="col7">
                        <col class="col8">
                    </colgroup>
                    <thead>
                        <th class="table-head">Id Producto</th>
                        <th class="table-head">Nombre</th>
                        <th class="table-head">Categoira</th>
                        <th class="table-head">Linea</th>
                        <th class="table-head">Marca</th>
                        <th class="table-head">Especial</th>
                        <th class="table-head">Valor venta</th>
                        <th class="table-head">Costo</th>
                        <th class="table-head">Cantidad</th>
                        <th class="table-head">Foto</th>
                    </thead>
                    <tbody>
                        <?php
                        $Connectdb = Connect();
                        $Query = "SELECT id_producto, nombre, foto, categoria, linea, marca, especial, valor_venta, costo, cantidad FROM producto, categoria, linea, marca, especial WHERE producto.id_categoria = categoria.id_categoria AND producto.id_linea = linea.id_linea AND producto.id_marca = marca.id_marca AND producto.id_especial = especial.id_especial ORDER BY nombre;";
                        if ($Result = $Connectdb->query($Query)) {
                            while ($Reg = $Result->fetch_assoc()) {
                                $Tmp = '<tr class="table-row">';
                                $Tmp .= '<td class="table-data">' . $Reg['id_producto'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['nombre'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['categoria'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['linea'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['marca'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['especial'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['valor_venta'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['costo'] . '</td>';
                                $Tmp .= '<td class="table-data">' . $Reg['cantidad'] . '</td>';
                                $Tmp .= '<td class="table-data"><img class="img" src="' . $Reg['foto'] . '"></td>';
                                echo $Tmp;
                            }
                            $Result->free();
                        }
                        $Connectdb->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="btn-container">
                <button onclick="window.close()" class="close-window">close</button>
            </div>
        </div>
    </main>
    <script src="js/admin.js"></script>
</body>

</html>