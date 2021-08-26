<?php
    include("connectdb.php");
    $title = "The Wood Knot - Home";
    $css = "css/styles.css";
    $js = "js/index.js";
?>

<?php require_once('header.php'); ?>

<main class="main">
        <section class="section-slide">
            <div class="slide-container">
                <img class="img img-slide">
            </div>
        </section>
        <div class="main-container">
            <section class="section-popular">
                <div class="section-title">
                    <h2 class="title">Our Designer´s Favorite</h2>
                </div>
                <ul class="popular-container">
                    <?php
                    $Connectbase = Connect();
                    $Query = "SELECT nombre, valor_venta, foto, marca, linea, categoria FROM producto, especial, linea, marca, categoria ";
                    $Query .= "WHERE producto.id_linea = linea.id_linea AND producto.id_marca = marca.id_marca AND producto.id_categoria = categoria.id_categoria ";
                    $Query .= "AND producto.id_especial = especial.id_especial AND especial.id_especial =2";
                    if ($Result = $Connectbase->query($Query)) {
                        while ($Reg = $Result->fetch_assoc()) {
                            $Tmp = '<li class="popular-item">';
                            $Tmp .= '<div class="popular-link">';
                            $Tmp .= '<div class="img-container"><img class="img" src="' . $Reg['foto'] . '"></div>';
                            $Tmp .= '<div class="description-container">';
                            $Tmp .= '<h3 class="img-title">' . $Reg['nombre'] . '</h3>';
                            $Tmp .= '<p class="img-title">' . $Reg['categoria'] . '</p>';
                            $Tmp .= '<p class="img-title">' . $Reg['linea'] . '</p>';
                            $Tmp .= '<p class="img-title">' . $Reg['marca'] . '</p>';
                            $Tmp .= '<p class="img-info">$' . $Reg['valor_venta'] . '</p>';
                            $Tmp .= '<button class="add">Add</button>';
                            $Tmp .= '</div></div></li>';
                            echo $Tmp;
                        }
                    }
                    $Result->free();
                    $Connectbase->close();
                    ?>
                </ul>
            </section>
            <section class="section-new">
                <div class="section-title">
                    <h2 class="title">New Arrivals!</h2>
                </div>
                <ul class="new-container">
                    <?php
                        $Connectbase = Connect();
                        $Query = "SELECT nombre, valor_venta, foto, marca, linea, categoria FROM producto, especial, linea, marca, categoria ";
                        $Query .= "WHERE producto.id_linea = linea.id_linea AND producto.id_marca = marca.id_marca AND producto.id_categoria = categoria.id_categoria ";
                        $Query .= "AND producto.id_especial = especial.id_especial AND especial.id_especial =3";
                        if ($Result = $Connectbase->query($Query)) {
                            while ($Reg = $Result->fetch_assoc()) {
                                $Tmp = '<li class="new-item">';
                                $Tmp .= '<div class="new-link">';
                                $Tmp .= '<div class="img-container"><img class="img" src="' . $Reg['foto'] . '"></div>';
                                $Tmp .= '<div class="description-container">';
                                $Tmp .= '<h3 class="img-title">' . $Reg['nombre'] . '</h3>';
                                $Tmp .= '<p class="img-title">' . $Reg['categoria'] . '</p>';
                                $Tmp .= '<p class="img-title">' . $Reg['linea'] . '</p>';
                                $Tmp .= '<p class="img-title">' . $Reg['marca'] . '</p>';
                                $Tmp .= '<p class="img-info">$' . $Reg['valor_venta'] . '</p>';
                                $Tmp .= '<button class="add">Add</button>';
                                $Tmp .= '</div></div></li>';
                                echo $Tmp;
                            }
                        }
                        $Result->free();
                        $Connectbase->close();
                    ?>
                </ul>
            </section>
            <section class="section-contact">
                <h2 class="title form-title">Contact Us</h2>
                <div class="info-form-container">
                    <div class="contact-info">
                        <p>The Wood Knot Furniture</p>
                        <p>Concord, CA 94518</p>
                        <p>Email: info@thewoodknotfurniture.com</p>
                        <p>Phone: (925) 705-1830</p>
                        <div class="map-container">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d393.11972727458647!2d-122.03115837467482!3d37.978113710777734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808562f77d3e8177%3A0x218d1736ee0681ef!2sThe%20Wood%20Knot%20Furniture!5e0!3m2!1ses-419!2sco!4v1597946225086!5m2!1ses-419!2sco" width="400" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <form action="#" class="form">
                            <div class="form-section">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-input">
                            </div>
                            <div class="form-section">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-input">
                            </div>
                            <div class="form-section">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" class="form-input">
                            </div>
                            <div class="form-section">
                                <label for="phone" class="form-label">Phone No.</label>
                                <input type="text" id="phone" class="form-input">
                            </div>
                            <div class="form-section">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" class="form-message"></textarea>
                            </div>
                            <input type="submit" class="form-summit" value="Send">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php require_once('footer.php'); ?>