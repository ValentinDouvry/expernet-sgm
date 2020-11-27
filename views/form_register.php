<?php
require_once("../secret/connect_db.php");
?>

<!doctype html>
<html lang="fr">

<head>
    <title>S'incrire</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/form.css">

</head>

<body class="text-center">

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

    <div class="form-div border border-dark bg-custum-color shadow">
        <h1 class="h2 mb-3 font-weight-normal form-title">S'inscrire</h1>
        <form class="mt-3" method="post" action="../actions/register.php">
            <div class="d-flex flex-column align-items-center">
                <input type="text" class="form-control input-custum" placeholder="Identifiant de connexion" name="username" required autofocus />

                <input name="last-name" type="text" class="form-control input-custum" placeholder="Nom" required />

                <input name="name" type="text" class="form-control input-custum" placeholder="Prénom" required />

                <input name="email" type="email" class="form-control input-custum" placeholder="Email" required />

                <input name="password" type="password" class="form-control input-custum" placeholder="Mot de passe" required />

                <input name="password2" type="password" class="form-control input-custum" placeholder="Vérification du mot de passe" required />

                <input name="code" type="text" class="form-control input-custum" placeholder="Code accès au groupe" required />

                <select class="custom-select input-custum" id="avatars" name="avatar">

                    <?php

                    $sql = "SELECT * FROM avatars";
                    $query = $db->prepare($sql);
                    $query->execute(array());
                    $avatars = $query->fetchAll();
                    $count = 0;
                    foreach ($avatars as $avatar) {
                        $count++;
                        echo "<option value='" . $avatar["id"] . "' data-image='". $avatar["imageName"] . "' >Avatar ". $count ."</option>";
                    }
                    ?>
                </select>

                <div id="form-container-img" class="text-center">
                    <img src="" class="form-avatars-img">
                </div>

                <button type="submit" class="btn btn-outline-primary my-2 mb-3">S'inscrire</button>
        </form>
        <p>Déjà un compte? <a href="log_in.php">Connectez-vous ici !</a></p>

        <p class="mt-2 mb-2 text-muted">&copy; Expernet-sgm 2020</p>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="../js/form_register.js"></script>
</body>

</html>