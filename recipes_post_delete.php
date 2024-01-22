<?php
include_once 'includes/session_check.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['id'])
       
    ) {
       $id = $_POST['id'];
    } else {
        echo "Tous les champs sont requis";
    }
} else {
    echo "Accès non autorisé.";
}

require_once 'includes/db_connect.php';
$insertRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE  recipe_id= :id');
$insertRecipeStatement->execute([
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
        <h2>Recette Mise à jour</h2>
        <?php
        if (isset($id) && isset($loggedUser)) {
            echo "<div class='alert alert-success'>";
            echo "<h2>Confirmation</h2>";
            echo "<p>Votre recette  a été supprimée avec succès.</p>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>