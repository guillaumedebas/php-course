<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['title'])
        && isset($_POST['recipe'])
        && trim($_POST['title']) !== ''
        && trim($_POST['recipe']) !== ''
    ) {
        $title = $_POST['title'];
        $recipe = $_POST['recipe'];
    } else {
        echo "Tous les champs sont requis et ne doivent pas être vides.";
    }
} else {
    echo "Accès non autorisé.";
}

try
{
	$mysqlClient = new PDO(
        'mysql:host=localhost;dbname=we_love_food;charset=utf8',
         'root', 
         '',
         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title,recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe -> execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    // 'author' => $loggedUser['email']
     'author' => 'test'
]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Formulaire de Validation de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php include_once('includes/header.php'); ?>
        <h1>Contactez nous</h1>
        <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            </div>
            <!-- Ajout champ d'upload ! -->
            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" />
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>