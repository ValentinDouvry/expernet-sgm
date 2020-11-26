<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("../secret/connect_db.php");
        session_start();
        if(!isset($_SESSION['userId'])){
            header('Location:../index.php');
        }

        $categoryId = $_POST['categoryId'];
        $categoryName = $_POST['categoryName'];
        if(isset($_POST['isBuyableMultiple'])){
            $isBuyableMultiple = 1;
        }else{
            $isBuyableMultiple = 0;
        }

        if((isset($categoryName) && $categoryName !="") && (isset($categoryId) && $categoryId != 0)){
            $query = $db->prepare("UPDATE `categories` SET `name` = :name,`isBuyableMultiple` = :isBuyableMultiple WHERE `id` = :id");
            $query->bindParam(":id",$categoryId);
            $query->bindParam(":name",$categoryName);
            $query->bindParam(":isBuyableMultiple",$isBuyableMultiple);
            $query->execute();

            header('Location: ../views/shop.php');

        }else{
            header('Location: ../views/form_update_category.php?err=erreur lors de votre modification');
        }
    ?>
</body>
</html>