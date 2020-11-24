<?php
    include ("../secret/connect_db.php");
    include ("../classes/Category.php");
    include ("../classes/Item.php");

    $itemId = Null;
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemImage = $_POST['itemImage'];
    $isDesactivated = 0;
    $categoryName = $_POST['categoryName'];

    if((isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage !="") && (isset($categoryName) && $categoryName !="")){
        //récupération de l'id de la catégorie
        $query = $db->prepare("SELECT id FROM categories WHERE name = :name");
        $query->bindParam(":name",$categoryName);
        $query->execute();
        $data = $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        $categoryId = $data['id'];

        $query = $db->prepare("INSERT INTO items (id,name,price,imageName,isDesactivated,categoryId) Values (:id,:name,:price,:imageName,:isDesactivated,:categoryId)");
        
        $query->bindParam(":id",$itemId);
        $query->bindParam(":name",$itemName);
        $query->bindParam(":price",$itemPrice);
        $query->bindParam(":imageName",$itemImage);
        $query->bindParam(":isDesactivated",$isDesactivated);
        $query->bindParam(":categoryId",$categoryId);
        $result = $query->execute();
        // if(!$result){
        //     header('Location : ../views/form_add_item.php?err=erreur lors de votre ajout');
            
        // }else{
        //     header('Location : ../views/shop.php');
        // }
        
    }else{
        //header('Location : ../views/form_add_item.php?err=erreur lors de votre ajout');
    }
?>