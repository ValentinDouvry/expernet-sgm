<?php

    include ("../secret/connect_db.php");

    $itemId = Null;
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemImage = $_POST['itemImage'];
    $isDesactivated = 0;
    $categoryName = $_POST['categoryName'];
    if((isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage !="") && (isset($categoryName) && $categoryName !="")){
    
    }else{

    }
?>