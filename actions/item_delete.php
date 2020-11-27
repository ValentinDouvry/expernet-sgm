<?php

require_once('../secret/connect_db.php');
require_once('../classes/User.php');
require_once('../classes/Item.php');
require_once('../classes/Inventory.php');
session_start();

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

$sql = "SELECT * FROM users WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$curentUser = $query->fetchObject('User');

if(!$curentUser->getIsAdmin()){
    header('Location:../views/shop.php');
    exit;
} 

if(!isset($_GET['id'])) {
    header('Location:../views/shop.php?status=danger&text=Erreur, veuillez sélectionner un objet à supprimer !');
    exit;
}

$sql = "SELECT * FROM inventories WHERE itemId=?";
$query = $db->prepare($sql);
$query->execute(array($_GET['id']));
$inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");

if(!$inventories === false) {

    foreach ($inventories as $inventory) {
        $sql = "SELECT * FROM users WHERE id=?";
        $query = $db->prepare($sql);
        $query->execute(array($inventory->getUserId()));
        $user = $query->fetchObject('User');

        if($user === false) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
            exit();
        }

        $sql = "SELECT * FROM items WHERE id=?";
        $query = $db->prepare($sql);
        $query->execute(array($inventory->getItemId()));
        $item = $query->fetchObject('Item');

        if($item === false) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
            exit();
        }

        $sql = 'UPDATE `users` SET `money`=:money WHERE id=:id';
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(":money"=>($user->getMoney()+$item->getPrice()), ":id"=>$user->getId()));

        if(!$is_success) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
            exit();
        }

        $sql = "DELETE FROM `inventories` WHERE `userId`=:userID and `itemId`=:itemId";
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(':userID'=>$user->getId(),':itemId'=>$item->getId()));

        if(!$is_success) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
            exit();
        }
    }
}

$sql = "DELETE FROM `items` WHERE `id`=?";
$query = $db->prepare($sql);
$is_success = $query->execute(array($_GET['id']));

if($is_success) {
    header('Location: ../views/shop.php?status=success&text=Objet supprimé !');
    exit();
} else {
    header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit();
}