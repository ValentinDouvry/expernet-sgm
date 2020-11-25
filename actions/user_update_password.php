<?php

require_once('../secret/connect_db.php');
require_once('../classes/User.php');
session_start();

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

$currentUserId = $_SESSION['userId'];
$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($currentUserId));
$currentUser = $query->fetchObject("User");

if($currentUser===false) {
    header('Location:../views/profile.php?status=danger&text=probleme pour l\'utilisateur');
    exit;
}

if(!isset($_POST['id']) || !isset($_POST['password1']) || !isset($_POST['password2']) || $_POST['id'] === "" || $_POST['password1'] === "" || $_POST['password2'] === "") {
    header('Location:../views/profile.php?status=danger&text=il exite des champs vide');
    exit;
}

if((!isset($_POST['oldPassword']) || $_POST['oldPassword'] === "") && !$currentUser->getIsAdmin()) {
    header('Location:../views/profile.php?status=danger&text=il exite des champs vide');
    exit;
} else {
}


$userToModifyId = $_POST['id'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

if($currentUser->getIsAdmin()) {
    $oldPass = "vide";
}else {
    $oldPass = $_POST['oldPassword'];
}


$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($userToModifyId));
$userToModify = $query->fetchObject("User");


if($userToModify===false) {
    header('Location:../views/profile.php?status=danger&text=user n\'existe pas');
    exit;
}

if($pass1 === $oldPass && $pass2 === $oldPass) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=warning&text=c\'est le meme mot de passe');
    exit;
}

if($pass1 !== $pass2) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=danger&text=Les mot de passe entre ne sont pas identique');
    exit;
}

if(!password_verify($oldPass, $userToModify->getPassword()) && !$currentUser->getIsAdmin()) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=danger&text=Mauvais mot de passe');
    exit;
}


$sql = "UPDATE `users` SET `password`= :password WHERE id= :id";
$query = $db->prepare($sql);
$is_valide = $query->execute(array(":password"=>password_hash($pass1, PASSWORD_ARGON2I), ":id"=>$userToModify->getId()));

if($is_valide) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=success&text=OK');
    exit;
} 
else {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=danger&text=une erreur est survenu');
    exit;
}
