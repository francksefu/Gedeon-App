<?php

    class Ventes {
        private $idVentes;
        private $pA;
        private $pV;
        private $benefice;
        private $datesVentes;
        private $nomProduit;

        private $motif;
        
        public $message;

        function __construct( $pA, $pV, $benefice, $datesVentes, $nomProduit, $motif) {
            
            $this->pA = $pA;
            $this->pV = $pV;
            $this->benefice = $benefice;
            $this->datesVentes = $datesVentes;
            $this->nomProduit = $nomProduit;
            $this->motif = $motif;
        }

        
        function insererVentes() {
            include 'connexion.php';
            $sql = ("INSERT INTO Ventes (PA, PV, Benefice, DatesVente, NomProduit, Commentaire) values ('".$this->pA."', '".$this->pV."', '".$this->benefice."', '".$this->datesVentes."', '".$this->nomProduit."', '".$this->motif."')");
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
        $tracteur = new Ventes($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5]);
        $tracteur->insererVentes();
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