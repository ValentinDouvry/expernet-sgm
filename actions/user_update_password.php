<?php

require_once('../secret/connect_db.php');
require_once('../classes/User.php');
session_start();


if(!isset($_POST['id']) || !isset($_POST['oldPassword']) || !isset($_POST['password1']) || !isset($_POST['password2']) || $_POST['id'] === "" || $_POST['oldPassword'] === "" || $_POST['password1'] === "" || $_POST['password2'] === "") {
    header('Location:../views/profile.php?status=danger&text=il exite des champs vide');
    exit;
}


$userId = $_POST['id'];
$oldPass = $_POST['oldPassword'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_POST['id']));
$user = $query->fetchObject("User");

if($user===false) {
    header('Location:../views/profile.php?status=danger&text=user n\'existe pas');
    exit;
}

if($pass1 === $oldPass && $pass2 === $oldPass) {
    header('Location:../views/profile.php?status=warning&text=c\'est le meme mot de passe');
    exit;
}

if($pass1 !== $pass2) {
    header('Location:../views/profile.php?status=danger&text=Les mot de passe entre ne sont pas identique');
    exit;
}

if(!password_verify($oldPass, $user->getPassword())) {
    header('Location:../views/profile.php?status=danger&text=Mauvais mot de passe');
    exit;
}


$sql = "UPDATE `users` SET `password`= :password WHERE id= :id";
$query = $db->prepare($sql);
$is_valide = $query->execute(array(":password"=>password_hash($pass1, PASSWORD_ARGON2I), ":id"=>$user->getId()));

if($is_valide) {
    header('Location:../views/profile.php?status=success&text=OK');
    exit;
} 
else {
    header('Location:../views/profile.php?status=danger&text=une erreur est survenu');
    exit;
}
