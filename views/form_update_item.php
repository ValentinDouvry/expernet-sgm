<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
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
            require_once("../secret/connect_db.php");
            require_once("../classes/Item.php");
            require_once("../classes/Category.php");

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
            <?php
            if (isset($_GET['err'])) :
            ?>

                <div class="form-alert-login alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $_GET['err']; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
            endif;
            ?>
            <h1 class="text-center mb-4">Modifier un objet</h1>
                <form method = 'POST' action="../actions/update_item.php" class="was-validated" enctype="multipart/form-data">
                    <!--liste déroulante des categories-->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categoryName">Catégorie de l'objet</label>
                        </div>
                        <select class="custom-select" id="categoryName" name = "categoryName">
                            <?php
                            $query = $db->prepare("SELECT name FROM categories");
                            $query->execute();
                            $query->setFetchMode(PDO::FETCH_CLASS,'Category');
                            $data = $query->fetchall();

                            foreach($data as $category){
                                if($categoryName === $category->getName()){

                                
                            ?>
                                <option selected><?php echo $categoryName ?></option>
                            
                            <?php
                                }
                                else{
                            ?>
                                <option value = "<?php echo $category->getName(); ?>"><?php echo $category->getName(); ?></option>
                            <?php
                                }
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
                    <input type="text" class="form-control" id="itemName" value="<?php echo $itemName ?>" name="itemName" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Veuillez remplir ce champ</div>
                    </div>
                    <div class="form-group">
                    <label for="itemPrice">Prix de l'objet</label>
                    <input type="number" class="form-control" id="itemPrice" value="<?php echo $itemPrice ?>" name="itemPrice" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">champ vide ou contient un nombre à virgule</div>
                    </div>
                    <div class="form-group">
                        <!--image de l'objet-->
                        <div class="input-group">
                            <div class="custom-file">
                            <label class="custom-file-label" for="inputItemImage" id="labelFileInput"><?php echo $itemImage ?></label>
                                <input type="file" class="custom-file-input" id="inputItemImage" name = "inputItemImage" onchange="showImage(this);" value="<?php echo $itemImage ?>">
                                
                            </div>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Veuillez remplir ce champ</div>
                        </div>
                    <!--submit-->
                    </div>
                    <input type = "hidden" id = "itemId" name = "itemId" value = "<?php echo $itemId ?>">
                    <div>
                        <img style="max-width: 200px; max-height: 200px;"class="rounded mx-auto d-block mb-3" hidden id="imagePreview" src="../img/items/<?php echo $itemImage ?>"/>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-dark">Modifier</button>                    
                        <a class="btn btn-outline-dark" href="shop.php">Annuler</a>
                    </div>
                </form>

                
            </div>
    <?php
    }
    
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/form_add_update_item.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
