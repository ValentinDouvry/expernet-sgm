<?php
include_once("../secret/connect_db.php");
include_once("../classes/User.php");
include_once("../classes/Group.php");

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

    if(!$user->getIsAdmin()){
      header('Location: ../index.php');
    }
    else{
        if(isset($_GET["create"]))
        {
            
        }
    } 
}


?>



<!doctype html>
<html lang="fr">

<head>
    <title>Expernet-sgm</title>
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
      <a class="btn btn-outline-secondary" role="button" href="">Boutique</a>
      <a class="btn btn-outline-secondary" role="button" href="">Se déconnecter</a>
    </div>

    <div class="container">
    

        <h1 class="text-center">Créer un groupe</h1>


        <form method="POST" action="../actions/group_add.php">

            <div class="form-group">
                <label for="inputGroupName">Nom du groupe</label>
                <input name="inputGroupName" type="text" class="form-control" id="inputGroupName" placeholder="Nom du groupe" required>
            </div>

            <div class="form-group">
                <label for="inputGroupChannel">Channel</label>
                <input name="inputGroupChannel" type="text" class="form-control" id="inputGroupChannel" placeholder="Channel du groupe" required>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>