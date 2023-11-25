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
           
            //phpinfo();
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
<?php
//les ternaires
$userAge = 24;

$isAdult = ($userAge >= 18) ? true : false;

// Ou mieux, dans ce cas précis
$isAdult = ($userAge >= 18);
?>

            
        </p>
    </body>
</html>