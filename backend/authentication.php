<?php
    require_once('../configs/connection.php');
    require_once('../models/client.class.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_login = $connection->query("SELECT * FROM clients WHERE email = '$email' AND password = '$password'");

    if($sql_login->rowCount() > 0) {
        $row = $sql_login->fetch();
        header("location: ../home.php?id=" . $row['id']);
    
    } else {
        echo "
        <script>
            alert('User not found...');
            window.location.href='../signin.php';
        </script> ";
    }
?>