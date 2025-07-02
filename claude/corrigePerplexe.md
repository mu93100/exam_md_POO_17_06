Merci pour tous les détails ! Voici une analyse complète de tes soucis et des solutions concrètes pour :

Le CSS (images de fond qui ne s’affichent pas)

Le message d’update qui ne s’affiche pas correctement

Quelques bonnes pratiques pour tes includes et la gestion de session

1. CSS : Images de fond qui ne s’affichent pas
Problème courant
Chemin relatif incorrect : Si tu utilises background-image: url(./fd.webp.webp); dans le CSS, le chemin est relatif au fichier CSS, pas au fichier HTML/PHP.

Double extension : fd.webp.webp semble étrange. Est-ce bien le nom réel du fichier ? Sinon, corrige-le (ex : fd.webp).

Dossier : Si tes images sont dans img/, utilise url(../img/fd.webp) ou url(img/fd.webp) selon l’emplacement du CSS.

Solution
Supposons que ton arborescence est :

text
- /
  - formulaire.php
  - session.php
  - classe.php
  - style.css
  - img/
      - fd.webp
      - stripes.png
Dans style.css, pour cibler une image dans img/ :

css
form {
    /* ... */
    background-image: url('img/fd.webp');
}
OU si le CSS est dans un sous-dossier, adapte le chemin (../img/fd.webp).

Vérifie aussi dans le navigateur (clic droit > Inspecter > Réseau > Images) que le chemin est correct et que l’image n’est pas en erreur 404.

Résumé
Vérifie le nom et l’extension de l’image.

Utilise le chemin relatif au CSS, pas au PHP/HTML.

Pour img/stripes.png dans .btDelete, même logique :

css
background-image: url('img/stripes.png');
2. Message d’update qui ne s’affiche pas correctement
Problème
Tu veux :

Afficher la phrase "Ton animal 💗 est un ..." seulement si l’animal n’a pas été modifié.

Quand il est modifié, afficher un message "Animal modifié !" (ou autre).

Solution
Dans ton formulaire.php, tu dois faire :

php
<?php
include_once "session.php";
?>

<?php if ($nouvelAnimal): ?>
    <?php if ($animalUpdated): ?>
        <p class="animal-modified">
            Bravo, ton animal a été mis à jour !<br>
            Nouveau nom : <?= htmlspecialchars($nouvelAnimal->getNom()) ?><br>
            Âge : <?= htmlspecialchars($nouvelAnimal->getAge()) ?> ans<br>
            Poids : <?= htmlspecialchars($nouvelAnimal->getPoids()) ?> kg
        </p>
    <?php else: ?>
        <p>
            Ton animal 💗 est un <?= htmlspecialchars($nouvelAnimal->getTypeAnimal()) ?> de nom <?= htmlspecialchars($nouvelAnimal->getNom()) ?>, âgé de <?= htmlspecialchars($nouvelAnimal->getAge()) ?> ans, pesant <?= htmlspecialchars($nouvelAnimal->getPoids()) ?> kg.
        </p>
    <?php endif; ?>
<?php endif; ?>
Attention :

Utilise htmlspecialchars() pour éviter les failles XSS.

Assure-toi que la variable $animalUpdated est bien transmise à formulaire.php via session.php.

Vérifie la logique dans session.php
Tu fais déjà :

php
$animalUpdated = false;
if (isset($_SESSION['animal_updated'])) {
    $animalUpdated = true;
    unset($_SESSION['animal_updated']);  
}
C’est correct, mais assure-toi que ce code s’exécute avant l’affichage du formulaire.

3. Bonnes pratiques et conseils supplémentaires
Inclure les classes avant session_start()
Dans chaque fichier qui utilise la session et les classes, fais :

php
require_once "classe.php";
session_start();
Ou, si tu veux centraliser, c’est bien de tout faire dans session.php et d’inclure uniquement session.php dans formulaire.php.

Chemins d’images dans le HTML
Si tu affiches une image dans le HTML, fais :

xml
<img src="img/monimage.png" alt="..." />
Assure-toi que le chemin est correct depuis le fichier HTML/PHP.

4. Résumé des corrections à faire
CSS : Corrige les chemins d’images (ex : url('img/fd.webp')).

Message d’update : Utilise une condition sur $animalUpdated pour afficher le bon message.

Session et includes : Inclure les classes avant d’utiliser la session.

5. Exemple de structure simplifiée
formulaire.php

php
<?php
include_once "session.php";
?>
<link rel="stylesheet" href="style.css">
<!-- ... -->
<?php if ($nouvelAnimal): ?>
    <?php if ($animalUpdated): ?>
        <p class="animal-modified">
            Bravo, ton animal a été mis à jour !<br>
            Nouveau nom : <?= htmlspecialchars($nouvelAnimal->getNom()) ?>
        </p>
    <?php else: ?>
        <p>
            Ton animal 💗 est un <?= htmlspecialchars($nouvelAnimal->getTypeAnimal()) ?> de nom <?= htmlspecialchars($nouvelAnimal->getNom()) ?>.
        </p>
    <?php endif; ?>
<?php endif; ?>
6. Pour déboguer le CSS
Ouvre la console (F12) > Onglet "Réseau" > "Images" pour voir si les images de fond sont bien chargées.

Clique sur l’élément dans l’inspecteur et regarde si le style background-image est bien appliqué.

Si tu as un cache navigateur, vide-le ou force le rechargement (Ctrl+F5).

7. Si ça ne marche toujours pas
Donne-moi le contenu de ton <head> (pour vérifier le lien CSS).

Vérifie les permissions des fichiers images.

Vérifie l’arborescence réelle de ton projet.

N’hésite pas à copier/coller ici le code HTML/PHP de ton formulaire si tu veux une correction personnalisée !
Tu peux aussi préciser si tu veux un exemple de structure de projet PHP/CSS plus robuste.