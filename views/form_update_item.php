<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modifier un objet</title>
</head>
<body>

    <?php
        require_once("../secret/connect_db.php");

        session_start();
        if(!isset($_SESSION['userId'])){
            header('Location:../index.php');
        }

        require_once('components/navbar.php');

        if((!isset($_GET['id']) || $_GET['id'] == 0)){
            echo "<p style='text-align: center'>erreur lors de la récupération de l'id de l'item</p>";
            header('Location: shop.php');
        }else{
            $itemId = $_GET['id'];
            include ("../secret/connect_db.php");
            include ("../classes/Item.php");
            include ("../classes/Category.php");

            $query = $db->prepare("SELECT categoryId FROM items WHERE id = :id");
            $query->bindParam(":id",$itemId);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'Item');
            $data = $query->fetch();
            $categoryId = $data->getCategoryId();

            $query = $db->prepare("SELECT name FROM categories WHERE id = :id");
            $query->bindParam(":id",$categoryId);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'Category');
            $data = $query->fetch();
            $categoryName = $data->getName();
            
    ?>
            <div class="container">
                <form method = 'POST' action="../actions/update_item.php" class="was-validated">
                    <!--liste déroulante des categories-->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categoryName">Categorie de l'objet</label>
                        </div>
                        <select class="custom-select" id="categoryName" name = "categoryName">
                            <option selected><?php echo $categoryName ?></option>
                            <?php
                            $query = $db->prepare("SELECT name FROM categories");
                            $query->execute();
                            $query->setFetchMode(PDO::FETCH_CLASS,'Category');
                            $data = $query->fetchall();

                            foreach($data as $category){
                            ?>  
                            <option value = "<?php echo $category->getName();?>"><?php echo $category->getName(); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php

                    $query = $db->prepare("SELECT * FROM items WHERE id = :id");
                    $query->bindParam(":id",$itemId);
                    $query->execute();
                    $query->setFetchMode(PDO::FETCH_CLASS,'Item');
                    $data = $query->fetch();

                    $itemName = $data->getName();
                    $itemPrice = $data->getPrice();
                    $itemImage = $data->getImageName();

                    ?>
                    <!--form classique-->
                    <div class="form-group">
                    <label for="itemName">Nom de l'objet</label>
                    <input type="text" class="form-control" id="itemName" placeholder="<?php echo $itemName ?>" name="itemName" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Veuillez remplir ce champ</div>
                    </div>
                    <div class="form-group">
                    <label for="itemPrice">Prix de l'objet</label>
                    <input type="number" class="form-control" id="itemPrice" placeholder="<?php echo $itemPrice ?>" name="itemPrice" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">champ vide ou contient un nombre à virgule</div>
                    </div>
                    <div class="form-group">
                    <!--image de l'objet-->
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="itemImage" name = "itemImage">
                            <label class="custom-file-label" for="itemImage"><?php echo $itemImage ?></label>
                        </div>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Veuillez remplir ce champ</div>
                    </div>
                    <!--submit-->
                    </br><button type="submit" class="btn btn-success">Modifier l'objet</button></br>
                    <input type = "hidden" id = "itemId" name = "itemId" value = "<?php echo $itemId ?>" >
                </form>

                <a class="btn btn-danger" href="shop.php">Annuler</a>
            </div>
    <?php
    }
    if((isset($_GET['err']))){
        $err = $_GET['err'];
        echo "<p style='text-align: center'>$err</p>";
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
