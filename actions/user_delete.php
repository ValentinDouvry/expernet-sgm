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
$currentUser = $query->fetchObject('User');



if(!$currentUser->getIsAdmin()){
    header('Location:../views/profile.php');
    exit;
} 

if(!isset($_GET['id'])) {
    header('Location:../views/profile.php');
    exit;
}

$sql = "SELECT * FROM users WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_GET['id']));
$userToDelete = $query->fetchObject('User');

$sql = "SELECT * FROM inventories WHERE userId=?";
$query = $db->prepare($sql);
$query->execute(array($_GET['id']));
$inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");

if(!$inventories === false) {

    foreach ($inventories as $inventory) {


        $sql = "DELETE FROM `inventories` WHERE `userId`=:userID";
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(':userID'=>$userToDelete->getId()));
        if($is_success) {
            header('Location: ../views/groupId.php?id='.$userToDelete->getGroupId());
            exit();
        } else {
            header('Location: ../views/profileId.php?id='.$userToDelete->getId().'?status=danger&text=Une erreur est survenue, veuillez réessayer');
            exit();
        }
    }
}

$sql = "DELETE FROM `users` WHERE `id`=?";
$query = $db->prepare($sql);
$is_success = $query->execute(array($_GET['id']));

if($is_success) {
    header('Location: ../views/group.php?groupId='.$userToDelete->getGroupId());
    exit();
} else {
    header('Location: ../views/profile.php?profileId='.$userToDelete->getId().'?status=danger&text=Une erreur est survenue, veuillez réessayer');
    exit();
}