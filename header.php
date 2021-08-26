<?php
    require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript">
    if(history.forward(1))
        location.replace(history.forward(1));
</script> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="<?php css(); ?>">
    <title> <?php title(); ?> </title>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="menu-mobile">
                <svg id="menu-ico" class="ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" /></svg>
                <h1 id="btnMobile" class="header-text menu-title">The Wood Knot</h1>
                <svg class="ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" /></svg>
            </div>
            <nav>
                <div class="menu-container">
                    <div class="menu-desktop">
                        <div class="logo">
                            <span id="logo-text" class="logo-text">WK</span>
                        </div>
                        <div class="title-container">
                            <h1 id="btnDesktop" class="header-text menu-title">The Wood Knot</h1>
                            <span class="header-text logo__cursive">Refinished furniture for the modern home</span>
                        </div>
                    </div>
                    <ul id="menu-main" class="menu-main">
                        <li class="menu-item">
                            <a href="index.php" class="menu-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="shop.php" class="menu-link">Shop</a>
                        </li>
                        <li class="menu-item">
                            <a href="about.php" class="menu-link">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="policies.php" class="menu-link">Policies</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>