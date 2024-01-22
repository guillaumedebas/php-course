<!-- index.php -->
<?php
include_once 'includes/session_check.php';


include_once('includes/variables.php');
include_once('includes/functions.php');
if (!isset($_SESSION['LOGGED_USER'])) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        foreach ($users as $user) {
            if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                if (isset($_POST['stayLoggedIn']) && $_POST['stayLoggedIn'] == 'on') {
                    setcookie(
                        'LOGGED_USER',
                        $user['email'],
                        time() + 86400,
                        '/',
                        '',
                        isset($_SERVER["HTTPS"]),
                        true
                    );
                    header("Location: recettes.php");
                } else {
                    $_SESSION['LOGGED_USER'] = $user['email'];
                    header("Location: recettes.php");
                }
            } else {
                $loginError = "Erreur de Login ou de Password";
            }
        }
    }
}
 
require_once 'includes/db_connect.php';

if (isset($loggedUser)) {
    $recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled');
    $author = $loggedUser;
    $recipesStatement->execute([
        'author' => $author,
        'is_enabled' => 1
    ]);
    $recipes = $recipesStatement->fetchAll();
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
        <?php include_once 'includes/welcome_message.php'; ?>
        <?php include_once('includes/login.php'); ?>

        <?php if (isset($loggedUser)) :
        ?>
            <?php include_once('includes/header.php'); ?>

            <?php foreach ($recipes as $recipe) : ?>
                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo $recipe['author']; ?></i>
                    <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><a class="link-warning" href="update-recipe.php?id=<?php echo($recipe['recipe_id']); ?>">Editer la recette</a></li>
                    <li class="list-group-item"><a class="link-danger" href="delete-recipe.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer la recette</a></li>
                    </ul>
                </article>
            <?php endforeach ?>
        <?php
        endif; ?>

    </div>


    <?php include_once('includes/footer.php');    ?>
</body>

</html>