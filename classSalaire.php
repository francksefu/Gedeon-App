<?php

    class Salaire {
        private $idSalaire;
        private $idChamps;
        private $idPersonnel;
        private $salaire;
        private $datesdit;
        private $motif;
        
        public $message;

        function __construct( $idChamps, $idPersonnel, $salaire, $datesdit, $motif) {
            $this->idChamps = $idChamps;
            $this->idPersonnel = $idPersonnel;
            $this->salaire = $salaire;
            $this->datesdit = $datesdit;
            $this->motif = $motif;
        }

        
        function insererSalaire() {
            include 'connexion.php';
            $sql = ("INSERT INTO Salaire (idChamp, idPersonnel, Salaire, DatesDit, Motif) values ('".$this->idChamps."', '".$this->idPersonnel."', '".$this->salaire."', '".$this->datesdit."', '".$this->motif."')");
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
        $salaire = new Salaire($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4]);
        $salaire->insererSalaire();
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