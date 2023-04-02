<?php

    class CaisseOut {
        private $idCaisseOut;
        private $montant;
        private $motif;
        private $type;
        private $datesout;
        
        
        public $message;

        function __construct($montant, $motif, $type, $datesout) {
            $this->montant = $montant;
            $this->motif = $motif;
            $this->datesout = $datesout;
            $this->type = $type;
        }

        
        function insererCaisseOut() {
            include 'connexion.php';
            $sql = ("INSERT INTO CaisseOut (MontantOut, Commentaire, `Type`, DatesOut) values ('".$this->montant."', '".$this->motif."', '".$this->type."', '".$this->datesout."')");
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
        $salaire = new CaisseOut($tabC[0], $tabC[1], $tabC[2], $tabC[3]);
        $salaire->insererCaisseOut();
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