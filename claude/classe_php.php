<?php
abstract class AnimalCompagnie {
    protected string $nom;
    private int $age;
    private float $poids;

    public function __construct(string $nom, int $age, float $poids) {
        $this->nom = $nom;
        $this->age = $age;
        $this->poids = $poids;
    }

    public function getNom(): string {
        return $this->nom;
    }
    
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getAge(): int {
        return $this->age;
    }
    
    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function getPoids(): float {
        return $this->poids;
    }
    
    public function setPoids(float $poids): void {
        $this->poids = $poids;
    }

    public function getTypeAnimal(): string {
        return get_class($this);
    }
    
    public function crier() {
        echo "{$this->nom} fait un bruit générique";
    }
}

final class Chien extends AnimalCompagnie {
    public const ESPECE = "Canidé";

    public function crier() {
        echo "<strong style='color: pink; font-size: 2rem; text-shadow: -1px -1px 0 #ffff00, 1px -1px 0 #cfbf2e, -1px 1px 0 #000, 1px 1px 0 #000;'>{$this->nom} fait Wouf Wouf 🐕</strong>";
    }
}

final class Chat extends AnimalCompagnie {
    public const ESPECE = "Félin";

    public function crier() {
        echo "<strong style='color: aquamarine; font-size: 1.5rem;'>{$this->nom} fait MIAOU 🐱</strong>";
    }
}

final class Perroquet extends AnimalCompagnie {
    public const ESPECE = "Oiseau";

    public function crier() {
        echo "<strong style='color: blue; font-size: 1.5rem;'>" . ucfirst($this->nom) . " fait Cui Cui 🦜</strong>";
    }
}
?>