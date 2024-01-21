<?php
include_once 'includes/session_check.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['id'])
        &&isset($_POST['title'])
        && isset($_POST['recipe'])
        && trim($_POST['title']) !== ''
        && trim($_POST['recipe']) !== ''
    ) {
        $title = $_POST['title'];
        $recipe = $_POST['recipe'];
        $id = $_POST['id'];
    } else {
        echo "Tous les champs sont requis et ne doivent pas être vides.";
    }
} else {
    echo "Accès non autorisé.";
}

require_once 'includes/db_connect.php';
$insertRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id= :id');
$insertRecipeStatement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id
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
        <h1>Recette Mise à jour</h1>
        <?php
        if (isset($title) && isset($recipe) && isset($loggedUser)) {
            echo "<div class='alert alert-success'>";
            echo "<h2>Confirmation</h2>";
            echo "<p>Votre recette intitulée '<strong>" . htmlspecialchars($title) . "</strong>' a été mise à jour avec succès.</p>";
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