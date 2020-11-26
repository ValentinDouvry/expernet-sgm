<?php
session_start();
if (isset($_SESSION['userId'])) {
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/form.css" />

</head>

<body class="text-center">

<?php if (isset($_GET['status']) && isset($_GET['text'])) : ?>

    <div class="form-alert-login alert alert-<?= $_GET['status']; ?> alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= $_GET['text']; ?> </strong>
    </div>
<?php endif; ?> 

    <div class="form-div border border-dark bg-custum-color shadow">
            <h1 class="h2 mb-3 font-weight-normal form-title">Connexion</h1>
            <form class="mt-3" method='POST' action="../actions/user_connection.php">
                <div class="d-flex flex-column align-items-center">
                <input
                    type="text"
                    name="login"
                    class="form-control input-custum"
                    placeholder="Entrer votre identifiant"
                    required
                    autofocus
                />
                <input
                    type="password"
                    name="password"
                    class="form-control input-custum"
                    placeholder="Mot de passe"
                    required
                />

              </div>
                <button type="submit" class="btn btn-outline-primary my-2 mb-3">Se Connecter</button>

              </form>
              <p>Pas de compte? <a href="form_register.php">inscrivez vous, ici</a></p>

              <p class="mt-2 mb-2 text-muted">&copy; Expernet-sgm 2020</p>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>