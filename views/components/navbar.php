<?php
require_once('../classes/User.php');

$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$currentUser = $query->fetchObject('User');
?>

<!--lib des icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--si jamais on veut un fond lors de la selection d'un "onglet"-->
<!--<style>
    a:hover {
  background-color: gold;
    }
</style>-->

<div class="container-fluid" style = "background-color: #000;">
    <nav class="navbar navbar-expand-md mb-2">
        <a class="navbar-brand" href="#" style = "color: white;">Expernet-sgm</a>
        <div class="collapse navbar-collapse d-flex justify-content-between align-items-center">
            <ul class="navbar-nav mr-auto">
                <?php if($currentUser->getIsAdmin()) :?>

                    <li class="nav-item mx-2"><a class="nav-link" href="list_group.php" style = "color: white;"><i class="fa fa-fw fa-group"></i>Liste des groupes</a></li>

                <?php else : ?>

                    <li class="nav-item mx-2"><a class="nav-link" href="group.php" style = "color: white;"><i class="fa fa-fw fa-group"></i>Mon groupe</a></li>

                <?php endif; ?> 

                <li class="nav-item mx-2"><a class="nav-link" href="profile.php" style = "color: white;"><i class="fa fa-fw fa-user"></i>Mon profil</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="shop.php" style = "color: white;"><i class="fa fa-fw fa-shopping-cart"></i>Boutique</a></li>
            </ul>
            <div class="navbar-nav">
                <a class="nav-link font-weight-bold" href="../actions/user_logout.php" style = "color: white;"><i class="fa fa-fw fa-sign-out"></i>Déconnexion</a>
            </div>
        </div>
    </nav>
</div>