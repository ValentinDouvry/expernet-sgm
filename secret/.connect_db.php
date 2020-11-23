<?php

    // template pour la connexion a la base de données 
    // Faite une copie de ce fichier sans le point au commencement du fichier

    $host = 'localhost';
    $dbname = 'expernet-sgm';
    $user = '';
    $pass = '';


    $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    if($db == false){
        echo "erreur lors de la connexion avec la base";
    }

    
?>