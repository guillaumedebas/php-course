<!-- login.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <h1>Login</h1>
        <form action="recettes.php" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="email" class="form-control" id="login" name="login" aria-describedby="login-help">
                <div id="login-help" class="form-text">Votre adresse email de connexion.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help">
                <div id="password-help" class="form-text">Celui qui vous a été communiqué à l'inscription.</div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>