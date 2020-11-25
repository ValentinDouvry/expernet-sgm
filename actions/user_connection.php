<?php

require_once("../secret/connect_db.php");
require_once("../classes/User.php");
session_start();

    if((isset($_POST['login']) && ($_POST['login'] !== "")) && (isset($_POST['password']) && ($_POST['password'] !== ""))){
        $login = $_POST['login'];
        $password = $_POST['password'];


        $query = $db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username",$login);
        $query->execute();
        $user = $query->fetchObject("User");
        
        if($user===false) {
            header('Location:../views/log_in.php?status=danger&text=ce pseudo n\'existe pas');
            exit;
        }

        if(password_verify($password, $user->getPassword())){
            $_SESSION['userId'] = $user->getId();
            header('Location: ../views/profile.php');
            exit;
        }

        else{
            header('Location:../views/log_in.php?status=danger&text=Mot de passe incorrecte');
            exit;
        }

    } else {
        header('Location:../views/log_in.php?status=danger&text=Mot de passe ou nom d\'utilisateur vide');
    }
