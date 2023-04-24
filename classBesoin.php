<?php

    class Tracteur {
        public $idDepense;
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

        function updateTracteur() {
            include 'connexion.php';
            $updC= ("UPDATE `Tracteur` SET `idChamps` = $this->idChamps WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$updC)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }

            $updCM= ("UPDATE `Tracteur` SET `Cout_Mazout` = $this->mazout WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$updCM)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd1= ("UPDATE `Tracteur` SET `Cout_Pannes` = $this->pannes WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd1)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd2= ("UPDATE `Tracteur` SET `MontantDepense` = $this->montant WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd2)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd3= ("UPDATE `Tracteur` SET `Motif` = '".$this->motif."' WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd3)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd4= ("UPDATE `Tracteur` SET `NomTracteur` = '".$this->nomTracteur."' WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd4)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd5= ("UPDATE `Tracteur` SET `DatesDep` = '".$this->datesDep."' WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd5)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
            $upd6= ("UPDATE `Tracteur` SET `TotalBesoinT` = $this->totalBesoin WHERE idDepense =$this->idDepense");
            if(mysqli_query($db,$upd6)){echo"";}else{
                $this->message = mysqli_error($db);
                return;
            }
        }

        function deleteBesoin() {
            include 'connexion.php';
            $delete = ("DELETE FROM Tracteur WHERE idDepense =$this->idDepense");
            if (mysqli_query($db, $delete)){echo"";} else {
                $this->message = mysqli_error($db);
                return;
            }
        }
    }

    $q = $_REQUEST["q"];
    $tabC = explode("::", $q);
    
    
    $autre = '';
    if( end($tabC) == 'add') {
        $total = $tabC[1]*1 + $tabC[2]*1 + $tabC[3]*1;
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
    }
    
    if(end($tabC) =='delete'){
        
        if ($q !== "") {
            $hint = $q;
            $tracteur = new Tracteur(1,2,3,4,5,6,7,8);
            $tracteur->idDepense = $tabC[0];
            $tracteur->deleteBesoin();
            $autre = $tracteur->message;
            if( $tracteur->message) {
                $hint = $autre;
            }
            
        }
        $sucess = '<div class="alert alert-success" role="alert">
    Suppression fait avec success, recharger la page pour voir la ligne disparaitre
  </div>';

  $error = '<div class="alert alert-danger" role="alert">
  Erreur '.$autre.'
</div>';
    echo $hint == $autre ? $error : $sucess;
    
    }
    if( end($tabC) == 'update') {
        $total = $tabC[1]*1 + $tabC[2]*1 + $tabC[3]*1;
        $idDepense = $tabC[7];
        if ($q !== "") {
            $hint = $q;
            $tracteur = new Tracteur($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5], $tabC[6], $total);
            $tracteur->idDepense = $idDepense;
            $tracteur->updateTracteur();
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
?>