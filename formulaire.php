
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exam_md_POO_17_06</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Beastly&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Underline:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php   
include "session.php"; // recupération des classes issues d'un autre fichier
?>
    <!--CORRECTION MU Comment soumettre un formulaire à une autre page ?
Lier le bouton Soumettre à une autre page à l'aide des balises de formulaire en HTML
Ici, déclarez/écrivez le bouton « Envoyer » dans les balises de formulaire HTML et indiquez le chemin d'accès au fichier dans la propriété action du formulaire HTML . 
Lorsque l'utilisateur cliquera sur le bouton du formulaire, il sera redirigé vers une autre page.

action = "page des resultats du formulaire"
si on reste sur la m^p. :::
<!-- Sans action -->
<!-- <form method="post"> -->
<!-- Action vide -->
<!-- <form method="post" action="">  ===Action vers la même page -->

<!-- sinon ::: <form method="post" action="session.php"> --> 
<h2 class="coiny">Mon Animal de compagnie 💗</h2>
<!-- CREATE -->
    <form method="post" action="formulaire.php">
        <!-- <input type="hidden" for="nouvelAnimal" > -->
        <select class="coiny p1" name="nouvelAnimal" required>
            <option value="">Sélectionne ton animal --></option>
            <option value="Chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Perroquet">Perroquet</option>
        </select>
        <input class="p1" type="text" name="nom" placeholder="Nom" required>
        <input class="p1" type="text" name="age" placeholder="Age" required>
        <input class="p1" type="text" name="poids" placeholder="Poids" required>
    
        <button type="submit" name="action" value="create">Enregistre ton animal favori</button>
    </form>

<?php if (isset($nouvelAnimal)) : ?>
    <p class="coiny">Ton animal 💗 est <span><?= ucfirst($nouvelAnimal->getNom())?></span>
    <br>un  <?= $nouvelAnimal->getTypeAnimal() ?>  de <?= $nouvelAnimal->getAge() ?> ans et <?= $nouvelAnimal->getPoids() ?> kg 
    <br><?= $nouvelAnimal->crier() ?>
    </p>

<!-- DELETE --> 
    <form class="formDelete" method="post" action="formulaire.php">
        <button class="btDelete coiny" type="submit" name="action" value="delete">Supprime ton animal</button>
    </form>    
    
<!-- UPDATE -->     
    <form class="formUpdate" method="post" action="formulaire.php" >
        <h3 class="coiny p1">Modifie ton animal favori</h3>
        <select name="nouvelAnimal" required>
            <option value="<?= $nouvelAnimal->getTypeAnimal() ?>"><?= $nouvelAnimal->getTypeAnimal() ?></option>
            <!-- il y a 2 fois $nouvelAnimal->getTypeAnimal() car 1er = typeAnimal obtenu par get (->à modifier)  
                                                            2eme nouveau choix qui sera de nouveau afficher par get  -->
        </select>

        <input type="text" name="nom" value="<?= $nouvelAnimal->getNom() ?>">
        <input type="text" name="age" value="<?= $nouvelAnimal->getAge() ?>">
        <input type="text" name="poids" value="<?= $nouvelAnimal->getPoids() ?>">
        <button type="submit" name="modifier" value="update">Mettre à jour</button>    
    </form>

    <p class="coiny" <?= $animalUpdated ? 'animal-modified' : '' ?>">
    Ton animal favori modifié est un <?= $nouvelAnimal->getTypeAnimal() ?> de <?= $nouvelAnimal->getAge() ?> ans et <?= $nouvelAnimal->getPoids() ?> kg
    <br>Il s'appelle <?= ucfirst($nouvelAnimal->getNom())?>
    <br><?= $nouvelAnimal->crier() ?>


<?php endif; ?>

</body>
</html>



