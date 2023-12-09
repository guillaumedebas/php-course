  <?php
   if (isset($_POST['login']) && isset($_POST['password']))
        foreach ($users as $user) {
            if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                $_SESSION['LOGGED_USER'] = $user['email'] ;
                break;
            }
        }

    if (!isset($_POST['login']) || !isset($_POST['password'])) {
        if (!isset($_SESSION['LOGGED_USER'])) {
            include_once('connexion_form.php');
        }
        
        }elseif (!$_SESSION['LOGGED_USER']) {
        echo "Erreur de Login ou de Password";
        include_once('connexion_form.php');
    }

    ?>