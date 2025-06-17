<!-- CRUD -->

<?php

// include "formulaire.php"; 
include "resultat.php";

session_start();

// CREATION D'UN OBJET AVEC UN FORMULAIRE 

// logique pour CREATE
    
$nouvelAnimal = $_SESSION['nouvelAnimal'] ?? null;
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['action']) && $_POST['action'] === "create") {    
    switch ($_POST["nouvelAnimal"]) {
        case "Chien":
            $_SESSION['nouvelAnimal'] = new Chien((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
        case "Chat":
            $_SESSION['nouvelAnimal'] = new Chat((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
        case "Perroquet":
            $_SESSION['nouvelAnimal'] = new Perroquet((string)$_POST["nom"], (int)$_POST["age"], (float)$_POST["poids"]);
            break;
    }
    echo $_SESSION;
    header('Location: formulaire.php');
    exit;
}

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







?>