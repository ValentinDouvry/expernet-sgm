<?php
    require_once("../secret/connect_db.php");
    require_once("../classes/User.php");
    require_once("../classes/Inventory.php");
    require_once("../classes/Group.php");
    session_start();
        
    if(!isset($_SESSION['userId'])){
        header('Location:log_in.php');
    }

    else{
        $userId = $_SESSION['userId'];
        $query = $db->prepare("SELECT * FROM users WHERE id = :userId");
        $query->bindParam(":userId", $userId);
        $query->execute();
        $user = $query->fetchObject("User");

        if($user->getIsAdmin()){
            $groupId = $_GET["groupId"];

            $query = $db->prepare("SELECT * FROM `groups` where `id` = :groupId");
            $query->bindParam(":groupId",$groupId);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'Group');
            $data = $query->fetch();
            if(!$data)
            {
                header('Location: list_group.php');
                exit();
            }
            $groupName = $data->getName();

        }
        else
        {
            $groupId = $user->getGroupId();
 
            //requete pour recupérer le nom du groupe associer à l'id du groupe récupérer juste avant
            $query = $db->prepare("SELECT * FROM `groups` where `id` = :groupId");
            $query->bindParam(":groupId",$groupId);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'Group');
            $data = $query->fetch();
            $groupName = $data->getName();
        }



        //requete pour récuperer le id du groupe dans lequel est l'utilisateur
        /* $query = $db->prepare("SELECT `groupId` FROM `users` where `id` = :id");
        $query->bindParam(":id",$userId,PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS,'User');
        $data = $query->fetch(); */
    }
        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Mon Groupe</title>
</head>
<body>

    <?php require_once('components/navbar.php'); ?>
    
    <div class="container-fluid">
    <?php
        echo '<h1 class="mt-3 mb-5"style="text-align: center;">'.$groupName.'</h1>';
    ?>
        <div class="row justify-content-md-center">
        <!-- Content here -->
        <?php
            $query = $db->prepare("SELECT * FROM users where groupId = :groupId");
            $query->bindParam(":groupId",$groupId); 
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'User');
            $data = $query->fetchall();

            $arrayAvatarObj = [];


            foreach($data as $user){
        ?>
        
            <div class="card mb-3 mr-5 col-sm-9" style="max-width: 400px;">
                <a href="profile.php?profileId=<?php echo $user->getId();?>" class="stretched-link"></a>
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <?php
                            $avatarId = $user->getAvatarId();
                            $query = $db->prepare("SELECT `imageName` FROM `avatars` where id = :id");
                            $query->bindParam(":id",$avatarId); 
                            $query->execute();
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            $data = $query->fetch();
                            $imageName = $data['imageName'];

                            
                            $AvatarObj = new stdClass();
                            $AvatarObj->base = '../img/avatars/' . $imageName;

                            $query = $db->prepare("SELECT * FROM `inventories` WHERE userId = :userId");
                            $query->execute(array(":userId" => $user->getId()));
                            $inventories = $query->fetchAll(PDO::FETCH_CLASS, "Inventory");

                            foreach($inventories as $inventory):

                                if($inventory->getIsEquipped()) :
            
                                    $sql = "SELECT `categories`.`name` as categoryName, `items`.`imageName` as itemsImageName FROM `items` INNER JOIN `categories` ON `items`.`categoryId` = `categories`.`id` WHERE `items`.`id`=?";
                                    $query = $db->prepare($sql);
                                    $query->execute(array($inventory->getItemId()));
                                    $item = $query->fetch();
                                    
                                    switch ($item['categoryName']) {
                                        case ("Chapeaux"):
                                            $AvatarObj->hat = '../img/items/'. $item['itemsImageName'];
                                            break;
            
                                        case ("Lunettes"):
                                            $AvatarObj->glase = '../img/items/'. $item['itemsImageName'] ;
                                            break;
                                        case ("Barbes-Moustaches"):
                                            $AvatarObj->beard = '../img/items/' . $item['itemsImageName'];
                                            break;
                                        case ("Noeuds"):
                                            $AvatarObj->tie = '../img/items/' . $item['itemsImageName'];
                                            break;
                                    }
            
                                endif;
            
                            endforeach;

                            $arrayAvatarObj[] = [$user->getId(), $AvatarObj];
                            
                        ?>
                        <div class="mt-2">
                            <canvas class="" id="canvasAvatar<?=$user->getId()?>" width="150" height="150" style="border:1px solid #EAE7DC; border-radius: 5px;">
                            </canvas>
                        </div>
                        <!-- <img src="../img/avatars/<?php echo $imageName ?>" class="card-img" alt="<?php echo $imageName ?>"> -->
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user->getLastName()." ",$user->getName(); ?></h5>
                            <p class="card-text"><?php echo $user->getUsername();?></p>
                            <p class="card-text"><small class="text-muted"><?php echo"Level : ".$user->getLevel();?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php } ?>
        </div>


    </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // pass PHP variable declared above to JavaScript variable
        var phpsource = <?= json_encode($arrayAvatarObj); ?>;
    </script>


<script defer src="../js/show_avatars.js"></script>

</body>
</html>