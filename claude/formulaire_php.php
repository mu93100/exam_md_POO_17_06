<?php include_once "session.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Animaux de Compagnie</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Coiny:wght@400&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Gestion de tes Animaux de Compagnie 🐾</h1>
    
    <?php if ($nouvelAnimal): ?>
        <div class="animal-info <?= $animalUpdated ? 'animal-modified' : '' ?>">
            <?php if ($animalUpdated): ?>
                <p class="font">🎉 Animal mis à jour avec succès !</p>
                <p class="font">Voici les nouvelles informations de <?= htmlspecialchars($nouvelAnimal->getNom()) ?> :</p>
            <?php else: ?>
                <p class="font">Ton animal 💗 est un <?= $nouvelAnimal->getTypeAnimal() ?> de <?= $nouvelAnimal->getAge() ?> ans qui pèse <?= $nouvelAnimal->getPoids() ?> kg et s'appelle <?= htmlspecialchars($nouvelAnimal->getNom()) ?></p>
            <?php endif; ?>
            
            <div class="animal-details">
                <p><strong>Type:</strong> <?= $nouvelAnimal->getTypeAnimal() ?></p>
                <p><strong>Nom:</strong> <?= htmlspecialchars($nouvelAnimal->getNom()) ?></p>
                <p><strong>Âge:</strong> <?= $nouvelAnimal->getAge() ?> ans</p>
                <p><strong>Poids:</strong> <?= $nouvelAnimal->getPoids() ?> kg</p>
            </div>
            
            <div class="animal-cry">
                <?php $nouvelAnimal->crier(); ?>
            </div>
            
            <!-- Formulaire de mise à jour -->
            <form method="POST" class="update-form">
                <h3>Modifier les informations</h3>
                <input type="hidden" name="action" value="update">
                
                <label for="nom">Nouveau nom :</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nouvelAnimal->getNom()) ?>" required>
                
                <label for="age">Nouvel âge :</label>
                <input type="number" id="age" name="age" value="<?= $nouvelAnimal->getAge() ?>" min="1" required>
                
                <label for="poids">Nouveau poids :</label>
                <input type="number" id="poids" name="poids" step="0.1" value="<?= $nouvelAnimal->getPoids() ?>" min="0.1" required>
                
                <button type="submit">Mettre à jour</button>
            </form>
            
            <!-- Bouton de suppression -->
            <form method="POST" style="margin-top: 1rem;">
                <input type="hidden" name="action" value="delete">
                <button type="submit" class="btDelete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')">🗑️ Supprimer</button>
            </form>
        </div>
    <?php endif; ?>
    
    <!-- Formulaire de création -->
    <form method="POST" class="create-form">
        <h2>Ajouter un nouvel animal</h2>
        <input type="hidden" name="action" value="create">
        
        <label for="nouvelAnimal">Type d'animal :</label>
        <select id="nouvelAnimal" name="nouvelAnimal" required>
            <option value="">Choisir un type d'animal</option>
            <option value="Chien">🐕 Chien</option>
            <option value="Chat">🐱 Chat</option>
            <option value="Perroquet">🦜 Perroquet</option>
        </select>
        
        <label for="nom_create">Nom :</label>
        <input type="text" id="nom_create" name="nom" placeholder="Nom de votre animal" required>
        
        <label for="age_create">Âge :</label>
        <input type="number" id="age_create" name="age" placeholder="Âge en années" min="1" required>
        
        <label for="poids_create">Poids :</label>
        <input type="number" id="poids_create" name="poids" step="0.1" placeholder="Poids en kg" min="0.1" required>
        
        <button type="submit">Créer l'animal</button>
    </form>
</body>
</html>