<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <?php
    session_start();
        if(isset($_SESSION['userId'])){
            header('Location:../index.php');
        } 
    
    ?>

    <div class="container">
    <form method = 'POST' action="../actions/user_connection.php" class="was-validated">
        <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" id="login" placeholder="Entrer votre identifiant" name="login" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Veuillez remplir ce champ</div>
        </div>
        <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" class="form-control" id="password" placeholder="Entrer votre Mot de Passe" name="password" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Veuillez remplir ce champ</div>
        </div>
        
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
    </div>

    <?php
        if((isset($_GET['err']))){
            $err = $_GET['err'];
            echo "<p style='text-align: center'>$err</p>";
        }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>