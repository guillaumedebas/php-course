<!DOCTYPE html>
<html>

<head>
    <title>Notre première instruction : echo</title>
    <meta charset="utf-8" />
</head>

<body>
    <h2>Affichage de texte avec PHP</h2>

    <p>
        Cette ligne a été écrite entièrement en HTML.<br>
        <?php
        //phpinfo();
        //variable
        $userAge = 40;
        $fullname = "Guillaume Debas";
        $email = "contact@guillaume-debas.com";
        $money = "13.42";
        $sum = 2 + (5 - 3) * 2 + 5 / 5 + 6 % 5;
        $isEnable = false;
        $isOwner = true;

        //juste l'instruction echo
        /* un commentaire sur :
            plusieurs lignes ! */
        echo "Celle-ci a été écrite entièrement en PHP.";


        ?>
    </p>
    <p>
        nom de l'utilisateur : <?php echo $fullname; ?><br>
        email : <?php echo $email; ?><br>
        Âge : <?php echo $userAge; ?> ans<br>
        Argent restant : <?php echo $money; ?> €<br>
        en résumé, <?php echo "voici $fullname, il a $userAge ans et son email est $email !"; ?><br>
        dit autrement : <?php echo 'Voici ' . $fullname . ', il a ' . $userAge . ' ans...'; ?><br>
        <?php
        if ($isEnable) {
            echo 'c\'est vrai !';
        } elseif ($isOwner) {
            echo 'Proprio Only';
        }
        //ne pas oublier AND : &&  et OR ||
        ?><br>
        <?php
        //autre façon de gérer les if :
        if ($isOwner) : ?>
            ça marche aussi !
        <?php endif; ?><br>
        <?php
        $grade = 20;

        switch ($grade) // on indique sur quelle variable on travaille
        {
            case 0: // dans le cas où $grade vaut 0
                echo "Tu es vraiment un gros nul !!!";
                break;

            case 5: // dans le cas où $grade vaut 5
                echo "Tu es très mauvais";
                break;

            case 7: // dans le cas où $grade vaut 7
                echo "Tu es mauvais";
                break;

            case 10: // etc. etc.
                echo "Tu as pile poil la moyenne, c'est un peu juste…";
                break;

            case 12:
                echo "Tu es assez bon";
                break;

            case 16:
                echo "Tu te débrouilles très bien !";
                break;

            case 20:
                echo "Excellent travail, c'est parfait !";
                break;

            default:
                echo "Désolé, je n'ai pas de message à afficher pour cette note";
        }
        ?>
        <br>
        <?php
        //les ternaires
        $userAge = 24;

        $isAdult = ($userAge >= 18) ? true : false;

        // Ou mieux, dans ce cas précis
        $isAdult = ($userAge >= 18);

        //Tableaux
        $guillaume = ['Guillaume Debas ', 'contact@guillaume-debas.com', 40];
        $anna = ['Anna Joud-Debas ', 'anna@guillaume-debas.com', 36];
        $alice = ['Alice Debas ', 'alice@guillaume-debas.com', 7];
        $hermione = ['Hermione Debas ', 'hermione@guillaume-debas.com', 5];

        $users = [$guillaume, $anna, $alice, $hermione];

        echo $users[1][0];

        //boucles
        //while

        $lines = 4; // nombre d'utilisateurs dans le tableau
        $counter = 0;
        echo "<br>";
        while ($counter < $lines) {
            echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br>';
            $counter++; // Ne surtout pas oublier la condition de sortie !
        }


        //for
        echo "<br>";
        for ($lines = 0; $lines <= 3; $lines++) {
            echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br>';
        }
        //Tableaux / Arrays
        //tableau numéroté
        $familly = ['Guillaume', 'Anna', 'Alice', 'Hermione'];
        echo '<br>';
        echo $familly[3];
        $familly[4] = 'Jango';

        //tableau associatif
        $member = [
            'firstname' => 'Guillaume',
            'lastname' => 'Debas',
            'age' => '40'
        ];
        $member['job'] = 'Develloper';
        echo '<br>';
        echo $member['firstname'];

        //Parcourez un tableau
        // Déclaration du tableau des recettes
        $recipes = [
            ['Cassoulet', '[...]', 'mickael.andrieu@exemple.com', true,],
            ['Couscous', '[...]', 'mickael.andrieu@exemple.com', false,],
        ];

        foreach ($recipes as $recipe) {
            echo '<br>';
            echo $recipe[0]; // Affichera Cassoulet, puis Couscous

        }
        $recipe = [
            'title' => 'Salade Romaine',
            'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
            'author' => 'laurene.castor@exemple.com',
        ];

        echo '<br>';
        echo '<br>';
        foreach ($recipe as $property => $propertyValue) {
            echo '[' . $property . '] vaut ' . $propertyValue . PHP_EOL;
            echo '<br>';
        }


        echo '<pre>';
        print_r($recipes);
        echo '</pre>';

        // Vérifiez si une clé existe dans un tableau avec array_key_exists
        if (array_key_exists('title', $recipe)) {
            echo 'La clé se trouve dans le tableaux !';
            echo '<br>';
        } else {
            echo 'la clé ne se trouve pas dans le tableau';
            echo '<br>';
        }

        if (array_key_exists('commentaires', $recipe)) {
            echo 'La clé se trouve dans le tableaux !';
            echo '<br>';
        } else {
            echo 'la clé ne se trouve pas dans le tableau !';
            echo '<br>';
        }

        // Vérifiez si une valeur existe dans un tableau avec in_array
        $usersTest = [
            'Guillaume Debas',
            'Anna Joud-Debas',
            'Jango',
        ];

        if (in_array('Mathieu Nebra', $usersTest)) {
            echo 'l\'utilisateur fait bien partie des utilisateurs enregistrés !';
            echo '<br>';
        } else {
            echo 'l\'utilisateur ne fait pas partie des utilisateurs enregistrés !';
            echo '<br>';
        }

        if (in_array('Arlette Chabot', $usersTest)) {
            echo 'l\'utilisateur fait bien partie des utilisateurs enregistrés !';
        } else {
            echo 'l\'utilisateur ne fait pas partie des utilisateurs enregistrés !';
            echo '<br>';
        }

        //Récupérez la clé d'une valeur dans un tableau avec array_search

        $positionGuillaume = array_search('Guillaume Debas', $usersTest);
        echo '"Guillaume" se trouve en position ' . $positionGuillaume . PHP_EOL;
        echo '<br>';
        $positionAnna = array_search('Anna Joud-Debas', $usersTest);
        echo '"Anna" se trouve en position ' . $positionAnna . PHP_EOL;
        echo '<br>';

        //Les fonctions
        // 
        // str_replace pour rechercher et remplacer des mots dans une variable ;
        echo str_replace('c', 'C', 'le cassoulet, c\'est très bon');
        echo '<br>';
        // move_uploaded_file pour envoyer un fichier sur un serveur ;
        // imagecreate pour créer des images miniatures (aussi appelées "thumbnails") ;
        // mail pour envoyer un mail avec PHP (très pratique pour faire une newsletter) ;
        // de nombreuses options pour modifier des images, y écrire du texte, tracer des lignes, des rectangles, etc. ;
        // crypt pour chiffrer des mots de passe ;
        // date  pour renvoyer l'heure, la date, etc.

        // Manipulez du texte avec les fonctions
        //
        // strlen pour calculer la longueur d'une chaîne de caractères ;
        $recipe = 'Etape 1 : des flageolets ! Etape 2 : de la saucisse toulousaine';
        $length = strlen($recipe);
        echo 'La phrase ci-dessous comporte ' . $length . ' caractères :' . PHP_EOL . $recipe;
        echo '<br>';
        // str_replace pour rechercher et remplacer une chaîne de caractères ;
        // sprintf pour formater une chaîne de caractères.
        $recipeSI = [
            'title' => 'Salade Romaine',
            'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => true
        ];

        echo sprintf(
            '%s par "%s" : %s',
            $recipeSI['title'],
            $recipeSI['author'],
            $recipeSI['recipe']
        );

        //date
        echo '<br>';
        $year = date('Y');
        echo $year;
        echo '<br>';

        // Enregistrement les informations de date dans des variables

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $hour = date('H');
        $minut = date('i');

        // Affichage
        echo 'Bonjour ! Nous sommes le ' . $day . '/' . $month . '/' . $year . 'et il est ' . $hour . ' h ' . $minut;

        echo '<br>';

        function isValidRecipe(array $recipe): bool
        {
            if (array_key_exists('is_enabled', $recipe)) {
                $isEnable = $recipe['is_enabled'];
            } else {
                $isEnable = false;
            }
            return $isEnable;
        }

        // 2 exemples
        $romanSalad = [
            'title' => 'Salade Romaine',
            'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => true,
        ];

        $sushis = [
            'title' => 'Sushis',
            'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => false,
        ];


        $isRomanSaladValid = isValidRecipe($romanSalad);

        if ($isRomanSaladValid) {
            echo 'Valide !';
        }
        echo '<br>';
        ?>

        <a href="bonjour.php?nom=Debas&amp;prenom=Guillaume">Dis-moi bonjour !</a>
    </p>
</body>

</html>