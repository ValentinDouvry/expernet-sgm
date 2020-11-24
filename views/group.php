<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Mon Groupe</title>
</head>
<body>
    <?php
    session_start();
    include("../secret/connect_db.php");
    include("../classes/User.php");
    include("../classes/Group.php");
        
    if(!isset($_SESSION['userId'])){
        header('Location:log_in.php');
    }else{
        $userId = $_SESSION['userId'];
        //requete pour récuperer le id du groupe dans lequel est l'utilisateur
        $query = $db->prepare("SELECT groupId FROM users where id = :id");
        $query->bindParam(":id",$userId,PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS,'User');
        $data = $query->fetch();
        $groupId = $data->getGroupId();
 
        //requete pour recupérer le nom du groupe associer à l'id du groupe récupérer juste avant
        $query = $db->prepare("SELECT name FROM groups where id = :id");
        $query->bindParam(":id",$groupId);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS,'Group');
        $data = $query->fetch();
        $groupName = $data->getName();
    ?>

    <div class="container-fluid">
        <?php
            echo"<h1>".$groupName."</h1>";
        ?>
        
        <!-- Content here -->
        <?php
            $query = $db->prepare("SELECT * FROM users where groupId = :groupId");
            $query->bindParam(":groupId",$groupId); 
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS,'User');
            $data = $query->fetchall();

            foreach($data as $user){
        ?>
        <div class = "row">
            <div class="card mb-3 col-sm-9" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <?php
                        $avatarId = $user->getAvatarId();
                        $query = $db->prepare("SELECT imageName FROM avatars where id = :id");
                        $query->bindParam(":id",$avatarId); 
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        $data = $query->fetch();
                        $imageName = $data['imageName'];
                    ?>
                    <img src="<?php $imageName ?>" class="card-img" alt="<?php echo $imageName ?>">
                    </div>
                    <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user->getLastName()." ",$user->getName(); ?></h5>
                        <p class="card-text"><?php echo $user->getUsername();?></p>
                        <p class="card-text"><small class="text-muted"><?php echo"Level : ".$user->getLevel();?></small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
            } 
    }
    ?>   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>