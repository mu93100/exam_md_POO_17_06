<!-- Contient la logique métier (POO) -->

<?php   
abstract class AnimalCompagnie{
    protected string $nom;
    private int $age;
    private float $poids;

    public function __construct(string $nom, int $age, float $poids) {
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
        return '{$this->nom}  ???'; // j'ai changé echo en return!!!!!!!!!!!!!
    }
}

final class Chien extends AnimalCompagnie{
    public const ESPECE = "Canidé";

    public function crier() {
        return "<strong  style='color: pink; font-size: 2.5rem; text-shadow: -1px -1px 0  #ffff00, 1px -1px 0  #cfbf2e, -1px 1px 0 #000, 1px 1px 0 #000;'>Wouf Wouf</strong>"; 
    }
}

final class Chat extends AnimalCompagnie{
    public const ESPECE = "Félin";

    public function crier(){
        return " <span class='rubik'>miaou</span>";
    }
}

final class Perroquet extends AnimalCompagnie{
    public const ESPECE = "Oiseau";

    public function crier(){
        return "<strong class='montserrat'>Cui Cui</strong>";
    }
}
final class Limace extends AnimalCompagnie{
    public const ESPECE = "Mollusques";

    public function crier(){
        return "<strong class='honk'>Blop</strong>";
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

?>
