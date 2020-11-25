<?php

    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location:../index.php');
    }
    include ("../secret/connect_db.php");
    include ("../classes/Category.php");

    
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemImage = $_POST['itemImage'];
    $categoryName = $_POST['categoryName'];
 

    $query = $db->prepare("SELECT id FROM categories where name = :name");
    $query->bindParam(":name",$categoryName);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_CLASS,'Category');
    $data = $query->fetch();
    $categoryId = $data->getId();

    //si il a changer d'image:
    if((isset($itemId) && $itemId != 0) && (isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage !="") && (isset($categoryName) && $categoryName !="")){
    
        $query = $db->prepare("UPDATE `items` SET `name` = :name,`price` = :price,`imageName` = :imageName,`categoryId` = :categoryId WHERE `id` = :id");
        $query->bindParam(":id",$itemId);
        $query->bindParam(":name",$itemName);
        $query->bindParam(":price",$itemPrice);
        $query->bindParam(":imageName",$itemImage);
        $query->bindParam(":categoryId",$categoryId);
        $query->execute();

    //si il n'a pas chanegr d'image :
    }elseif((isset($itemId) && $itemId != 0) && (isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage == "") && (isset($categoryName) && $categoryName !="")){

        $query = $db->prepare("UPDATE `items` SET `name` = :name,`price` = :price,`categoryId` = :categoryId WHERE `id` = :id");
        $query->bindParam(":id",$itemId);
        $query->bindParam(":name",$itemName);
        $query->bindParam(":price",$itemPrice);
        $query->bindParam(":categoryId",$categoryId);
        $query->execute();

        header('Location: ../views/shop.php');
    }else{
        header('Location: ../views/form_update_item.php?err=erreur lors de votre modification');
    }
?>