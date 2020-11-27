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
    header('Location:../views/profile.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit;
}

if(!isset($_POST['id']) || !isset($_POST['password1']) || !isset($_POST['password2']) || $_POST['id'] === "" || $_POST['password1'] === "" || $_POST['password2'] === "") {
    header('Location:../views/profile.php?status=danger&text=Erreur est survenue, veuillez réessayer !');
    exit;
}

if((!isset($_POST['oldPassword']) || $_POST['oldPassword'] === "") && !$currentUser->getIsAdmin()) {
    header('Location:../views/profile.php?status=danger&text=Erreur est survenue, veuillez réessayer !');
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
    header('Location:../views/profile.php?status=danger&text=Erreur est survenue, veuillez réessayer !');
    exit;
}

if($pass1 === $oldPass && $pass2 === $oldPass) {
    header("Location:../views/profile.php?profileId=".$userToModifyId."&status=warning&text=Erreur, le nouveau mot de passe et l'ancien doivent être différents !");
    exit;
}

if($pass1 !== $pass2) {
    header("Location:../views/profile.php?profileId=".$userToModifyId."&status=danger&text=Erreur, les mots de passe ne sont pas identiques !");
    exit;
}

if(!password_verify($oldPass, $userToModify->getPassword()) && !$currentUser->getIsAdmin()) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=danger&text=Erreur, mot de passe incorrect !');
    exit;
}


$sql = "UPDATE `users` SET `password`= :password WHERE id= :id";
$query = $db->prepare($sql);
$is_valide = $query->execute(array(":password"=>password_hash($pass1, PASSWORD_ARGON2I), ":id"=>$userToModify->getId()));

if($is_valide) {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=success&text=Mot de passe mis à jour !');
    exit;
} 
else {
    header('Location:../views/profile.php?profileId='.$userToModifyId.'&status=danger&text=Erreur est survenue, veuillez réessayer !');
    exit;
}
