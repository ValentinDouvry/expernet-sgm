<?php
require_once('../classes/User.php');

$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($_SESSION['userId']));
$currentUser = $query->fetchObject('User');
?>

<div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="#">Expernet-sgm</a>

    <div class="collapse navbar-collapse d-flex justify-content-between align-items-center">
        <ul class="navbar-nav mr-auto">
            <?php if($currentUser->getIsAdmin()) :?>

                <li class="nav-item mx-2"><a class="nav-link" href="list_group.php">Liste des groupes</a></li>

            <?php else : ?>

                <li class="nav-item mx-2"><a class="nav-link" href="group.php">Mon groupe</a></li>

            <?php endif; ?> 

            <li class="nav-item mx-2"><a class="nav-link" href="profile.php">Mon profil</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="shop.php">Boutique</a></li>
        </ul>
        <div class="navbar-nav">
            <a class="nav-link font-weight-bold text-dark" href="../actions/user_logout.php">Déconnexion</a>
        </div>
    </div>
    </nav>

</div>