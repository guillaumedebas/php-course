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
            $sum = 2 + (5 - 3)*2 + 5/5 + 6%5;
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
            dit autrement : <?php echo 'Voici '.$fullname.', il a '.$userAge.' ans...'; ?><br>
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
                if($isOwner): ?>
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

$users = [$guillaume,$anna,$alice, $hermione];

echo $users[1][0];

//boucles
//while

$lines = 4; // nombre d'utilisateurs dans le tableau
$counter = 0;
echo "<br>";
while ($counter < $lines) {
    echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
    $counter++; // Ne surtout pas oublier la condition de sortie !
}

?>

            
        </p>
    </body>
</html>