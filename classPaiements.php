<?php

    class Paiements {
        private $idSalaire;
        private $montant;
        private $datesPaye;
        private $motif;
        
        
        public $message;

        function __construct( $idSalaire, $montant, $datesPaye, $motif) {
            $this->idSalaire = $idSalaire;
            $this->montant = $montant;
            $this->datesPaye = $datesPaye;
            $this->motif = $motif;
        }

        
        function insererPaiements() {
            include 'connexion.php';
            $sql = ("INSERT INTO MontantPaye (idSalaire, MontantPaye, DatesPaye, Commentaire) values ('".$this->idSalaire."', '".$this->montant."', '".$this->datesPaye."', '".$this->motif."')");
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
        $salaire = new Paiements($tabC[0], $tabC[1], $tabC[2], $tabC[3]);
        $salaire->insererPaiements();
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