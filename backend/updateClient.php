<?php
    require_once('../configs/connection.php');
    require_once('../models/client.class.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Client::updateClient($connection, $id, $name, $email, $password);
    
    header('Location: ../signin.php');
?>