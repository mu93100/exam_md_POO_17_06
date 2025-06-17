
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exam_md_POO_17_06</title>
</head>
<body>
    <form method="post" action="session.php">
        <label for="nouvelAnimal">Crée ton animal favori</label>
        <select name="nouvelAnimal">
            <option value="chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Perroquet">Perroquet</option>
        </select>
        <input type="text" name="nom" placeholder="Nom" >
        <input type="text" name="age" placeholder="Age" >
        <input type="text" name="poids" placeholder="Poids" >

        <button type="submit" name="action" value="create">Enregistre ton animal favori</button>
    </form>
</body>
</html>
<?php   
// include "resultat.php";
include "session.php"; // recupération des classes issu d'un autre fichier

// logique pour READ
if ($nouvelAnimal) {
    echo "mon animal favori est un {$nouvelAnimal->getTypeAnimal()}, prénommé {$nouvelAnimal->getNom()}, de {$nouvelAnimal->getAge()} ans, et de {$nouvelAnimal->getPoids()} kg "; // echo, concatenation, puis affichage de la marque
    echo "<br>";
    echo "<pre>";
    print_r($nouvelAnimal);
    echo "</pre>";
    echo "<hr>";
}

// logique et form delete   
if ($nouvelAnimal) {
    // si $session['objet'] existe alors on affiche le form delete    
?>
    <form method="post" action="session.php">
        <!-- <input type="hidden" name="action" value="delete">
        <button type="submit">delete</button> -->
        <button type="submit" name="action" value="delete">Supprimer ton animal</button>
    </form>
<?php
}

// logique et form update
if ($nouvelAnimal) {
?>
    <form method="post" action="session.php">
        <select name="nouvelAnimal">
            <option value=<?=  $nouvelAnimal->getTypeAnimal() ?>> <?=  $nouvelAnimal->getTypeAnimal() ?></option>
        </select>
        <input type="text" name="nom" value="<?= $nouvelAnimal->getNom() ?>">
        <input type="text" name="age" value="<?= $nouvelAnimal->getAge() ?>">
        <input type="text" name="poids" value="<?= $nouvelAnimal->getPoids() ?>">
        <button type="submit" name="modifier" value="update">Mettre à jour</button>    </form> -->
    </form>
<?php
}
?>