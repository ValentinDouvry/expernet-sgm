<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location:../index.php');
    }
    require_once('../secret/connect_db.php');

    $categoryId = NULL;
    $categoryName = $_POST['categoryName'];
    if(isset($_POST['isBuyableMultiple'])){
        $isBuyableMultiple = 1;
    }else{
        $isBuyableMultiple = 0;
    }

    if(isset($categoryName) && $categoryName != ""){
        $query = $db ->prepare("INSERT INTO categories (id,name,isBuyableMultiple) VALUES (:id,:name,:isBuyableMultiple)");
        $query->bindParam(":id",$categoryId);
        $query->bindParam(":name",$categoryName);
        $query->bindParam(":isBuyableMultiple",$isBuyableMultiple);
        $data = $query->execute();
        if(!$data){
            header('Location: ../views/form_add_category.php?err=Erreur lors de votre ajout de catégorie');
            
        }else{
            header('Location: ../views/shop.php');
        }
    
    }else{
        header('Location: ../views/form_add_category.php?err=Erreur lors de votre ajout de catégorie');
    }
?>