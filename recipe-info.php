<?php
include_once 'includes/session_check.php';
$getData = $_GET;
if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo ('Id nécessaire');
}

require_once 'includes/db_connect.php';

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id= :id');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

$retrieveCommentStatement = $mysqlClient->prepare('SELECT u.full_name, c.comment FROM recipes r INNER JOIN comments c ON c.recipe_id = r.recipe_id INNER JOIN users u ON u.user_id = c.user_id WHERE r.recipe_id = :id');
$retrieveCommentStatement->execute([
    'id' => (int)$getData['id'],
]);
$comments = [];
while ($row = $retrieveCommentStatement->fetch(PDO::FETCH_ASSOC)) {
    $comments[] = $row;
}
print_r($comments);


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
        <?php include_once('includes/login.php'); ?>

        <?php if (isset($loggedUser)) :
        ?>
            <?php include_once('includes/header.php'); ?>

            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo $recipe['author']; ?></i>
                <?php foreach ($comments as $comment) : ?>
                    <div><?php echo htmlspecialchars($comment['full_name']); ?>: <?php echo htmlspecialchars($comment['comment']); ?></div>
                <?php endforeach; ?>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><a class="link-warning" href="update-recipe.php?id=<?php echo ($recipe['recipe_id']); ?>">Editer la recette</a></li>
                    <li class="list-group-item"><a class="link-danger" href="delete-recipe.php?id=<?php echo ($recipe['recipe_id']); ?>">Supprimer la recette</a></li>
                </ul>
            </article>
    </div>
<?php endif; ?>
<?php include_once('includes/footer.php'); ?>
</body>

</html>