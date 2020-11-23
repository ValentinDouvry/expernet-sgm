<?php

    session_start();
    include ("secret/connect_db.php");

    $login = $_POST['login'];
    $password = $_POST['password'];
    if((isset($login) && ($login != "")) && (isset($password) && ($password != ""))){
        $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindParam(":username",$login);
        $query->bindParam(":password",$password);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        if($data != ""){
            $_SESSION['userId'] = $data['username'];
            header('Location:index.php');
        }else{
            header('Location:log_in.php?err=Identifiant ou Mot de Passe Incorrecte');
        }
    }
?>