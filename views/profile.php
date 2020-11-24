<?php
require_once("../secret/connect_db.php");
require_once("../classes/User.php");
require_once("../classes/Group.php");

session_start();


$userId = $_SESSION["userId"];
if(!isset($userId)){
    header('Location:log_in.php');
}
else{

    $query = $db->prepare("SELECT * FROM users WHERE id = :userId");
    $query->bindParam(":userId",$userId);
    $query->execute();
    $user = $query->fetchObject("User");

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
        $query->bindParam(":userId",$userId, PDO::PARAM_INT);
        $query->execute();

    }


    $query = $db->prepare("SELECT * FROM `users` WHERE id = :userId");
    $query->bindParam(":userId",$userId);
    $query->execute();
    $user = $query->fetchObject("User");

    $query = $db->prepare("SELECT * FROM `groups` WHERE id = :groupId");
    $groupId = $user->getGroupId();
    $query->bindParam(":groupId",$groupId);
    $query->execute();
    $group = $query->fetchObject("Group");
    

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
        <div class="row">
            <div class="col-sm">
                <div class="row">
                    <h3><?php echo $group->getName();?></h3>
                </div>
                <div class="row">
                    <p>Image</p>
                </div>
            </div>
            <form method="POST" action="profile.php">
                <div class="col-sm">
                    <div class="row">                        
                        <div class="col-sm form-group">
                            <input type="text" class="form-control" name="inputLastName" placeholder="Nom" value="<?php echo $user->getLastName();?>">
                        </div>
                        <div class="col-sm form-group">
                            <input type="text" class="form-control" name="inputName" placeholder="Prenom" value="<?php echo $user->getName();?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm form-group">
                            <input type="text" class="form-control" name="inputUsername" placeholder="Username" value="<?php echo $user->getUsername();?>">
                        </div>
                        <div class="col-sm form-group">
                            <input type="text" class="form-control" name="inputEmail" placeholder="Email" value="<?php echo $user->getEmail();?>">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-sm">
                    <h5> LVL.<?php echo $user->getLevel();?></h5>
                </div>
                <div class="col-sm">
                    <p>Progress bar XP</p>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-sm">
                    <h5>Portefeuille: <?php echo $user->getMoney();?> €</h5>
                </div>
            </div>

    
    </div>
    






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>