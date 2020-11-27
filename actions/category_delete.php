<?php
    require_once("../secret/connect_db.php");
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location:../index.php');
    }

    if (isset($_POST["inputIdCategoryDelete"])) {
        $categoryId = $_POST["inputIdCategoryDelete"];
        $query = $db->prepare("SELECT COUNT(*) FROM items WHERE categoryId = :categoryId");
        $query->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        $query->execute();
        $nbitem = $query->fetchColumn();
        if ($nbitem != 0) {
            header("Location: ../views/shop.php?status=danger&text=Erreur, impossible de supprimer une categorie contenant des objets !");
            exit();
      
        } else {
          $query = $db->prepare("DELETE FROM `categories` WHERE `id`= :categoryId");
          $query->bindParam(":categoryId", $categoryId, PDO::PARAM_STR);
          $resultat = $query->execute();
          if($resultat){
            header('Location: ../views/shop.php');
            exit();
          }
          else{
            header('Location: ../views/shop.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
            exit();
          }
        
        }
    }



?>