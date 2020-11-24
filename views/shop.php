<?php
require_once('../classes/User.php');
require_once('../classes/Item.php');
require_once('../classes/Category.php');
require_once('../classes/Inventory.php');
require_once('../secret/connect_db.php');

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location: log_in.php');
    exit;
}

$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$user = $query->fetchObject('User');

$sql = "SELECT * FROM `items`";
$query = $db->prepare($sql);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_CLASS, "Item");

$sql = "SELECT * FROM `categories`";
$query = $db->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_CLASS, "Category");

$sql = "SELECT * FROM inventories WHERE userId=:userID and itemId=:itemId";
$query = $db->prepare($sql);

?>

<!doctype html>
<html lang="fr">

<head>
    <title>Boutique</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <a class="btn btn-outline-secondary" role="button" href="">Accueil</a>
        <a class="btn btn-outline-secondary" role="button" href="profile.php">Mon profil</a>
        <a class="btn btn-outline-secondary" role="button" href="shop.php">Boutique</a>
        <a class="btn btn-outline-secondary" role="button" href="">Se déconnecter</a>
    </div>

    <div class="container">
        <div class="h2 font-weight-bold float-right"><?= $user->getMoney(); ?> €</div>

        <h1 class="text-center">Boutique</h1>
        <?php if(isset($_GET['status']) && isset($_GET['text'])) :?>

            <div class="alert alert-<?= $_GET['status']; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $_GET['text']; ?> </strong> 
            </div>
        
        <?php endif; ?>
        <script>
          $(".alert").alert();
        </script>


        <?php if($user->getIsAdmin()) :?>
        <a class="btn btn-outline-primary" href="form_add_item.php">Ajouter un objet</a>
        <?php endif; ?>

        <?php
        foreach ($categories as $category) :
            $countItem = 0;
            echo "<h1>" . $category->getName() . "</h1>";
        ?>

            <div class="row">
                <?php
                foreach ($items as $item) :

                    $query->execute(array(':userID'=>$user->getId(),':itemId'=>$item->getId()));
                    $inventory = $query->fetchObject('Inventory');
                    
                    if ($item->getcategoryId() === $category->getId() && ($user->getIsAdmin()||!$item->getIsDesactivated())) : 
                        $countItem++;
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.africansportsmonthly.com/uploads/1/2/4/4/12440788/img1_orig.jpg">
                                <div class="card-body">
                                    <h3 class="card-title text-center font-weight-bold"><?= $item->getName(); ?></h3>
                                    <p class="card-text font-weight-bold"><?= $item->getPrice(); ?></p>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <?php if($user->getIsAdmin()) : ?>
                                            <?php if(!$item->getIsDesactivated()) : ?>
                                                <a class="btn btn-outline-warning" href="#?id=<?= $item->getId();?>">Modifier</a>
                                                <a class="btn btn-outline-secondary" href="../actions/item_deactivate.php?id=<?= $item->getId();?>">Désactiver</a>
                                            <?php else : ?>
                                                <a class="btn btn-outline-success" href="../actions/item_reactivate.php?id=<?= $item->getId();?>">Réactiver</a>
                                                <a class="btn btn-outline-danger" href="../actions/item_delete.php?id=<?= $item->getId();?>">Supprimer</a>
                                            <?php endif; ?>
                                        <?php else :?>
                                            <?php if($category->getIsBuyableMultiple()) :?>
                                                <form action="../actions/item_buy.php" method="post">
                                                    <input style="width: 4rem;" type="number" min="1" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="<?= $item->getId(); ?>">
                                                    <input type="submit" nane="submit" class="btn btn-outline-primary" value="Acheter">
                                                </form>

                                            <?php elseif(!$inventory===false) :?>
                                                <button class="btn btn-outline-secondary" disabled="disabled">Posseder</button>

                                            <?php else :?>
                                                <form action="../actions/item_buy.php" method="post">
                                                    <input type="hidden" name="quantity" max="1" value="1">
                                                    <input type="hidden" name="id" value="<?= $item->getId(); ?>">
                                                    <input type="submit" nane="submit" class="btn btn-outline-primary" value="Acheter">
                                                </form>
                                            <?php endif?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    endif;
                endforeach;
                if($countItem <1) {
                    echo "Il n'y a pas encore d'item disponible pour cette categorie";
                }
                ?>

            </div>

        <?php
        endforeach;
        ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>