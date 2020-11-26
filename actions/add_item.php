<?php

session_start();
if(!isset($_SESSION['userId'])){
    header('Location:../index.php');
}

include ("../secret/connect_db.php");
include ("../classes/Category.php");
include ("../classes/Item.php");

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
    echo "File is not an image.";
    $uploadOk = 0;
}
}

// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["inputItemImage"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["inputItemImage"]["tmp_name"], $target_file)) {
        $itemId = Null;
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];
        $itemImage = $_FILES['inputItemImage']['name'];
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
            if(!$result){
                header('Location: ../views/form_add_item.php?err=erreur lors de votre ajout 1');
                
            }else{
                header('Location: ../views/shop.php');
            }
            
        }
    }
    else{

        header('Location: ../views/form_add_item.php?err=erreur lors de votre ajout 2');
    }

}
?>