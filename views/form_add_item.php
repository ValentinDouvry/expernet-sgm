<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Ajouter un objet</title>
</head>
<body>
    <?php
        include_once("../secret/connect_db.php");

        session_start();
        if(!isset($_SESSION['userId'])){
            header('Location:../index.php');
        }
        require_once('components/navbar.php');

        if((isset($_GET['err']))){
            $err = $_GET['err'];
            echo "<p style='text-align: center'>$err</p>";
        }
        include ("../secret/connect_db.php");
        include ("../classes/Category.php");

        $query = $db->prepare("SELECT name FROM categories");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS,'Category');
        $data = $query->fetchall();
    ?>
    <div class="container">
        <h1 class="text-center mb-4">Ajouter un item</h1>
        <form method = 'POST' action="../actions/add_item.php" class="was-validated" enctype="multipart/form-data">
            <!--liste déroulante des categories-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="categoryName">Categorie de l'objet</label>
                </div>
                <select class="custom-select" id="categoryName" name = "categoryName">
                    <option disabled selected>Choisissez une categorie</option>
                    <?php
                    foreach($data as $category){
                    ?>  
                    <option value = "<?php echo $category->getName();?>"><?php echo $category->getName(); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <!--form classique-->
            <div class="form-group">
                <label for="itemName">Nom de l'objet</label>
                <input type="text" class="form-control" id="itemName" placeholder="Entrer le nom de l'objet" name="itemName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Veuillez remplir ce champ</div>
            </div>
            <div class="form-group">
                <label for="itemPrice">Prix de l'objet</label>
                <input type="number" class="form-control" id="itemPrice" placeholder="Entrer le prix de l'objet" name="itemPrice" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">champ vide ou contient un nombre à virgule</div>
            </div>
            <div class="form-group">
                <!--image de l'objet-->
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputItemImage" name ="inputItemImage" onchange="readURL(this);" required>
                        <label class="custom-file-label" for="inputItemImage">Image de l'objet</label>
                    </div>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Veuillez remplir ce champ</div>
                </div>
            </div>
            <div>
                <img class="rounded mx-auto d-block mb-3" hidden id="imagePreview" src=""/>
            </div>
            <!--submit-->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-success">Ajouter l'objet</button>
                <a class="btn btn-outline-secondary" href="shop.php">Annuler</a>
            </div>
        </form>

        

        
    </div>             

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/form_add_update_item.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>