<?php
    require_once('../configs/connection.php');
    require_once('../models/client.class.php');
    require_once('../models/shopping_cart.class.php');

    $client_id = $_GET['client_id'];

    ShoppingCart::emptyShoppingCart($connection, $client_id);

    echo "
        <script>
            alert('Completed purchase...');
            window.location.href='../home.php?id=$client_id';
        </script> "
?>