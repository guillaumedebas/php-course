  <?php
  if (!isset($_SESSION['LOGGED_USER'])) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        foreach ($users as $user) {
            if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                if (isset($_POST['stayLoggedIn']) && $_POST['stayLoggedIn'] == 'on') {
                     setcookie(
                        'LOGGED_USER',
                        $user['email'],
                        time() - 86400, // Expire dans 1 jour
                        '/', // Chemin d'accès au cookie
                        '', // Domaine, laisser vide si non nécessaire
                        isset($_SERVER["HTTPS"]), // Sécurisé si HTTPS est activé
                        true  // HttpOnly
                    );
                    break;
                } else {
                    $_SESSION['LOGGED_USER'] = $user['email'];
                    break;
                }
            }
             else {
               if(!isset($_SESSION['LOGGED_USER'])) {
                 $_SESSION['LOGGED_USER'] = false;
                 echo "ok";
                }
                 if(!isset($_COOKIE['LOGGED_USER']))
                 $_COOKIE['LOGGED_USER'] = false;
             }
         }
    }
  }

 if (!isset($_SESSION['LOGGED_USER']) || !isset($_COOKIE['LOGGED_USER'])) {
        include_once('connexion_form.php');
    } elseif (!$_SESSION['LOGGED_USER'] || !$_COOKIE['LOGGED_USER']) {
        echo "Erreur de Login ou de Password";
        include_once('connexion_form.php');
    }

    ?>