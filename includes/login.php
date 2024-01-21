  <?php


  if (!isset($_SESSION['LOGGED_USER']) && !isset($_COOKIE['LOGGED_USER'])) {
    if (isset($loginError)) {
      echo "Erreur de Login ou de Password";
    }
    include_once('connexion_form.php');
  }

  ?> 