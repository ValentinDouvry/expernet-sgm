<?php

require_once('../secret/connect_db.php');
session_start();

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

if(!isset($_GET['id']) || $_GET['id']===""){
    header('Location:../views/profile.php');
    exit;
} 



$sql = ("UPDATE `inventories` SET `isEquipped`=0 WHERE `userId`=:userId AND `itemId`=:itemId");
$query = $db->prepare($sql);
$is_valid = $query->execute(array(":itemId"=>$_GET['id'], ":userId"=>$_SESSION['userId']));

if($is_valid) {
    header('Location:../views/profile.php?status=success&text=l\'objet equiper');
} 
else {
    header('Location:../views/profile.php?status=danger&text=erreur');
}

var_dump($_GET);