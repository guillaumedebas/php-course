<!-- index.php -->
<!-- inclusion des variables et fonctions -->
<?php
include_once('includes/variables.php');
include_once('includes/functions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
<?php

<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['password']) {
            echo 'Bienvenue ' . $user['full_name'];
            // Ajouter une instruction break ou autre logique de redirection après la réussite de la connexion
            break;
        }
    }
    ?>
    <?php if (!isset($_POST['login']) || !isset($_POST['password'])): ?>
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
       
<?php endif; ?>

        
        <h1>Site de recettes</h1>

        <!-- inclusion de l'entête du site -->
        <?php include_once('includes/header.php'); ?>

        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('includes/footer.php'); ?>
</body>
</html>