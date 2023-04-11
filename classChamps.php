<?php

    class Champs {
        public $idChamps;
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

        function updateChamps() {
            include 'connexion.php';
            $updC= ("UPDATE `Champs_cultive` SET `NbreHectares` = $this->hectaresTours WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC1= ("UPDATE `Champs_cultive` SET `MontantIn` = ".$this->montant." WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC1)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC2= ("UPDATE `Champs_cultive` SET `NomClient` = '".$this->nomClient."' WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC2)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC3= ("UPDATE `Champs_cultive` SET `DatesLocation` = '".$this->datesLocation."' WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC4= ("UPDATE `Champs_cultive` SET `TypeClient` = '".$this->typeClient."' WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC4)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC5= ("UPDATE `Champs_cultive` SET `Motif` = '".$this->motif."' WHERE idChamps =$this->idChamps");
            if(mysqli_query($db,$updC5)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
        }

        function deleteChamps() {
            include 'connexion.php';
            $delete = ("DELETE FROM Champs_cultive WHERE idChamps =$this->idChamps");
            if (mysqli_query($db, $delete)){echo"";} else {
                $this->message = mysqli_error($db);
                return;
            }
        }
    }
    $idChamps;
    $q = $_REQUEST["q"];
    $tabC = explode("::", $q);
    
    $autre = '';
    if (end($tabC) == 'add') {
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
    }
    if(end($tabC) == 'update') {
        if ($q !== "") {
            $idChamps = $tabC[6];
            $hint = $q;
            $tracteur = new Champs($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5]);
            $tracteur->idChamps = $idChamps;
            $tracteur->updateChamps();
            $autre = $tracteur->message;
            if( $tracteur->message) {
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
            $idChamps = $tabC[6];
            $hint = $q;
            $tracteur = new Champs(1, 2, 3, 4, 5, 6);
            $tracteur->idChamps = $tabC[0];
            $tracteur->deleteChamps();
            $autre = $tracteur->message;
            if( $tracteur->message) {
                $hint = $autre;
            }
           
        }
        $sucess = '<div class="alert alert-success" role="alert">
        suppression fait avec success
      </div>';
    
      $error = '<div class="alert alert-danger" role="alert">
      Erreur '.$autre.'
      </div>';
        echo $hint == $autre ? $error : $sucess;
    }

?>