# 🐾 Exercice PHP : Gestion d’un Animal avec POO, Formulaire et Session

## 🎯 Objectif

Créer une mini-application PHP orientée objet qui permet de :

- Créer un animal de compagnie.
- Afficher ses informations.
- Le modifier (âge et poids).
- Le supprimer.
- Voir l’état de la session PHP.

---

## 📁 Structure du projet

Le projet est composé de **3 fichiers principaux** :

/formulaire.php → Formulaire de création d'un animal
/resultat.php → Affichage, modification, suppression ///// CRUD
/session.php → Visualisation brute du contenu $_SESSION


---

## 🧩 Description des fichiers

### 🔹 1. `formulaire.php`

Affiche un formulaire HTML permettant à l’utilisateur de :

- Choisir un **type d’animal** : `Chien`, `Chat`, `Perroquet`
- Entrer :
  - un **nom**
  - un **âge**
  - un **poids**
  
Les données sont envoyées en `POST` à `resultat.php`.

---

### 🔹 2. `resultat.php`

Contient la **logique métier (POO)** :

#### Classes PHP

- **Classe abstraite** `Animal`
  - Propriétés privées :
    - `nom` (string)
    - `age` (int)
    - `poids` (float)
  - Méthodes :
    - `getNom()`, `getAge()`, `getPoids()` + leurs `setters`
    - `getType()` → retourne le nom de la classe (`get_class($this)`)
    - `crier()` → méthode par défaut (return  `???`) que chaque classe enfant peut utliser

- **Classes enfants** :
  - `Chien` :
    - Constante `ESPECE = "Canidé"`
    - `crier()` → `"Wouf Wouf"`
  - `Chat` :
    - Constante `ESPECE = "Félin"`
    - `crier()` → `"Miaou"`
  - `Perroquet` :
    - Constante `ESPECE = "Oiseau"`
    - `crier()` → `"Cui Cui"`

#### Fonctionnalités

- Stocke **un seul animal** dans `$_SESSION['animal']`
- Affiche ses informations :
  - Type, Nom, Âge, Poids, Espèce, Cri
- Formulaires pour :
  - **Modifier** l’âge et le poids
  - **Supprimer** l’animal (efface `$_SESSION['animal']`)

---

### 🔹 3. `session.php`

Affiche le contenu brut de `$_SESSION` via `print_r()`  
Utile pour le débogage ou la vérification du stockage.

---

## ✅ À tester

1. Créer un animal depuis `formulaire.php`
2. Afficher et interagir avec lui dans `resultat.php`
3. Modifier ses données (âge/poids)
4. Supprimer l’animal
5. Consulter `session.php` pour voir ce qui est stocké

---

## 💡 Contraintes techniques

- Utilisation de **POO avec héritage** (`abstract class Animal`)
- **Aucune méthode `abstract`** : toutes les méthodes sont concrètes
- La méthode `getType()` utilise `get_class($this)` pour retourner le type réel de l'objet
- Un seul animal est conservé en mémoire à la fois
- Usage correct des types (`string`, `int`, `float`)
- L'application reste en **mémoire via `$_SESSION`**

---

## 🔚 Résultat attendu

Une application PHP simple mais complète, permettant de manipuler un objet en mémoire (POO + formulaire + session), idéale pour comprendre :

- La programmation orientée objet
- La gestion de session PHP
- L'interaction formulaire → objet → affichage
