<?php

    class Tracteur {
        private $idDepense;
        private $idChamps;
        private $mazout;
        private $pannes;
        private $montant;
        private $motif;
        private $nomTracteur;
        private $datesDep;
        private $totalBesoin;
        
        public $message;

        function __construct( $idChamps, $mazout, $pannes, $montant, $motif, $nomTracteur, $datesDep, $totalBesoin) {
            
            $this->idChamps = $idChamps;
            $this->mazout = $mazout;
            $this->pannes = $pannes;
            $this->montant = $montant;
            $this->motif = $motif;
            $this->nomTracteur = $nomTracteur;
            $this->datesDep = $datesDep;
            $this->totalBesoin = $totalBesoin;
            
        }

        
        function insererTracteur() {
            include 'connexion.php';
            $sql = ("INSERT INTO Tracteur (idChamps, Cout_Mazout, Cout_Pannes, MontantDepense, Motif, NomTracteur, DatesDep, TotalBesoinT) values ('".$this->idChamps."', '".$this->mazout."', '".$this->pannes."', '".$this->montant."', '".$this->motif."', '".$this->nomTracteur."', '".$this->datesDep."', '".$this->totalBesoin."')");
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
    $total = $tabC[1]*1 + $tabC[2]*1 + $tabC[3]*1;
    $autre = '';
    if ($q !== "") {
        $hint = $q;
        $tracteur = new Tracteur($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5], $tabC[6], $total);
        $tracteur->insererTracteur();
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