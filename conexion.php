<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'comunicados';

    $conn = mysqli_connect($server, $user, $pass, $db);

    if($conn){
        echo "OK"; 
    }