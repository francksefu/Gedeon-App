
<?php

class Depot {
    public $idDepot;
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
    function updateDepot() {
        include 'connexion.php';
        $updC= ("UPDATE `Depot` SET `Materiels` = '".$this->materiels."' WHERE idDepot =$this->idDepot");
        if(mysqli_query($db,$updC)){echo"";}else{
            $this->message = mysqli_error($db);
            return;
        }

        $updC1= ("UPDATE `Depot` SET `QuantiteStock` ='".$this->quantite."' WHERE idDepot =$this->idDepot");
        if(mysqli_query($db,$updC1)){echo"";}else{
            $this->message = mysqli_error($db);
            return;
        }
        $updC2= ("UPDATE `Depot` SET `Valeur` = '".$this->valeur."' WHERE idDepot =$this->idDepot");
        if(mysqli_query($db,$updC2)){echo"";}else{
            $this->message = mysqli_error($db);
            return;
        }
        $updC3= ("UPDATE `Depot` SET `Commentaire` = '".$this->motif."' WHERE idDepot =$this->idDepot");
        if(mysqli_query($db,$updC3)){echo"";}else{
            $this->message = mysqli_error($db);
            return;
        }
        $updC4= ("UPDATE `Depot` SET `DatesAcquis` = '".$this->datesAcquis."' WHERE idDepot =$this->idDepot");
        if(mysqli_query($db,$updC4)){echo"";}else{
            $this->message = mysqli_error($db);
            return;
        }
    }

    function deleteDepot() {
        include 'connexion.php';
        $delete = ("DELETE FROM Depot WHERE idDepot =$this->idDepot");
        if (mysqli_query($db, $delete)){echo"";} else {
            $this->message = mysqli_error($db);
            return;
        }
    }
}

$q = $_REQUEST["q"];
$tabC = explode("::", $q);
$autre = '';
if (end($tabC) == 'add') {
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
} 
if(end($tabC) == 'update') {
    if ($q !== "") {
        $hint = $q;
        $salaire = new Depot($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4]);
        $salaire->idDepot = $tabC[5];
        $salaire->updateDepot();
        $autre = $salaire->message;
        if( $salaire->message) {
            $hint = $autre;
        }
        
    }
    
    $sucess = '<div class="alert alert-success" role="alert">
    Modification fait avec success
    </div>';
    
    $error = '<div class="alert alert-danger" role="alert">
    Erreur '.$autre.'
    </div>';
    echo $hint == $autre ? $error : $sucess;
}

if(end($tabC) == 'delete') {
    if ($q !== "") {
        $hint = $q;
        $salaire = new Depot(1, 2, 3, 4, 5);
        $salaire->idDepot = $tabC[0];
        $salaire->deleteDepot();
        $autre = $salaire->message;
        if( $salaire->message) {
            $hint = $autre;
        }
        
    }
    
    $sucess = '<div class="alert alert-success" role="alert">
    Suppression fait avec success
    </div>';
    
    $error = '<div class="alert alert-danger" role="alert">
    Erreur '.$autre.'
    </div>';
    echo $hint == $autre ? $error : $sucess;
}



?>