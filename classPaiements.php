<?php

    class Paiements {
        public $idMontant;
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

        function updatePaiement() {
            include 'connexion.php';
            $updC= ("UPDATE `MontantPaye` SET `idSalaire` = $this->idSalaire WHERE idMontant =$this->idMontant");
            if(mysqli_query($db,$updC)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC1= ("UPDATE `MontantPaye` SET `MontantPaye` = $this->montant WHERE idMontant =$this->idMontant");
            if(mysqli_query($db,$updC1)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC2= ("UPDATE `MontantPaye` SET `DatesPaye` = '".$this->datesPaye."' WHERE idMontant =$this->idMontant");
            if(mysqli_query($db,$updC2)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC3= ("UPDATE `MontantPaye` SET `Commentaire` = '".$this->motif."' WHERE idMontant =$this->idMontant");
            if(mysqli_query($db,$updC3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
        }
    }

    $q = $_REQUEST["q"];
    $tabC = explode("::", $q);
    $autre = '';
    if (end($tabC) != 'update') {
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
        
    } else {
        if ($q !== "") {
            $hint = $q;
            $salaire = new Paiements($tabC[0], $tabC[1], $tabC[2], $tabC[3]);
            $salaire->idMontant = $tabC[4];
            $salaire->updatePaiement();
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
    

?>