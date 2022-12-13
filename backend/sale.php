<?php
    require_once('../configs/connection.php');
    require_once('../models/shopping_cart.class.php');

    $client_id = $_GET['client_id'];
    $product_id = $_GET['product_id'];
    $quantity = $_POST['quantity'];

    ShoppingCart::addProduct($connection, $client_id, $product_id, $quantity);

    header('location: ../home.php?id=' . $client_id);
?>