<?php

    class Champs {
        private $idChamps;
        private $hectaresTours;
        private $montant;
        private $nomClient;
        private $datesLocation;
        private $typeClient;

        private $motif;
        
        public $message;

        function __construct( $hectaresTours, $montant, $nomClient, $datesLocation, $typeClient, $motif) {
            
            $this->hectaresTours = $hectaresTours;
            $this->montant = $montant;
            $this->nomClient = $nomClient;
            $this->datesLocation = $datesLocation;
            $this->typeClient = $typeClient;
            $this->motif = $motif;
        }

        
        function insererChamps() {
            include 'connexion.php';
            $sql = ("INSERT INTO Champs_cultive (NbreHectares, MontantIn, NomClient, DatesLocation, TypeClient, Motif) values ('".$this->hectaresTours."', '".$this->montant."', '".$this->nomClient."', '".$this->datesLocation."', '".$this->typeClient."', '".$this->motif."')");
            if(mysqli_query($db, $sql)){
                //echo"<small style='color: green'>insertion fait</small>";
                }else{
                //echo "<small style='color: red;'>error : ".mysqli_error($db). " desolee</small>";
                //return 'error'.mysqli_error($db);
                $this->message = mysqli_error($db);
            }
        }
    }

    $q = $_REQUEST["q"];
    $tabC = explode("::", $q);
    
    $autre = '';
    if ($q !== "") {
        $hint = $q;
        $tracteur = new Champs($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5]);
        $tracteur->insererChamps();
        $autre = $tracteur->message;
        if( $tracteur->message) {
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