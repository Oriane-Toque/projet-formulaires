<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Permis de conduire</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <main>
            <h1>Inscription au permis de conduire</h1>
            <form action="" method="GET">
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname">
                <label for="age">Âge</label>
                <input type="number" name="age" id="age">
                <input type="submit" value="Je m'inscris">
            </form>
        </main>
        <aside>
            <h1>Résumé de l'inscription</h1>
            <h2>Inscription de </h2>
            <div class="answer">
                
                <!-- Notre code ici : -->
                <!-- Si on reçoit une réponse du formulaire (donc si notre variable $_GET est remplie), alors on affiche le nom et le prénom de la personne qui souhaite s'inscrire. -->
                <!-- if (!empty($_GET)) //si $_GET n'est pas vide alors...
                {
                    echo $_GET['lastname'].' '.$_GET['firstname'];
                } 
                
                OU-->

                <?php 
                    
                    //je vérifie que le formulaire n'est pas vide et que tous les champs sont bien remplis
                    if (count($_GET) > 0) :
                       //je récupère les données remplies dans le formulaire
                        $lastname = $_GET['lastname'];
                        $firstname = $_GET['firstname'];
                        $age = $_GET['age']; 

                        if (!empty($lastname) && !empty($firstname) && !empty($age)) :
                ?>
                        <!-- alors j'affiche le nom et prénom -->  
                        <?= $_GET['lastname']; ?> <?= $_GET['firstname']; ?> 

                
                <!-- Sinon rien n'est affiché -->

            </div>
            <h2>Autorisation </h2>
            <div class="answer">
                
                <!-- Notre code ici : -->
                <!-- Si on reçoit une réponse du formulaire (donc si notre variable $_GET est remplie), alors : 
                    - On récupère l'âge de la personne
                    - On vérifie cet âge :
                        - S'il est inférieur à 16 ans, on affiche "Trop jeune pour s'inscrire"
                        - S'il l'âge est situé entre 16 et 18 ans, on affiche "Inscription possible en conduite accompagnée"
                        - Sinon, afficher "Inscription possible"
                -->

                <?php
                    //je vérifie que le formulaire n'est pas vide et que tous les champs sont bien remplis
                    if (!empty($age) && $age > 0)
                    {
                        //si j'ai moins de 16 ans
                        if ($age < 16)
                        {
                            $attente = 16 - $age;
                            echo 'Vous êtes trop jeune pour vous inscrire<br>';
                            echo 'Vous pourrez vous inscrire dans '.$attente.' ans';
                        }
                        //sinon si j'ai entre 16 et 18ans inclus
                        elseif ($age < 18)
                        {
                            echo 'Inscription possible en conduite accompagnée';
                        }
                        //sinon pour tous les âges supérieurs à 18ans
                        else
                        {
                            echo 'Inscription possible';
                        }
                    }
                    else
                    {
                        echo "N'oubliez pas d'indiquer votre âge";
                    }
                ?>
                <?php
                        endif;
                    endif; 
                ?>


            </div>
        </aside>
    </body>
</html>
