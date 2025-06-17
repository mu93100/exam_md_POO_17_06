<!-- ### 🔹 2. `resultat.php`

Contient la **logique métier (POO)** :
-->

<?php   

// include "session.php"; // recupération des classes issu d'un autre fichier



abstract class AnimalCompagnie{
    protected string $nom;
    private int $age;
    private float $poids;

    public function __construct(string $nom, int $age, float $poids)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->poids = $poids;
    }

    public function getNom() : string {
        return $this->nom;
    }
    public function setNom(string $nom) : void {
        $this->nom = $nom;
    }

    public function getAge() : int {
        return $this->age;
    }
    public function setAge(int $age) : void {
        $this->age = $age;
    }

    public function getPoids() : float {
        return $this->poids;
    }
    public function setPoids(float $poids) : void {
        $this->poids = $poids;
    }

    public function getTypeAnimal() : string {
        return get_class($this);
    }
    public function crier() {
        echo '{$this->nom}  ???';
    }
}

final class Chien extends AnimalCompagnie{
    public const ESPECE = "Canidé";

    public function crier() {
        echo "{$this->nom} fait <strong style='color: pink;'> Wouf Wouf</strong>";
    }
}

final class Chat extends AnimalCompagnie{
    public const ESPECE = "Félin";

    public function crier(){
        echo "{$this->nom} fait <strong style='color: aquamarine;'> MIAOU</strong>";

    
    }
}
// verif class
// $rex = new Chien("Rex", 12, 33.50);
// $rex->crier();
// $dirty = new Chat("Dirty", 12, 33);
// echo "<br>";
// $dirty->crier();
// echo "<br>";
// echo Chien::ESPECE;

final class Perroquet extends AnimalCompagnie{
    public const ESPECE = "Oiseau";

    public function crier(){
        echo "{$this->nom} fait <strong style='color: blue;'> Cui Cui</strong>";
    }
}
?>