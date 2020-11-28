<?php

    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location:../index.php');
        exit();
    }
    require_once("../secret/connect_db.php");
    require_once("../classes/Category.php");

    
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemImage = $_FILES["inputItemImage"]["name"];
    $categoryName = $_POST['categoryName'];
 

    $query = $db->prepare("SELECT id FROM categories where name = :name");
    $query->bindParam(":name",$categoryName);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_CLASS,'Category');
    $data = $query->fetch();
    $categoryId = $data->getId();

    //si il a changé d'image:
    if((isset($itemId) && $itemId != 0) && (isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage !="") && (isset($categoryName) && $categoryName !=""))
    {
        $target_dir = "../img/items/";
        $target_file = $target_dir . basename($_FILES["inputItemImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["inputItemImage"])) {
            $check = getimagesize($_FILES["inputItemImage"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                header("Location: ../views/form_update_item.php?status=danger&text=Erreur, le fichier n'est pas une image !");
                $uploadOk = 0;
            }
            }

        // Check if file already exists
        if (file_exists($target_file)) {
            header("Location: ../views/form_update_item.php?status=danger&text=Erreur, le fichier existe déjà !");
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["inputItemImage"]["size"] > 500000) {
            header("Location: ../views/form_update_item.php?status=danger&text=Erreur, le fichier est trop lourd !");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header("Location: ../views/form_update_item.php?status=danger&text=Erreur, seuls les fichiers JPG, JPEG, PNG OU GIF sont acceptés !");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header("Location: ../views/form_update_item.php?status=danger&text=Erreur, le fichier n'a pas été upload !");
            
        }
        else // if everything is ok, try to upload file
        {
            if (move_uploaded_file($_FILES["inputItemImage"]["tmp_name"], $target_file)) 
            {

                $query = $db->prepare("UPDATE `items` SET `name` = :name,`price` = :price,`imageName` = :imageName,`categoryId` = :categoryId WHERE `id` = :id");
                $query->bindParam(":id",$itemId);
                $query->bindParam(":name",$itemName);
                $query->bindParam(":price",$itemPrice);
                $query->bindParam(":imageName",$itemImage);
                $query->bindParam(":categoryId",$categoryId);
                $result = $query->execute();
                if(!$result){
                    header('Location: ../views/form_update_item.php?status=danger&text=Erreur lors de votre modification !');
                    exit();
                    
                }else{
                    header('Location: ../views/shop.php');
                    exit();
                }

                
            }
            else{
                header('Location: ../views/form_update_item.php?status=danger&text=Erreur lors de votre modification !');
                exit();
            }
        }
        
        

    //si il n'a pas changé d'image :
    }elseif((isset($itemId) && $itemId != 0) && (isset($itemName) && $itemName!="") && (isset($itemPrice)) && (isset($itemImage) && $itemImage == "") && (isset($categoryName) && $categoryName !="")){

        $query = $db->prepare("UPDATE `items` SET `name` = :name,`price` = :price,`categoryId` = :categoryId WHERE `id` = :id");
        $query->bindParam(":id",$itemId);
        $query->bindParam(":name",$itemName);
        $query->bindParam(":price",$itemPrice);
        $query->bindParam(":categoryId",$categoryId);
        $query->execute();
        
        header('Location: ../views/shop.php');
        exit();
    }
    else{
        header('Location: ../views/form_update_item.php?status=danger&text=Erreur lors de votre modification !');
        exit();
    }

?>