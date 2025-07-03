<?php include "session.php"; ?> <!--  recupération des classes issues d'un autre fichier -->
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
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

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

    <h2 class="coiny">My Animal de compagnie 💗</h2>

    <!-- CREATE -->
    <form method="post" action="formulaire.php">
        <select class="coiny p1" name="nouvelAnimal" required>
            <option value="">Sélectionne ton animal --></option>
            <option value="ccccchat">Chat</option>
            <option value="chien">Chien</option>
            <option value="perroquet">Perroquet</option>
            <option value="limace">Limace</option>
        </select>
        <input class="p1" type="text" name="nom" placeholder="Nom" required>
        <input class="p1" type="text" name="age" placeholder="Âge en années" required>
        <input class="p1" type="text" name="poids" placeholder="Poids en kg" required>

        <button type="submit" name="action" value="create">Enregistre ton animal favori</button>
    </form>

    <?php if ($nouvelAnimal) : ?>
        <?php if ($animalUpdated): ?>
            <p class="coiny">
                Bravo, ton animal a été mis à jour :<br><span>
                <?= htmlspecialchars(ucfirst($nouvelAnimal->getNom())) ?></span><br>un.e 
                <?= htmlspecialchars(strtolower($nouvelAnimal->getTypeAnimal())) ?> de 
                <?= htmlspecialchars($nouvelAnimal->getAge()) ?> ans et 
                <?= htmlspecialchars($nouvelAnimal->getPoids()) ?> kg

            </p>
        <?php else: ?>
            <p class="coiny">Ton animal 💗 est <span>
                <?= ucfirst($nouvelAnimal->getNom())?></span><br>Un.e 
                <?= htmlspecialchars(strtolower($nouvelAnimal->getTypeAnimal())) ?>  de 
                <?= $nouvelAnimal->getAge() ?> ans et 
                <?= $nouvelAnimal->getPoids() ?> kg 
                <br><?= $nouvelAnimal->crier() ?>
            </p>
        <?php endif; ?>
    <!-- DELETE --> 
    <form class="formDelete" method="post" action="formulaire.php">
            <button class="btDelete coiny" type="submit" name="action" value="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')">Supprime ton animal</button>
    </form>    
        
    <!-- UPDATE -->    
    <form id="formUpdate">
            <button id="btUpdate" class="coiny" type="button" >Modifie ton animal favori</button>
    </form>  
    <form id="formUpdateFull" class="hide" method="post" action="formulaire.php">
        <!-- <h3 class="coiny p1">Modifie ton animal favori</h3> -->
        <select class="p1" name="nouvelAnimal" required>
            <option value="<?= $nouvelAnimal->getTypeAnimal() ?>"><?= $nouvelAnimal->getTypeAnimal() ?></option>
            <!-- il y a 2 fois $nouvelAnimal->getTypeAnimal() car 1er = typeAnimal obtenu par get (->à modifier)  
                                                            2eme nouveau choix qui sera de nouveau afficher par get  -->
        </select>
        <input class="p1" type="text" name="nom" value="<?= $nouvelAnimal->getNom() ?>">
        <input class="p1" type="text" name="age" value="<?= $nouvelAnimal->getAge() ?>">
        <input class="p1" type="text" name="poids" value="<?= $nouvelAnimal->getPoids() ?>">
        <button type="submit" name="action" value="update">Mettre à jour</button>    
    </form>
    <?php endif; ?>


    <script>
    document.getElementById('btUpdate').addEventListener('click', function() {
        // Cache tout le formulaire contenant le bouton
        document.getElementById('formUpdate').style.display = 'none';
        // Affiche le formulaire complet
        document.getElementById('formUpdateFull').classList.remove('hide');
    });

    //     document.getElementById('btUpdate').addEventListener('click', function() {
    //     this.style.display = 'none';
    //     document.getElementById('formUpdateFull').classList.remove('hide');
    // });
    //     document.getElementById('formUpdate').addEventListener('click', function() {
    //         // Cache le formUpdate (sous le button pour garder style du button)
    //         this.style.display = 'none';
    //    });



        // document.getElementById('btUpdate').addEventListener('click', function() {
        //     // Cache le bouton btUpdate
        //     this.style.display = 'none';
        //     // Affiche le formulaire de modification
        //     document.getElementById('formUpdateFull').classList.remove('hide');
        // });
        // document.getElementById('formUpdate').addEventListener('click', function() {
        //     // Cache le formUpdate (sous le button pour garder style du button)
        //     this.style.display = 'none';
    //    });

</script>
<!-- <script>
    document.getElementById('btUpdate').addEventListener('click', function() {
        // Cache le bouton
        this.style.display = 'none';
        // Affiche le formulaire de modification
        document.getElementById('formUpdateFull').style.display = 'block';
    });
        document.getElementById('formUpdate').addEventListener('click', function() {
        // Cache le bouton
        this.style.display = 'none';
    });

</script> -->
</body>
</html>



