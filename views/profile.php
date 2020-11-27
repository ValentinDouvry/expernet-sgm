<?php
require_once("../secret/connect_db.php");
require_once("../classes/User.php");
require_once("../classes/Group.php");
require_once("../classes/Inventory.php");
require_once("../classes/Item.php");
require_once('../classes/Category.php');
require_once('../classes/Avatar.php');

session_start();


$userId = $_SESSION["userId"];
if (!isset($userId) || $userId === "") {
    header('Location:log_in.php');
    exit;
}

if (isset($_GET["profileId"]) && $_GET["profileId"] !== "") {

    $profileId = $_GET["profileId"];
} else {

    $profileId = $userId;
}

$query = $db->prepare("SELECT * FROM users WHERE id = :userId");
$query->bindParam(":userId", $profileId);
$query->execute();
$profileUser = $query->fetchObject("User");
if (!$profileUser) {
    header('Location: profile.php');
    exit();
}

$query = $db->prepare("SELECT * FROM `users` WHERE id = :userId");
$query->bindParam(":userId", $userId);
$query->execute();
$user = $query->fetchObject("User");


$query = $db->prepare("SELECT * FROM `groups` WHERE id = :groupId");
$groupId = $profileUser->getGroupId();
$query->bindParam(":groupId", $groupId);
$query->execute();
$group = $query->fetchObject("Group");


$sql = "SELECT * FROM `categories`";
$query = $db->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_CLASS, "Category");


$query = $db->prepare("SELECT * FROM `avatars` WHERE id = :avatarId");
$avatarId = $profileUser->getAvatarId();
$query->bindParam(":avatarId", $avatarId);
$query->execute();
$avatar = $query->fetchObject("Avatar");

/**
 * Pour afficher correctement l'avatar
 */
$AvatarObj = new stdClass();
$AvatarObj->base = '../img/avatars/' . $avatar->getImageName();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Expernet-sgm</title>
</head>

<body>

    <?php require_once('components/navbar.php'); ?>

    <div class="container">

        <?php if (isset($_GET['status']) && isset($_GET['text'])) : ?>

            <div class="alert alert-<?= $_GET['status']; ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $_GET['text']; ?> </strong>
            </div>

        <?php endif; ?>

        <div class="row">
            <div class="col-sm">
                <div class="row">
                    <h3><?= $group->getName(); ?></h3>
                </div>
                <div class="row ml-2 mb-2">
                    <?php
                        if ($user->getIsAdmin() && $profileId !== $userId) :
                        ?>
                            <button class="btn btn-outline-danger ml-2" onClick="submitDeleteForm()">Supprimer l'utilisateur</button>
                            <form action="../actions/user_delete.php" method="GET" id="form-delete-user">
                                <input id="inputUserIdDelete" name="inputUserIdDelete" type="hidden" value="<?= $profileUser->getId(); ?>">
                            </form>
                        <?php
                        endif;
                    ?>
                </div>
                <div class="row">
                    <canvas class="" id="canvasAvatar" width="250" height="250" style="border:1px solid #000000; border-radius: 25px;">
                    </canvas>
                </div>
            </div>
            <?php
            if ($user->getIsAdmin() || $profileId === $userId) :
            ?>

                <form method="post" action="../actions/user_update_profil.php">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm form-group">
                                <label for="inputLastName">Nom</label>
                                <input type="text" class="form-control" name="inputLastName" placeholder="Nom" value="<?= $profileUser->getLastName(); ?>">
                            </div>
                            <div class="col-sm form-group">
                                <label for="inputName">Prénom</label>
                                <input type="text" class="form-control" name="inputName" placeholder="Prenom" value="<?= $profileUser->getName(); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm form-group">
                                <label for="inputUsername">Pseudonyme</label>
                                <input type="text" class="form-control" name="inputUsername" placeholder="Username" value="<?= $profileUser->getUsername(); ?>">
                            </div>
                            <div class="col-sm form-group">
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" name="inputEmail" placeholder="Email" value="<?= $profileUser->getEmail(); ?>">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $profileUser->getId(); ?>">
                        <div class="row">
                            <button type="submit" class="btn btn-outline-dark">Modifier</button>
                        </div>
                    </div>
                </form>

            <?php
            else :
            ?>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            <p><?= $profileUser->getLastName(); ?></p>
                        </div>
                        <div class="col-sm">
                            <p><?= $profileUser->getName(); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <p><?= $profileUser->getUsername(); ?></p>
                        </div>
                        <div class="col-sm">
                            <p><?= $profileUser->getEmail(); ?></p>
                        </div>
                    </div>
                </div>
                </form>
            <?php
            endif;

            if ($profileUser->getId() === $userId || $user->getIsAdmin()) :
            ?>

                <form action="../actions/user_update_password.php" method="post">
                    <?php if (!$user->getIsAdmin()) : ?>
                        <div class="form-group">
                            <label for="old-password">Ancien Mot de passe</label>
                            <input name="oldPassword" type="password" class="form-control" id="old-password" placeholder="Ancien Mot de passe">
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="password1">Nouveau mot de passe</label>
                        <input name="password1" type="password" class="form-control" id="password1" placeholder="Nouveau Mot de passe">
                    </div>

                    <div class="form-group">
                        <label for="password2">Verifier le mot de passe</label>
                        <input name="password2" type="password" class="form-control" id="password2" placeholder="Nouveau Mot de passe">
                    </div>
                    <input name="id" type="hidden" value="<?= $profileUser->getId(); ?>">

                    <button type="submit" class="btn btn-outline-dark">Valider</button>
                </form>

            <?php
            endif;
            ?>
        </div>
        
        
        <div class="row xpBar no-gutters mb-3 mt-3">
            <div class="container-fluid">
                <?php
                $query = $db->prepare("SELECT experience FROM users WHERE id = :id");
                $query->bindParam(":id", $userId);
                $query->execute();
                $data = $query->setFetchMode(PDO::FETCH_ASSOC);
                $data = $query->fetch();
                $userExperience = $data['experience'];

                if ($userExperience <= 1000) {
                ?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $userExperience / 10; ?>%" aria-valuenow="<?php $userExperience / 10 ?>" aria-valuemin="0" aria-valuemax="1000"><i class="fa fa-fw fa-star-o"></i></div>
                    </div>
                <?php
                } else {
                    $userExperience -= 1000;
                    //on devrai augmente son lvl de 1
                ?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $userExperience / 10; ?>%" aria-valuenow="<?php $userExperience / 10 ?>" aria-valuemin="0" aria-valuemax="1000"></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row no-gutters">
                <h5> LVL.<?= $profileUser->getLevel(); ?></h5>           
        </div>
        
        <div class="row no-gutters align-items-center">            
            <h5 class="mt-2">Portefeuille: <?= $profileUser->getMoney(); ?></h5>     
            <img style="width=2em;height:2em" src="../img/money.png"/>     
        </div>

        <?php

        if ($profileUser->getId() === $userId) :

            $query = $db->prepare("SELECT * FROM `inventories` WHERE userId = :userId");
            $query->bindParam(":userId", $userId);
            $query->execute();
            $inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");
        ?>

        <div class="container-fluid">
            <h2 class="text-center">Inventaire</h2>
                <div class="container">

                    <?php
                    foreach ($categories as $category) :
                        $countItem = 0;
                    ?>

                    <h3><?= $category->getName(); ?></h3>
                    <div class="row">
                        <?php
                        foreach ($inventories as $inventory) :
                            $rowId = $inventory->getItemId();
                            $query = $db->prepare("SELECT * FROM `items` WHERE id = :itemId");
                            $query->bindParam(":itemId", $rowId);
                            $query->execute();
                            $item = $query->fetchObject("Item");

                            if ($item->getcategoryId() === $category->getId()) :
                                $countItem++;
                                ?>
                                    
                                <div class="col-md-4 card-deck">
                                    <div class="card mb-4 box-shadow">
                                        <img style="max-width: 8rem;"class="card-img-top mx-auto d-block" src="../img/items/<?=$item->getImageName()?>">
                                        <div class="card-body">
                                            <h3 class="card-title text-center font-weight-bold"><?=$item->getName()?></h3>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <?php
                                                if (!$inventory->getIsEquipped()) {
                                                    echo '<a href="../actions/inventory_equiped.php?id=' . $item->getId() . '" class="btn btn-outline-dark">Equipper</a>';
                                                } else {
                                                    echo '<a href="../actions/inventory_unequiped.php?id=' . $item->getId() . '" class="btn btn-outline-danger">Déséquipper</a> ';
                                                    switch ($category->getName()) {
                                                        case ("Chapeaux"):
                                                            $AvatarObj->hat = '../img/items/' . $item->getImageName();
                                                            break;

                                                        case ("Lunettes"):
                                                            $AvatarObj->glase = '../img/items/' . $item->getImageName();
                                                            break;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            
                            endif;
                            endforeach;
                            if ($countItem < 1) {
                                echo "Vous ne possédez pas encore d'item de cette catégorie !";
                            }

                            ?>

                    </div>
                    <?php
                    endforeach;
                    ?>
                    
                </div>
        </div>
            <?php
            endif;
            ?>
    </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/confirm_delete_user.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript">
    // pass PHP variable declared above to JavaScript variable
    var phpsource = <?= json_encode($AvatarObj); ?>;

    $(document).ready(function() {


        const canvas = document.getElementById('canvasAvatar');
        context = canvas.getContext('2d');


        function loadImages(sources, callback) {
            var images = {};
            var loadedImages = 0;
            var numImages = 0;
            // get num of sources
            for (var src in sources) {
                numImages++;
            }
            for (var src in sources) {
                images[src] = new Image();
                images[src].onload = function() {
                    if (++loadedImages >= numImages) {
                        callback(images);
                    }
                };
                images[src].src = sources[src];
            }
        }

        loadImages(phpsource, function(images) {
            for (const property in phpsource) {
                if (property == "base") {
                    context.drawImage(images.base, 25, 50, 200, 200);
                }

                if (property == "hat") {
                    context.drawImage(images.hat, 35, -30, 180, 180);
                }

                if (property == "glase") {
                    context.drawImage(images.glase, 75, 70, 100, 100);
                }
            }

        });

    });
</script>

</body>

</html>