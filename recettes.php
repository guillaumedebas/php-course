<!-- index.php -->
<!-- inclusion des variables et fonctions -->
        <?php
        include_once('includes/variables.php');
        include_once('includes/functions.php');
        ?>
<?php

if ((!isset($_POST['login']) || !isset($_POST['password']))) {
    echo "absence de donnée<br>";
    echo "retour au login : <a href='login.php'>Login</a>";
    return;
} elseif (!($_POST['login'] == 'contact@guillaume-debas.com' && $_POST['password'] == 'azerty123')) {
    echo "erreur de connexion<br>";
    echo "retour au login : <a href='login.php'>Login</a>";
    return;
}
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

        <?php include_once('includes/header.php'); ?>
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