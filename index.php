<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <title>Travail a faire</title>
    </head>
    <body>
        <div class="form">
            <h2 class ="h2">Merci de remplir le formulaire</h2>
            <fieldset>
            <form method ="post" action="" class="formulaire">
            <input type = "text" name="prenom" placeholder="Prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
            <input type = "text" name="nom" placeholder="Nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"><br><br>
            <input type = "text" name="adress" placeholder="Adresse" value="<?php if (isset($_POST['adress'])){echo $_POST['adress'];} ?>"><br><br>
            <input type = "text" name="numero" placeholder="Numero" value="<?php if (isset($_POST['numero'])){echo $_POST['numero'];} ?>">
            <input type = "text" name="confirmer" placeholder="Confirmer le numero" value="<?php if (isset($_POST['confirmer'])){echo $_POST['confirmer'];} ?>"><br><br>
            <select class="valider" name="genre">
            <option value=" ">Genre</option>
            <option value="homme" <?php if (isset($_POST['genre']) && $_POST['genre']== "homme"){echo "selected";} ?>>Homme</option>
            <option value="femme" <?php if (isset($_POST['genre']) && $_POST['genre']== "femme"){echo "selected";} ?>>Femme</option>
            </select><br><br>
            <label for="">Etes vous satisfaites?</label>
            <legend>Oui</legende>
            <input type = "radio" name="choix" value="Oui" CHECKED>
            <legend>Non</legende>
            <input type = "radio" name="choix" value="Non" <?php if (isset($_POST['choix']) && $_POST['choix']== "Non"){echo "CHECKED";} ?>><br>
            <h4 class ="h1">Vous parlez quelles langues?</h4>
            <label for="francais">Francais</label>
            <input type = "checkbox" name="langue[]" value="Francais"  <?php if (isset($_POST['langue'][0])){echo "CHECKED";} ?>>
            <label for="anglais">Anglais</label>
            <input type = "checkbox" name="langue[]" value="Anglais" <?php if (isset($_POST['langue'][1])){echo "CHECKED";} ?>>
            <label for="espagnol">Espagnol</label>
            <input type = "checkbox" name="langue[]" value="Espagnol" <?php if (isset($_POST['langue'][2])){echo "CHECKED";} ?>>
            <label for="portuguais">Portuguais</label>
            <input type = "checkbox" name="langue[]" value="Portuguais" <?php if (isset($_POST['langue'][3])){echo "CHECKED";} ?>><br><br>
            <input type="text" name="commentaire" placeholder="Vos commentaires ici" value ="<?php if (isset($_POST['commentaire'])){echo $_POST['commentaire'];} ?>"/><br><br>
            <input class="valider" type="submit" name="valider" value= "valider">
            <input class="valider" type="submit" name="reinitialiser" value= "reinitialiser">
            </fomr>
            </fieldset>
        </div>
        <?php 
        include_once('fonction.php');
            if (isset($_POST['valider']))
            {
                $tablangue=$_POST['langue'];
                if(!(empty($_POST['prenom'] && $_POST['nom'] && $_POST['adress'] && $_POST['numero'] && $_POST['confirmer'] && $_POST['genre'] && $_POST['choix'] && $_POST['commentaire'])))
                {
                    if (strlen($_POST['prenom'])>=2 && strlen($_POST['nom'])>=2)
                    {
                        if (preg_match ('#^[A-Z]#',$_POST['prenom']) && preg_match ('#^[A-Z]#',$_POST['nom']))
                        {
                            if (strlen($_POST['adress'])>=5)
                            {
                                if (preg_match ('#[0123456789-? ]#',$_POST['numero']) && strlen($_POST['numero'])==12)
                                {
                                    if (preg_match ('#^77#',$_POST['numero']) || preg_match ('#^76#',$_POST['numero']) || preg_match ('#^78#',$_POST['numero']) || preg_match ('#^75#',$_POST['numero']))
                                    {
                                        if ($_POST['numero'] == $_POST['confirmer'])
                                        {
                                            $texte=$_POST['commentaire'];
                                            if (bonPhrase($texte))
                                            {
                                                $tab=explode("." ,$texte);
                                                if (sizeof($tab)>=4)
                                                {
                                                  if (sizeof($tablangue)>=2)
                                                  {
                                                    $tabfinale= array('prenom'=> $_POST['prenom'] , 'nom'=> $_POST['nom'] , 'adresse'=> $_POST['adress'] , 'numero' => $_POST['numero'] ,'genre'=> $_POST['genre'] , 'choix' => $_POST['choix'] ,'Langues' => $tablangue , 'commentaires' => $_POST['commentaire']);
                                                    ?>
                                                    <div class = "final">
                                                    <?php
                                                    echo $tabfinale['prenom'].' ';
                                                    echo $tabfinale['nom'].' ';
                                                    echo $tabfinale['adresse'].' ';
                                                    echo $tabfinale['numero'].'<br>';
                                                    echo $tabfinale['genre'].' ';
                                                    echo $tabfinale['choix'].' ';
                                                    foreach($tablangue as $langue)
                                                    {
                                                        echo $langue.' ';
                                                    }
                                                    echo '<br>';
                                                    echo $tabfinale['commentaires'];
                                                    ?>
                                                    </div>
                                                    <?php
                                                      
                                                  }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
                else
                {
                    echo "retaper";
                }
            }
        ?>

    </body>
</html>
