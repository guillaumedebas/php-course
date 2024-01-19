<!-- index.php -->
<?php
session_start();


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

if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled');
if (isset($_COOKIE['LOGGED_USER'])) {
$author = $_COOKIE['LOGGED_USER'];
} else {
$author = $_SESSION['LOGGED_USER'];
}
$recipesStatement->execute([
    'author' => $author,
    'is_enabled' => 0
    ]);
$recipes =$recipesStatement->fetchAll();
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

        <?php include_once('includes/login.php'); ?>
        <?php if (isset($_SESSION['LOGGED_USER']) || isset($_COOKIE['LOGGED_USER'])) :
            if (isset($_SESSION['LOGGED_USER'])) {
                echo 'Bienvenue ' . $_SESSION['LOGGED_USER'] . ' ';
            } elseif (isset($_COOKIE['LOGGED_USER']) && ($_COOKIE['LOGGED_USER'])) {
                echo 'Bienvenue ' . $_COOKIE['LOGGED_USER'] . ' ';
            }

        ?>
            <a href="includes/logout.php">Déconnexion</a>
            <h1>Site de recettes</h1>


            <?php include_once('includes/header.php'); ?>

            <?php foreach ($recipes as $recipe) : ?>
                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                   <i><?php echo $recipe['author']; ?></i>
                </article>
            <?php endforeach ?>
        <?php
        endif; ?>

    </div>


    <?php include_once('includes/footer.php');    ?>
</body>

</html>