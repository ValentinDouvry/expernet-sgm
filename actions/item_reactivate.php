<?php

require_once('../secret/connect_db.php');
require_once('../classes/User.php');
session_start();


if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

$sql = "SELECT * FROM users WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$user = $query->fetchObject('User');

if(!$user->getIsAdmin()){
    header('Location:../views/shop.php');
    exit;
} 

if(!isset($_GET['id'])) {
    header('Location:../views/shop.php?status=danger&text=Erreur, veuillez sélectionner un objet à réactiver !');
    exit;
}

$sql = "UPDATE `items` SET `isDesactivated`=0 WHERE `id`=?";
$query = $db->prepare($sql);
$is_success = $query->execute(array($_GET['id']));

if($is_success) {
    header('Location: ../views/shop.php?status=success&text=Objet réactivé !');
    exit();
} else {
    header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit();
}