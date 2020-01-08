<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo URL; ?>public/img/logo-only.png">
    
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/typography.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/fa-all.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/fonts.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/template.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/sandhya.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/category_menu.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/adminPanel.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/flexslider.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
</head>

<body>
<?php
$lsites = array('Products' => 'products/',
               'About Us' => 'aboutus/',
               'Contact Us' => 'contactus/');
if(empty($_SESSION['username'])) {
    $rsites = array('Login'      =>'login/', 
                    'Register'  => 'register/');
} else if(isset($_SESSION['username'])) {
    $rsites = array($_SESSION['username'] =>'profile/', 
                    'Logout'  => $currentPage.'/logout');
}
?>

<!-- navigation -->
<nav class="navbar navbar-expand-lg fixedbar">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="<?php echo URL;?>home/">
            <img class="logo" alt="Logo" src="<?php echo URL; ?>public/img/logo-only.png">
            <img class="logo-text" alt="Gym Store" src="<?php echo URL; ?>public/img/logo-text.png">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbCollapse" aria-controls="nbCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="nbCollapse">
            <ul class="navbar-nav mr-auto">
            <?php foreach ($lsites as $mItem => $page) {
                    if(!strcasecmp($mItem, $currentPage)) {
                        echo '<li class="nav-item active"><a class="nav-link" href="'.URL.$page.'" >'.$mItem.'</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="'.URL.$page.'" >'.$mItem.'</a></li>';
                    }
                }
            ?>
            </ul>
            <ul class="navbar-nav mr-auto right">

            <?php
                if(isset($_SESSION['usertype'])) {
                    if($_SESSION['usertype']==1) {
                        if(!strcasecmp('Dashboard', $currentPage)) {
                            echo '<li class="nav-item active"><a class="nav-link" href="'.URL.'admin/" >DashBoard</a></li>';
                        }
                        else {
                            echo '<li class="nav-item"><a class="nav-link" href="'.URL.'admin/" >DashBoard</a></li>';
                        }
                    }
                }
                foreach ($rsites as $mItem => $page) {
                    if(!strcasecmp($mItem, $currentPage)) {
                        echo '<li class="nav-item active"><a class="nav-link" href="'.URL.$page.'" >'.$mItem.'</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="'.URL.$page.'" >'.$mItem.'</a></li>';
                    }
                }
            ?>
            </ul>
        </div>
    </div>
</nav>


<!-- Shopping Cart -->
<?php if($currentPage != 'Admin') {?>
<button type="button" onclick="shoppingCart()" class="btn btn-success sCart">
    <span class="d-lg-none">Shopping Cart</span>
    <i class="fas fa-shopping-cart"></i> 
    <span id="SCwidget">
        <span><?php
            if(isset($_SESSION['shopping_cart'])) {
                if (count($_SESSION['shopping_cart'])>0) {
                    echo count($_SESSION['shopping_cart']);
                }
            }
        ?></span>
    </span>
</button>
<?php } ?>
<div id="shoppingCart"></div>
