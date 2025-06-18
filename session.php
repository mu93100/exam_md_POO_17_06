<!-- CRUD -->

<?php

include "formulaire.php"; 
include "resultat.php";


session_start();

// CREATION D'UN OBJET AVEC UN FORMULAIRE 

// logique pour CREATE
    
$nouvelAnimal = $_SESSION['nouvelAnimal'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['action']) && $_POST['action'] === "create") {    
    switch ($_POST["nouvelAnimal"]) {
        case "Chien":
            $_SESSION['nouvelAnimal'] = new Chien((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]); // en cas de nouvelAnimal =chien, tu mets le nom, age poids via post
            break;
        case "Chat":
            $_SESSION['nouvelAnimal'] = new Chat((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
        case "Perroquet":
            $_SESSION['nouvelAnimal'] = new Perroquet((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
    }
    // echo $_SESSION;
    // header('Location: formulaire.php');
    // exit;
}


// correction : on peuit ecrire create session cô ça
// $_SESSION['animalNouveau'] = new AnimalCompagnie;
// $_SESSION['animalNouveau']->nom = "Médor";
// $_SESSION['animalNouveau']->age = "12";
// $_SESSION['animalNouveau']->poids = "55";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === "delete") {
        unset($_SESSION["nouvelAnimal"]);
        header('Location: formulaire.php');
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "update") {
    $_SESSION['nouvelAnimal']->setNom($_POST["nom"]);
    $_SESSION['nouvelAnimal']->setAge((int)$_POST["age"]); 
    $_SESSION['nouvelAnimal']->setPoids((int)$_POST["poids"]); 
    header('Location: formulaire.php');
    exit;
}


// logique pour READ
$nouvelAnimal= $_SESSION["nouvelAnimal"] ?? null;

if ($nouvelAnimal) {
    // echo "mon animal 💗 est un {$nouvelAnimal->getTypeAnimal()}, prénommé {$nouvelAnimal->getNom()}, de {$nouvelAnimal->getAge()} ans, et de {$nouvelAnimal->getPoids()} kg "; // echo, concatenation, puis affichage de la marque
    echo "<p >mon animal 💗 est un <? $nouvelAnimal->getTypeAnimal() ?> de <?= $nouvelAnimal->getAge()?> ans, et de <?=$nouvelAnimal->getPoids()?> kg,<br>il s'appelle <?= $nouvelAnimal->getNom()?></p>";
    echo "<br>";
    echo "<pre>";
    print_r($nouvelAnimal);
    echo "</pre>";
    echo "<hr>";
    // ON POURRAIT ECRIRE CÖ ça 
// $exemple= new Chien ("igor", 2, 10);
// echo $exemple-> getNom();
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

// logique et form update QUI MARCHE Wé avec Najiba
if ($nouvelAnimal) {
?>
    <h3 class="font p1">Essai logique ds session.php <br> CODE QUI MARCHE Wé avec Najiba</h3>

    <form method="post" action="session.php" >
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
echo "💣🙀🙀 print_rdePOST<pre>";
print_r($_POST);
echo "</pre>";
echo "👻👻👻 print_rdeSESSION<pre>";
print_r($_SESSION);
echo "</pre>";
echo "✅✅✅print_rDE\$nouvelAnimal<pre>";
print_r($nouvelAnimal);
echo "</pre>";
?>


<!-- <option value="" style="color: pink">Type d'animal</option>
            <option value="chat" style="color: pink">Chat</option>
            <option value="Chien" style="color: blue">Chien</option>
            <option value="Perroquet" style="color: green">Perroquet</option>
-->


?>