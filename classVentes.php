<?php

    class Ventes {
        public $idVentes;
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

        function updateVentes() {
            include 'connexion.php';
            $updC= ("UPDATE `Ventes` SET `PA` = $this->pA WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC1= ("UPDATE `Ventes` SET `PV` = $this->pV WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC1)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC2= ("UPDATE `Ventes` SET `Benefice` = $this->benefice WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC2)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC3= ("UPDATE `Ventes` SET `DatesVente` = '".$this->datesVentes."' WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updC4= ("UPDATE `Ventes` SET `NomProduit` = '".$this->nomProduit."' WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC4)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $updC3= ("UPDATE `Ventes` SET `Commentaire` = '".$this->motif."' WHERE idVentes =$this->idVentes");
            if(mysqli_query($db,$updC3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
        }

        function deleteVentes() {
            include 'connexion.php';
            $delete = ("DELETE FROM Ventes WHERE idVentes =$this->idVentes");
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
    
    } 
    if (end($tabC) == 'update') {
        if ($q !== "") {
            $hint = $q;
            $tracteur = new Ventes($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5]);
            $tracteur->idVentes = $tabC[6];
            $tracteur->updateVentes();
            
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
    
    if (end($tabC) == 'delete') {
        if ($q !== "") {
            $hint = $q;
            $tracteur = new Ventes(0, 1, 2, 3, 4, 5);
            $tracteur->idVentes = $tabC[0];
            $tracteur->deleteVentes();
            
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