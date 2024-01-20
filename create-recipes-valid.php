<?php
include_once 'includes/session_check.php';
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

try {
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=we_love_food;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title,recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author' => $loggedUser
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
        <?php include_once 'includes/welcome_message.php'; ?>


        <?php include_once('includes/header.php'); ?>
        <h1>Recette validé</h1>
        <?php
        if (isset($title) && isset($recipe) && isset($loggedUser)) {
            echo "<div class='alert alert-success'>";
            echo "<h2>Confirmation</h2>";
            echo "<p>Votre recette intitulée '<strong>" . htmlspecialchars($title) . "</strong>' a été ajoutée avec succès.</p>";
            echo "<h3>Détails de la recette :</h3>";
            echo "<p><strong>Titre :</strong> " . htmlspecialchars($title) . "</p>";
            echo "<p><strong>Description :</strong> " . nl2br(htmlspecialchars($recipe)) . "</p>";
            echo "<p><strong>Auteur :</strong> " . htmlspecialchars($loggedUser) . "</p>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>