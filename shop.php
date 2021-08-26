<?php
    include("connectdb.php");
    $title = "The Wood Knot - Shop";
    $css = "css/shop.css";
    $js = "js/shop.js";
?>

<?php require_once('header.php'); ?>

    <main class="main">
        <div class="main-container">
            <section class="section-products">
                <div class="section-title">
                    <h2 class="title">Products</h2>
                </div>
                <div class="form-container">
                    <section class="form">                  
                        <div class="search-container">
                            <input id="textSearch" type="text" class="search" placeholder="Search...">
                            <button class="search-btn" type="button">
                                <svg class="ico ico-search" viewBox="0 0 24 24"><path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"/></svg>
                            </button>
                        </div>
                        <div class="select_menu-container">
                            <div class="select-btn">
                                <button class="btn-clean">Clean</button>
                            </div>
                            <div class="select-container">
                                <label class="select-label" for="categoria">Categories:</label>
                                <div class="select-div">
                                    <select name="categoria" id="categoria" class="select-items">
                                        <option value="all">All...</option>
                                        <?php
                                            $Connectdbase = Connect();
                                            $Query = "SELECT * FROM categoria ORDER BY categoria;";
                                            if($Result = $Connectdbase->query($Query)){
                                                while($Reg = $Result->fetch_assoc()){
                                                    echo '<option value="'.$Reg['id_categoria'].'">'.$Reg['categoria'].'</option>';
                                                }
                                                $Result->free();
                                            }
                                            $Connectdbase->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="select-container">
                                <label class="select-label" for="linea">Line:</label>
                                <div class="select-div">
                                    <select name="linea" id="linea" class="select-items">
                                        <option value="all">All...</option>
                                            <?php
                                                $Connectdbase = Connect();
                                                $Query = "SELECT * FROM linea ORDER BY linea;";
                                                if($Result = $Connectdbase->query($Query)){
                                                    while($Reg = $Result->fetch_assoc()){
                                                        echo '<option value="'.$Reg['id_linea'].'">'.$Reg['linea'].'</option>';
                                                    }
                                                    $Result->free();
                                                }
                                                $Connectdbase->close();
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="select-container">
                                <label class="select-label" for="marca">Brand:</label>
                                <div class="select-div">
                                    <select name="marca" id="marca" class="select-items">
                                        <option value="all">All...</option>
                                            <?php
                                                $Connectdbase = Connect();
                                                $Query = "SELECT * FROM marca ORDER BY marca;";
                                                if($Result = $Connectdbase->query($Query)){
                                                    while($Reg = $Result->fetch_assoc()){
                                                        echo '<option value="'.$Reg['id_marca'].'">'.$Reg['marca'].'</option>';
                                                    }
                                                    $Result->free();
                                                }
                                                $Connectdbase->close();
                                            ?>
                                    </select>
                                </div>                                
                            </div>                          
                        </div> 
                    </section>
                </div>
                <ul class="products-container">
                    <?php
                        $Connectdbase = Connect();
                        $Query = "SELECT id_producto, producto.nombre as pronom, producto.id_linea, producto.id_marca, producto.id_categoria, ";
                        $Query .= "valor_venta, foto, linea.id_linea, linea, marca.id_marca, marca, categoria.id_categoria, categoria FROM ";
                        $Query .= "producto, linea, marca, categoria WHERE producto.id_linea = linea.id_linea AND producto.id_marca = marca.id_marca AND ";
                        $Query .= "producto.id_categoria = categoria.id_categoria ORDER BY producto.nombre;";
                        if($Result = $Connectdbase->query($Query)){
                            while($Reg=$Result->fetch_assoc()){
                                $Tmp = '<li class="product-item" id="'.$Reg['id_producto'].'">';
                                    $Tmp .= '<div class="product">';
                                    $Tmp .= '<div class="img-container"><img class="img" src="' . $Reg['foto'] . '"></div>';
                                        $Tmp .= '<div class="description-container">';
                                            $Tmp .= '<h3 class="img-info">'.$Reg['pronom'].'</h3>';
                                            $Tmp .= '<p class="img-info">' .$Reg['categoria'].'</p>';
                                            $Tmp .= '<p class="img-info">' .$Reg['linea'].'</p>';
                                            $Tmp .= '<p class="img-info">' .$Reg['marca'].'</p>';
                                            $Tmp .= '<p class="img-price">$' .$Reg['valor_venta'].'</p>';
                                            $Tmp .= '<button class="add"><svg class="ico" fill-rule="evenodd" clip-rule="evenodd"><path d="M13.5 18c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm-3.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm14-16.5l-.743 2h-1.929l-3.473 12h-13.239l-4.616-11h2.169l3.776 9h10.428l3.432-12h4.195zm-12 4h3v2h-3v3h-2v-3h-3v-2h3v-3h2v3z"/></svg></button>';
                                $Tmp .= '</div></div></li>';
                                echo $Tmp;
                            }
                        }
                        $Result->free();
                        $Connectdbase->close();
                    ?>
                </ul>
            </section>
        </div>
    </main>
<?php require_once('footer.php'); ?>