<?php
session_start();
include_once "classe_php.php";

// Initialisation des variables
$nouvelAnimal = $_SESSION['nouvelAnimal'] ?? null;
$animalUpdated = false;

// Vérifier si l'animal a été mis à jour
if (isset($_SESSION['animal_updated'])) {
    $animalUpdated = true;
    unset($_SESSION['animal_updated']);
}

// Logique pour CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "create") {
    // Validation des données
    $nom = trim($_POST["nom"]);
    $age = (int)$_POST["age"];
    $poids = (float)$_POST["poids"];
    
    if (!empty($nom) && $age > 0 && $poids > 0) {
        switch ($_POST["nouvelAnimal"]) {
            case "Chien":
                $_SESSION['nouvelAnimal'] = new Chien($nom, $age, $poids);
                break;
            case "Chat":
                $_SESSION['nouvelAnimal'] = new Chat($nom, $age, $poids);
                break;
            case "Perroquet":
                $_SESSION['nouvelAnimal'] = new Perroquet($nom, $age, $poids);
                break;
        }
    }
    header('Location: formulaire.php');
    exit;
}

// Logique pour DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "delete") {
    unset($_SESSION["nouvelAnimal"]);
    header('Location: formulaire.php');
    exit;
}

// Logique pour UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === "update") {
    if ($nouvelAnimal) {
        $nom = trim($_POST["nom"]);
        $age = (int)$_POST["age"];
        $poids = (float)$_POST["poids"];
        
        if (!empty($nom) && $age > 0 && $poids > 0) {
            $nouvelAnimal->setNom($nom);
            $nouvelAnimal->setAge($age);
            $nouvelAnimal->setPoids($poids);
            $_SESSION['animal_updated'] = true;
        }
    }
    header('Location: formulaire.php');
    exit;
}
?>