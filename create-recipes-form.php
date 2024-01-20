<?php
include_once 'includes/session_check.php';
?>

<!-- create-recipes-form.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Formulaire de Création de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once 'includes/welcome_message.php'; ?>
        <?php include_once('includes/header.php'); ?>
        <h1>Contactez nous</h1>
        <form action="create-recipes-valid.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="title" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Votre recette</label>
                <textarea class="form-control" placeholder="Votre recette ici" id="recipe" name="recipe"></textarea>
            </div>



            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>