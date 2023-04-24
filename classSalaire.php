<?php

    class Salaire {
        public $idSalaire;
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

        function updateSalaire() {
            include 'connexion.php';
            $updC= ("UPDATE `Salaire` SET `idChamp` = $this->idChamps WHERE idSalaire =$this->idSalaire");
            if(mysqli_query($db,$updC)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC1= ("UPDATE `Salaire` SET `idPersonnel` = $this->idPersonnel WHERE `idSalaire` =$this->idSalaire");
            if(mysqli_query($db,$updC1)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC2= ("UPDATE `Salaire` SET `Salaire` = $this->salaire WHERE `idSalaire` =$this->idSalaire");
            if(mysqli_query($db,$updC2)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC3= ("UPDATE `Salaire` SET `DatesDit` = '".$this->datesdit."' WHERE idSalaire =$this->idSalaire");
            if(mysqli_query($db,$updC3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC4= ("UPDATE `Salaire` SET `motif` = '".$this->motif."' WHERE idSalaire =$this->idSalaire");
            if(mysqli_query($db,$updC4)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
        }
        function deleteSalaire() {
            include 'connexion.php';
            $delete = ("DELETE FROM Salaire WHERE idSalaire =$this->idSalaire");
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
        
    } 
    if (end($tabC) == 'update') {
        if ($q !== "") {
            $hint = $q;
            $salaire = new Salaire($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4]);
            $salaire->idSalaire = $tabC[5];
            $salaire->updateSalaire();
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
   
    if (end($tabC) == 'delete') {
        if ($q !== "") {
            $hint = $q;
            $salaire = new Salaire(0,1,2,3,4);
            $salaire->idSalaire = $tabC[0];
            $salaire->deleteSalaire();
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