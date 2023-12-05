<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

//shopping cart counter
$count = 0;
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];

    if($cart){
        $count = array_sum($cart);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="www/css/styles.css" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
</head>
<body>
<div class="site-wrapper">
    <nav>
        <a href="index.php" class="logo"
        ><img src="www/images/logo3.png" /> Plate<span>ful</span></a
        >

        <div class="left-nav">
            <a href="meals.php">Meals</a>
            <a href="contact.php">Contact</a>
            <a href="shoppingcart.php"
            ><i class="fa-solid fa-cart-shopping"></i
                ></a>
            <a href="loginform.php" class="login"><span>Login</span></a>
        </div>
    </nav>
    <div class="body-wrapper">