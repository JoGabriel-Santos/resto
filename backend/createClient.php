<?php
    require_once('../configs/connection.php');
    require_once('../models/client.class.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Client::createClient($connection, $name, $email, $password);

    header('Location: ../signin.php');
?>