<?php
include_once 'includes/session_check.php';
$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo('Id nécessaire');
}

require_once 'includes/db_connect.php';

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id= :id');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

?>

<!-- create-recipes-form.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Formulaire de Suppression de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once 'includes/welcome_message.php'; ?>
        <?php include_once('includes/header.php'); ?>
        <h2>Suppression de la recette</h2>
        <form action="recipes_post_delete.php" method="POST" >
        <div class="mb-3 visually-hidden">
        <label for="id" class="form-control" id="id" name="id" >Identifiant de la recette</label>
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>"> 
        </div>
        <p>Voulez-vous supprimer la recette <strong><?php echo($recipe['title']); ?></strong> ?</p>

      


            <button type="submit" class="btn btn-danger">La suppression est définitive</button>
        </form>
        <br />
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>