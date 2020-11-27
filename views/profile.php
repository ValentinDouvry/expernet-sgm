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
if(!isset($userId)){
    header('Location:log_in.php');
}
else{

    if(isset($_GET["profileId"]))
    {
        
        $profileId = $_GET["profileId"];

        /********************************************************************************************************/
        //UPDATE USER
        if(isset($_POST["inputLastName"]) && isset($_POST["inputName"]) && isset($_POST["inputUsername"]) && isset($_POST["inputEmail"]))
        {
            $lastName = $_POST["inputLastName"];
            $name = $_POST["inputName"];
            $username = $_POST["inputUsername"];
            $email = $_POST["inputEmail"];

            
            $query = $db->prepare("UPDATE users SET lastName = :lastName,
                name = :name, 
                email = :email, 
                username = :username
                WHERE id = :userId");

            $query->bindParam(":lastName",$lastName, PDO::PARAM_STR);
            $query->bindParam(":name",$name, PDO::PARAM_STR);
            $query->bindParam(":username",$username, PDO::PARAM_STR);
            $query->bindParam(":email",$email, PDO::PARAM_STR);
            $query->bindParam(":userId",$profileId, PDO::PARAM_INT);
            $query->execute();
        }
        /********************************************************************************************************/


        $query = $db->prepare("SELECT * FROM users WHERE id = :userId");
        $query->bindParam(":userId",$profileId);
        $query->execute();
        $profileUser = $query->fetchObject("User");
        if(!$profileUser)
        {
            header('Location: profile.php');
            exit();
        }

        $query = $db->prepare("SELECT * FROM `users` WHERE id = :userId");
        $query->bindParam(":userId",$userId);
        $query->execute();
        $user = $query->fetchObject("User");

    }
    else
    {
        $profileId = $userId;

        /********************************************************************************************************/
        //UPDATE USER
        if(isset($_POST["inputLastName"]) && isset($_POST["inputName"]) && isset($_POST["inputUsername"]) && isset($_POST["inputEmail"]))
        {
            $lastName = $_POST["inputLastName"];
            $name = $_POST["inputName"];
            $username = $_POST["inputUsername"];
            $email = $_POST["inputEmail"];

            
            $query = $db->prepare("UPDATE users SET lastName = :lastName,
                name = :name, 
                email = :email, 
                username = :username
                WHERE id = :userId");

            $query->bindParam(":lastName",$lastName, PDO::PARAM_STR);
            $query->bindParam(":name",$name, PDO::PARAM_STR);
            $query->bindParam(":username",$username, PDO::PARAM_STR);
            $query->bindParam(":email",$email, PDO::PARAM_STR);
            $query->bindParam(":userId",$profileId, PDO::PARAM_INT);
            $query->execute();
        }
        /********************************************************************************************************/

        $query = $db->prepare("SELECT * FROM users WHERE id = :userId");
        $query->bindParam(":userId",$profileId);
        $query->execute();
        $profileUser = $query->fetchObject("User");
        
        $query = $db->prepare("SELECT * FROM `users` WHERE id = :userId");
        $query->bindParam(":userId",$userId);
        $query->execute();
        $user = $query->fetchObject("User");
        
    }
        


    $query = $db->prepare("SELECT * FROM `groups` WHERE id = :groupId");
    $groupId = $profileUser->getGroupId();
    $query->bindParam(":groupId",$groupId);
    $query->execute();
    $group = $query->fetchObject("Group");  
    
    /* $sql = "SELECT * FROM `items`";
    $query = $db->prepare($sql);
    $query->execute();
    $items = $query->fetchAll(PDO::FETCH_CLASS, "Item"); */

    $sql = "SELECT * FROM `categories`";
    $query = $db->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_CLASS, "Category");

    $query = $db->prepare("SELECT * FROM `avatars` WHERE id = :avatarId");
    $avatarId = $profileUser->getAvatarId();
    $query->bindParam(":avatarId",$avatarId);
    $query->execute();
    $avatar = $query->fetchObject("Avatar");   

    /**
     * Pour afficher correctement l'avatar
     */
    $AvatarObj = new stdClass();
    $AvatarObj->base = '../img/avatars/'.$avatar->getImageName();

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Expernet-sgm</title>
</head>
<body>

<?php require_once('components/navbar.php'); ?>

    <div class="container">

        <?php if(isset($_GET['status']) && isset($_GET['text'])) :?>

            <div class="alert alert-<?= $_GET['status']; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $_GET['text']; ?> </strong> 
            </div>

            <script>
            $(".alert").alert();
            </script>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-sm">
                <div class="row">
                    <h3><?php echo $group->getName();?></h3>
                    <?php 
                    if($user->getIsAdmin() && $profileId != $userId){
                        echo '
                        <button class="btn btn-outline-danger ml-2" onClick="submitDeleteForm()">Supprimer</button>
                        <form action="../actions/user_delete.php" method="GET" id="form-delete-user">                                                              
                              <input id="inputUserIdDelete" name="inputUserIdDelete" type="hidden" value="'.$profileUser->getId().'">                                              
                        </form>';
                    }
                    ?>           
                </div>
                <div class="row">
                    <canvas class="" id="canvasAvatar" width="250" height="250" style="border:1px solid #000000; border-radius: 25px;">            
                    </canvas>
                </div>
            </div>
            <?php if($user->getIsAdmin() || $profileId === $userId){
                echo '
                <form method="POST" action="profile.php?profileId='.$profileUser->getId().'">
                    <div class="col-sm">
                        <div class="row">                        
                            <div class="col-sm form-group">
                                <label for="inputLastName">Nom</label>
                                <input type="text" class="form-control" name="inputLastName" placeholder="Nom" value="'.$profileUser->getLastName().'">
                            </div>
                            <div class="col-sm form-group">
                                <label for="inputName">Prénom</label>
                                <input type="text" class="form-control" name="inputName" placeholder="Prenom" value="'.$profileUser->getName().'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm form-group">
                                <label for="inputUsername">Pseudo</label>
                                <input type="text" class="form-control" name="inputUsername" placeholder="Username" value="'.$profileUser->getUsername().'">
                            </div>
                            <div class="col-sm form-group">
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" name="inputEmail" placeholder="Email" value="'.$profileUser->getEmail().'">
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </div>
                </form>';
            }else{
                echo '
                <div class="col-sm">
                    <div class="row">                        
                        <div class="col-sm">
                            <p>'.$profileUser->getLastName().'</p>
                        </div>
                        <div class="col-sm">
                            <p>'.$profileUser->getName().'</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <p>'.$profileUser->getUsername().'</p>
                        </div>
                        <div class="col-sm">
                            <p>'.$profileUser->getEmail().'</p>
                        </div>
                    </div>
                </div>
                </form>';
            }

            if($profileUser->getId() === $userId || $user->getIsAdmin()) :
            ?>

            <form action="../actions/user_update_password.php" method="post">
            <?php if(!$user->getIsAdmin()) : ?>
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
                <input name="id" type="hidden" value="<?= $profileUser->getId(); ?>" >

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>

            <?php 
                endif;
            ?>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-sm">
                    <h5> LVL.<?php echo $profileUser->getLevel();?></h5>
                </div>
                <div class="col-sm">
                    <p>Bar XP</p>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-sm">
                    <h5>Portefeuille: <?php echo $profileUser->getMoney();?> €</h5>
                </div>
            </div>
            <!-- <script src="../js/customisationAvatar.js"></script>
            <script>make_base("");</script> -->
            
            <?php

        if($profileUser->getId() === $userId){
            $listItemEqquiped =[];
            $query = $db->prepare("SELECT * FROM `inventories` WHERE userId = :userId");
            $query->bindParam(":userId",$userId);
            $query->execute();
            $inventory = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");
            
                        
                echo '<div class="container-fluid">';
                echo '<h2 class="text-center">Inventaire</h2>';
                echo '<div class="container">';

                foreach ($categories as $category)
                {
                    $countItem = 0;
                    echo '
                    <h3>'.$category->getName().'</h3>
                    <div class="row">';
                        foreach ($inventory as $row){
                            $rowId = $row->getItemId();
                            $query = $db->prepare("SELECT * FROM `items` WHERE id = :itemId");
                            $query->bindParam(":itemId",$rowId);
                            $query->execute();
                            $item = $query->fetchObject("Item");                       
                            
                                                        
                            if ($item->getcategoryId() === $category->getId())
                            {
                                $countItem++;
                                echo '
                                <div class="col-md-4 card-deck">
                                    <div class="card mb-4 box-shadow">
                                        <img style="max-width: 8rem;"class="card-img-top mx-auto d-block" src="../img/items/'.$item->getImageName().'">
                                        <div class="card-body">
                                            <h3 class="card-title text-center font-weight-bold">'.$item->getName().'</h3>
                                            <div class="d-flex justify-content-around align-items-center">'; 
                                            
                                                if(!$row->getIsEquipped()){
                                                    echo '<a href="../actions/inventory_equiped.php?id='.$item->getId().'" class="btn btn-outline-success">Equipper</a>';
                                                }else{
                                                    /* echo '<script>equipper'.$category->getName().'('.'\''.$item->getImageName().'\''.')</script>'; */
                                                    echo '<a href="../actions/inventory_unequiped.php?id='.$item->getId().'" class="btn btn-outline-warning">Déséquipper</a> ';
                                                    
                                                    switch($category->getName()) {
                                                        case ("Chapeau"):
                                                            $AvatarObj->hat = '../img/items/'.$item->getImageName();
                                                        break;

                                                        case ("Lunettes"):
                                                            $AvatarObj->glase = '../img/items/'.$item->getImageName();
                                                        break;
                                                    }
                                                }                                            
                                            echo '
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            };
                        }
                        if($countItem <1) {
                            echo "Vous ne possédez pas encore d'item de cette catégorie !";
                        }                      

                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                
            } else {
                $query = $db->prepare("SELECT * FROM `inventories` WHERE userId = :userId");
                $query->bindParam(":userId",$profileId);
                $query->execute();
                $inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");
         

                foreach ($categories as $category)
                {

                    
                    foreach ($inventories as $inventory)
                    {
                        $inventoryId = $inventory->getItemId();
                        $query = $db->prepare("SELECT * FROM `items` WHERE id = :itemId ");
                        $query->bindParam(":itemId",$inventoryId);
                        $query->execute();
                        $item = $query->fetchObject("Item");
                        
                        echo "<pre>";
                        var_dump($inventory);
                        echo "</pre>";

                        if(!$inventory->getIsEquipped()){
                            switch($category->getName()) {
                                case ("Chapeau"):
                                    $AvatarObj->hat = '../img/items/'.$item->getImageName();
                                break;

                                case ("Lunettes"):
                                    $AvatarObj->glase = '../img/items/'.$item->getImageName();
                                break;
                            }
                        }
                    }
                        
                }                
                            
                                                        
                        

            }
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

    $(document).ready(function(){


        const canvas = document.getElementById('canvasAvatar');
        context = canvas.getContext('2d');


        function loadImages(sources, callback) {
            var images = {};
            var loadedImages = 0;
            var numImages = 0;
            // get num of sources
            for(var src in sources) {
            numImages++;
            }
            for(var src in sources) {
            images[src] = new Image();
            images[src].onload = function() {
                if(++loadedImages >= numImages) {
                callback(images);
                }
            };
            images[src].src = sources[src];
            }
        }

        // sources = {
        //     base: '../img/avatars/avatar1.png',
        //     image1: '../img/items/chapeauDeBob.png',
        //     image2: '../img/items/lunettes3D.png'
        // }

        // context.drawImage(images.base, 25, 50,200,200);
        // context.drawImage(images.image1, 35, -30,180,180);
        // context.drawImage(images.image2, 75, 70,100,100);

        loadImages(phpsource, function(images) {
            for (const property in phpsource) {
                if(property=="base") {
                    context.drawImage(images.base, 25, 50,200,200);
                } 

                if(property=="hat") {
                    context.drawImage(images.hat, 35, -30,180,180);
                }

                if(property=="glase") {
                    context.drawImage(images.glase, 75, 70,100,100);
                }
            }

        });

    });

    </script>
        
</body>
</html>