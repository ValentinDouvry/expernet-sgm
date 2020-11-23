<?php

    $host = 'localhost';
    $dbname = 'expernet-sgm';
    $user = 'root';
    $pass = '';


    $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    if($db == false){
        echo "erreur lors de la connexion avec la base";
    }

    
?>