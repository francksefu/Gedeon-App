
<?php

class Depot {
    private $idDepot;
        private $materiels;
        private $quantite;
        private $valeur;
        private $motif;
        private $datesAcquis;
        
        
        public $message;

        function __construct($materiels, $quantite, $valeur, $motif, $datesAcquis) {
            $this->materiels = $materiels;
            $this->quantite = $quantite;
            $this->valeur = $valeur;
            $this->motif = $motif;
            $this->datesAcquis = $datesAcquis;
        }

    
    function insererDepot() {
        include 'connexion.php';
        $sql = ("INSERT INTO Depot (Materiels, QuantiteStock, Valeur, Commentaire, DatesAcquis) values ('".$this->materiels."', '".$this->quantite."', '".$this->valeur."', '".$this->motif."', '".$this->datesAcquis."')");
        if(mysqli_query($db, $sql)){
            
        }else{
            $this->message = mysqli_error($db);
        }
    }
}

$q = $_REQUEST["q"];
$tabC = explode("::", $q);
$autre = '';
if ($q !== "") {
    $hint = $q;
    $salaire = new Depot($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4]);
    $salaire->insererDepot();
    $autre = $salaire->message;
    if( $salaire->message) {
        $hint = $autre;
    }
    
}

$sucess = '<div class="alert alert-success" role="alert">
Insertion fait avec success
</div>';

$error = '<div class="alert alert-danger" role="alert">
Erreur '.$autre.'
</div>';
echo $hint == $autre ? $error : $sucess;


?>