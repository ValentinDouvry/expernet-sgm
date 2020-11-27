<?php

require_once('../secret/connect_db.php');
require_once('../classes/Item.php');
require_once('../classes/Inventory.php');

session_start();

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 


if(!isset($_GET['id']) || $_GET['id']===""){
    header('Location:../views/profile.php');
    exit;
} 


$sql = ("SELECT * FROM `items` WHERE `id`=:id");
$query = $db->prepare($sql);
$query->execute(array(":id" => $_GET['id']));
$itemToEquipped = $query->fetchObject("Item");


if($itemToEquipped===false) {
    header("Location:../views/profile.php?status=danger&text=Erreur l'objet sélectionné n'existe pas");
    exit;
}


$sql = ("SELECT * FROM `inventories` WHERE `userId`=:userId");
$query = $db->prepare($sql);
$query->execute(array(":userId" => $_SESSION['userId']));
$inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");




foreach($inventories as $inventory) {
    if($inventory->getIsEquipped()) {

        $sql = ("SELECT * FROM `items` WHERE `id`=:id");
        $query = $db->prepare($sql);
        $query->execute(array(":id" => $inventory->getItemId()));
        $item = $query->fetchObject("Item");

        if($itemToEquipped->getCategoryId() === $item->getCategoryId()) {
            var_dump($item);
            $sql = ("UPDATE `inventories` SET `isEquipped`=0 WHERE `id`=?");
            $query = $db->prepare($sql);
            $is_valid = $query->execute(array($inventory->getId()));

            if(!$is_valid){
                header('Location:../views/profile.php?status=danger&text=Erreur !');
            }

        }
    }
}

$sql = ("UPDATE `inventories` SET `isEquipped`=1 WHERE `userId`=:userId AND `itemId`=:itemId");
$query = $db->prepare($sql);
$is_valid = $query->execute(array(":itemId"=>$itemToEquipped->getId(), ":userId"=>$_SESSION['userId']));

if($is_valid) {
    header("Location:../views/profile.php?status=success&text=Objet équipé !");
} 
else {
    header('Location:../views/profile.php?status=danger&text=Erreur !');
}