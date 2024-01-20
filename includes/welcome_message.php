<?php if (isset($loggedUser)) :
            echo 'Bienvenue ' . $loggedUser . ' ';
        ?>
            <a href="includes/logout.php">Déconnexion</a>
            <h1>Site de recettes</h1>
        <?php
        endif; ?>