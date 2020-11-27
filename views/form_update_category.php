<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modifier une categorie</title>
</head>
<body>
    <?php
        
        session_start();
        if(!isset($_SESSION['userId'])){
            header('Location:../index.php');
        }
        require_once("../secret/connect_db.php");
        require_once('components/navbar.php');

        if(!isset($_GET['categoryId']) || $_GET['categoryId'] == 0){
            echo "<p style='text-align: center'>erreur lors de la récupération de l'id de l'item</p>";
            header('Location: shop.php');
        }else{
            require_once("../classes/Category.php");
            $categoryId = $_GET['categoryId'];

            $query = $db->prepare("SELECT * FROM categories where id = :id");
            $query->bindParam(":id",$categoryId);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'Category');
            $data = $query->fetch();

            $categoryName = $data->getName();
            $isBuyableMultiple = $data->getIsBuyableMultiple();

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
            <h1 class="text-center mb-4">Modifier une catégorie</h1>
                <form method = 'POST' action="../actions/update_category.php" class="was-validated">
                    <!--form classique-->
                    <div class="form-group">
                        <label for="categoryName">Nom de la catégorie</label>
                        <input type="text" class="form-control" id="categoryName" value="<?php echo $categoryName ?>" name="categoryName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Veuillez remplir ce champ</div>
                    </div>
                    <?php
                        if($isBuyableMultiple == 1){
                    ?>
                            <input type="checkbox" id="isBuyableMultiple" name="isBuyableMultiple" value="yes"checked>
                    <?php
                        }else{
                    ?>
                            <input type="checkbox" id="isBuyableMultiple" name="isBuyableMultiple" value="yes">
                    <?php
                        }
                        
                    ?>
                    <label for="isBuyableMultiple">Achat multiple possible</label><br>
                    <input type = "hidden" id = "categoryId" name = "categoryId" value = "<?php echo $categoryId ?>" >
                    <!--submit-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-success">Ajouter l'objet</button>
                        <a class="btn btn-outline-secondary" href="shop.php">Annuler</a>
                    </div>
                </form>

                
            </div>
    <?php
        }
    ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>