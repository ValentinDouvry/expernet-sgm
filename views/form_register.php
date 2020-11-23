<!doctype html>
<html lang="fr">

<head>
    <title>S'incrire</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/css/register.css">

    <script src="/src/js/app.js"></script>
</head>

<body>

    <div class="container">

        <h1 class="text-center">S'incrire</h1>

        <form method="post" action="/actions/register.php">

            <div class="form-group">
                <label for="username">Pseudo</label>
                <input type="text" class="form-control" id="username" placeholder="pseudo">
            </div>

            <div class="form-group">
                <label for="last-name">Nom</label>
                <input type="text" class="form-control" id="last-name" placeholder="nom">
            </div>

            <div class="form-group">
                <label for="name">Prenom</label>
                <input type="text" class="form-control" id="name" placeholder="prenom">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="password2">Verification de mot de passe</label>
                <input type="password" class="form-control" id="password2" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" placeholder="code groupe">
            </div>

            <button type="submit" class="btn btn-primary">Créer un compte</button>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>