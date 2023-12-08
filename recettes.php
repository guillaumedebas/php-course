<!-- index.php -->
<?php session_start(); ?>
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

      <?php include_once('includes/login.php'); ?>

    <?php if($_SESSION['LOGGED_USER']) : 
     echo 'Bienvenue ' . $_SESSION['LOGGED_USER'].' ' ;
    ?>
   <a href='<?php session_destroy();?>'>Déconnexion</a>
        <h1>Site de recettes</h1>

      
        <?php include_once('includes/header.php'); ?>

        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
        <?php endif; ?>
    </div>

 
    <?php include_once('includes/footer.php');    ?>
</body>

</html>