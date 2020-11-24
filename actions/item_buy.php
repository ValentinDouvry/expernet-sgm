<?php
require_once('../secret/connect_db.php');
require_once('../classes/Item.php');
require_once('../classes/Category.php');
require_once('../classes/Inventory.php');
require_once('../classes/User.php');
session_start();

function dismount($object)
{
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

$sql = "SELECT * FROM users WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$user = $query->fetchObject('User');


if(isset($_POST['quantity']) && isset($_POST['id'])) {
    $sql = "SELECT * FROM items WHERE id=?";
    $query = $db->prepare($sql);
    $query->execute(array($_POST['id']));
    $item = $query->fetchObject('Item');

    $sql = "SELECT * FROM categories WHERE id=?";
    $query = $db->prepare($sql);
    $query->execute(array($item->getCategoryId()));
    $category = $query->fetchObject('Category');

    $sql = "SELECT * FROM inventories WHERE userId=:userID and itemId=:itemId";
    $query = $db->prepare($sql);
    $query->execute(array(':userID'=>$user->getId(),':itemId'=>$item->getId()));
    $inventory = $query->fetchObject('Inventory');
} 

else {
    header('Location:../views/shop.php?status=danger&text=erreur dans la saisie');
    exit;
}

if(!($inventory === false || $category->getIsBuyableMultiple())) {
    header('Location: ../views/shop.php?status=danger&text=Vous posseder déja cette objet');
    exit;
}

else if($_POST['quantity']*$item->getPrice() >= $user->getMoney()){
    header('Location:../views/shop.php?status=danger&text=Trop pauvre !!');
    exit;
} 

else if(!($category->getIsBuyableMultiple() || intval($_POST['quantity']) === 1)){
    header('Location:../views/shop.php?status=danger&text=Quantité incorecte');
    exit;
} 

else {

    if(!$inventory === false) {

        $sql = "UPDATE `users` SET `money`=:money WHERE id=:id";
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(":money"=>($user->getMoney() - ($_POST['quantity']*$item->getPrice())), ":id"=>$user->getId()));

        if(!$is_success) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenu, veillez réesseyer');
            exit();
        }

        $sql = "UPDATE `inventories` SET `quantity`=:quantity,`userId`=:userId,`itemId`=:itemId WHERE id=:id";
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(":quantity"=>($inventory->getQuantity() + $_POST['quantity']), ":userId"=>$user->getId(), ":itemId"=>$item->getId(), ":id"=>$inventory->getId()));
        


        if($is_success) {
            header('Location: ../views/shop.php?status=success&text=L\'achat effectuer avec success');
            exit();
        } else {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenu, veillez réesseyer');
            exit();
        }
        
    }

    else {
        $sql = "UPDATE `users` SET `money`=:money WHERE `id`=:id";
        $query = $db->prepare($sql);
        $is_success = $query->execute(array(":money"=>($user->getMoney() - ($_POST['quantity']*$item->getPrice())), ":id"=>$user->getId()));

        if(!$is_success) {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenu, veillez réesseyer');
            exit();
        }

        $inventory = new Inventory;
        $inventory->setId(NULL);
        $inventory->setIsEquipped(0);
        $inventory->setQuantity($_POST['quantity']);
        $inventory->setUserId($user->getId());
        $inventory->setItemId($item->getId());

        $sql = "INSERT INTO `inventories`(`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (:id, :isEquipped, :quantity, :userId, :itemId)";
        
        $query = $db->prepare($sql);
        $is_success = $query->execute(dismount($inventory));

        if($is_success) {
            header('Location: ../views/shop.php?status=success&text=L\'achat effectuer avec success');
            exit();
        } else {
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenu, veillez réesseyer');
            exit();
        }

       
    }

}