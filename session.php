<!-- CRUD -->

<?php
include_once "classe.php";
session_start();


// CREATION D'UN OBJET AVEC UN FORMULAIRE 

// logique pour CREATE
    
$nouvelAnimal = $_SESSION['nouvelAnimal'] ?? null;
$animalUpdated = false;

if (isset($_SESSION['animal_updated'])) {
    $animalUpdated = true;
    unset($_SESSION['animal_updated']);  
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "create") {    
    switch ($_POST["nouvelAnimal"]) {
        case "chien":
            $_SESSION['nouvelAnimal'] = new Chien((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]); // en cas de nouvelAnimal =chien, tu mets le nom, age poids via post
            break;
        case "chat":
            $_SESSION['nouvelAnimal'] = new Chat((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
        case "perroquet":
            $_SESSION['nouvelAnimal'] = new Perroquet((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
        case "limace":
            $_SESSION['nouvelAnimal'] = new Limace((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;            
    }
    header('Location: formulaire.php');
    exit;
}



// correction : on peut ecrire create session cô ça
// $_SESSION['animalNouveau'] = new AnimalCompagnie;
// $_SESSION['animalNouveau']->nom = "Médor";
// $_SESSION['animalNouveau']->age = "12";
// $_SESSION['animalNouveau']->poids = "55";

// logique pour DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === "delete") {
        unset($_SESSION["nouvelAnimal"]);
        header('Location: formulaire.php');
        exit;
    }
    $nouvelAnimal = $_SESSION['nouvelAnimal'] ?? null;
}
// logique pour UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "update") {
    $_SESSION['nouvelAnimal']->setNom($_POST["nom"]);
    $_SESSION['nouvelAnimal']->setAge((int)$_POST["age"]); 
    $_SESSION['nouvelAnimal']->setPoids((float)$_POST["poids"]); 
    $_SESSION['animal_updated'] = true; // rajouté pour modif texte
    header('Location: formulaire.php');
    exit;
}
if (isset($_SESSION['animal_updated'])) {
    $animalUpdated = true;
    unset($_SESSION['animal_updated']);  
}

?>