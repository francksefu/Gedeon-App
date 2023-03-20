<?php

    class Personnels {
        private $idPersonnel;
        private $poste;
        private $nom;
        private $telephone;
        
        
        public $message;

        function __construct( $poste, $nom, $telephone) {
            
            $this->poste = $poste;
            $this->nom = $nom;
            $this->telephone = $telephone;
        }

        
        function insererPersonnel() {
            include 'connexion.php';
            $sql = ("INSERT INTO Personnel (Poste, Nom, Telephone) values ('".$this->poste."', '".$this->nom."', '".$this->telephone."')");
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
        $tracteur = new Personnels($tabC[0], $tabC[1], $tabC[2]);
        $tracteur->insererPersonnel();
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