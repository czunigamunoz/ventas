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
    <title>The Wood Knot - Admin Clients</title>
</head>

<body>
    <header class="header-window">
        <div class="header-container__window">
            <h2>The Wood Knot - Clients</h2>
            <h3><?php echo $Alias ?></h3>
        </div>
    </header>
    <main class="main-window">
        <div class="main-container-window">
            <div class="title-clients">
                <h3>Types of Clients</h3>
                <img onclick="location.href = 'client-new.php'" class="add" src="assets/icon/user_add.png">
            </div>
            <div class="content-clients">
                <table class="table">
                    <colgroup>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                    </colgroup>
                    <thead>
                        <th class="table-head">Id Tipo</th>
                        <th class="table-head">Tipo</th>
                        <th class="table-head">Edit</th>
                        <th class="table-head">Delete</th>
                    </thead>
                    <tbody>
                        <?php
                            $Connectdb = Connect();
                            $Query = "SELECT * FROM tipo_cliente ORDER BY tipo";
                            if($Result = $Connectdb->query($Query)){
                                while($Reg = $Result->fetch_assoc()){
                                    $Tmp = '<tr class="table-row">';
                                        $Tmp .= '<td class="table-data">'.$Reg['id_tipo'].'</td>';
                                        $Tmp .= '<td class="table-data">'.$Reg['tipo'].'</td>';
                                        $Tmp .= '<td class="table-data"><a href="client-edit.php?Tipoid='.$Reg['id_tipo'].'">';
                                        $Tmp .= '<img src="assets/icon/edit.png" class="img-data"></a></td>';
                                        $Tmp .= '<td class="table-data"><a href="client-delete.php?Tipoid='.$Reg['id_tipo'].'">';
                                        $Tmp .= '<img src="assets/icon/delete.png" class="img-data" onclick="return deleteItem()"></a></td>';
                                    $Tmp .= '</tr>';
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