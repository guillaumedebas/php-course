<?php

if((!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) || (!isset($_GET['message']) || empty($_GET['message']))) {
    echo "Erreur d'informations lors de l'affichage du formulaire";

    return;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Contact</title>
</head>
     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('includes/header.php'); ?>
    <h1>Message reçu</h1>
        <div class="card">
            <article class="card-body">
                <h2 class="card-title">Rappel de vos informations</h2>
                <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?> </p>
                <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?> </p>
                   </article>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('includes/footer.php'); ?>
</body>
</html>