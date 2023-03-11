<?php

    class Produit {
        private $id = 0;
        private $nom;
        private $image;
        private $pA;
        private $pV;
        private $pVmin;
        private $quantite;
        private $quantiteMin;
        private $description;

        public $message;

        function __construct($nom, $image, $pA, $pV, $pVmin, $quantite, $quantiteMin, $description) {
            $this->nom = $nom;
            $this->image = $image;
            $this->pA = $pA;
            $this->pV = $pV;
            $this->pVmin = $pVmin;
            $this->quantite = $quantite;
            $this->quantiteMin = $quantiteMin;
            $this->description = $description;
        }

        function get_nom() {
            return $this->nom;
        }

        function get_image() {
            return $this->image;
        }

        function get_pA() {
            return $this->pA;
        }

        function get_pV() {
            return $this->pV;
        }

        function get_pVmin() {
            return $this->pVmin;
        }

        function get_quantite() {
            return $this->quantite;
        }

        function get_quantiteMin() {
            return $this->quantiteMin;
        }

        function get_description() {
            return $this->description;
        }
        
        function insererProduit() {
            include 'connexion.php';
            $sql = ("INSERT INTO produit (Nom, ProduitImage, PA, PV, PVmin, QStock, QStockmin, DescriptionProduit ) values ('".$this->nom."', '".$this->image."', '".$this->pA."', '".$this->pV."', '".$this->pVmin."', '".$this->quantite."', '".$this->quantiteMin."', '".$this->description."')");
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
        $produitins = new Produit($tabC[0], $tabC[1], $tabC[2], $tabC[3], $tabC[4], $tabC[5], $tabC[6], $tabC[7]);
        $produitins->insererProduit();
        $autre = $produitins->message;
        if( $produitins->message) {
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