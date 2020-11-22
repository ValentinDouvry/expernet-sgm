<?php

    session_start();
    include ("secret/connect_db.php");
    
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if((!isset($login) || ($login == "")) && (!isset($password) || ($password == ""))){
        header('Location:log_in.php?err=Veuillez remplir les champs Identifiant et Mot de Passe');
    }else{
        $query = $db->query("SELECT * FROM user WHERE userName = '$login' AND password = '$password'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        if($data != ""){
            //echo "connexion effectué </br>";
            //echo "Bienvenue : ".$data['userName'];
            $_SESSION['userConnected'] = $data['userName'];
            header('Location:index.php');
        }else{
            header('Location:log_in.php?err=Identifiant ou Mot de Passe Incorrecte');
        }
    }
?>