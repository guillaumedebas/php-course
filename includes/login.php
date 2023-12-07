  <?php
    if (isset($_POST['login']) && isset($_POST['password']))
        foreach ($users as $user) {
            if ($user['email'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                echo 'Bienvenue ' . $user['full_name'];
                $loggedUser = [
                    'email' => $user['email']
                ];
                break;
            }
        }

    if (!isset($_POST['login']) || !isset($_POST['password'])) {
        include_once('connexion_form.php');
    }elseif (!$loggedUser) {
        echo "Erreur de Login ou de Password";
        include_once('connexion_form.php');
    }

    ?>