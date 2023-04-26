<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-reboot.rtl.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-utilities.rtl.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap-utilities.rtl.min.css">
    
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script defer  src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
    <script defer src="./jsfile/navbar.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<?php

  function besoin($reqSql) {
    include 'connexion.php';
    $total = 0;
    $total_mazout = 0;
    $total_pannes = 0;
    $total_autre = 0;
    echo '<h2 class="mt-0 mb-2 text-center">Besoin</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">Besoin</h2>';
    $result= mysqli_query($db, $reqSql);
      if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
          <thead class="bg-secondary text-white">
            <tr>
              <th>ID</th>
                <th>Nom Client</th>
                <th>Type de travail</th>
                <th>Date de location</th>
                <th>Cout Mazout</th>
                <th>Cout Pannes</th>
                <th>Montant depensé</th>
                <th>Commentaire</th>
                <th>Tracteur</th>
                <th>Date de la depense</th>
                <th>Total pour cette depense</th>
                <th>Action</th>
            </tr>
          </thead>';
              
            while($row= mysqli_fetch_assoc($result)){
              echo'
              <tr>
                <td>'.$row["idDepense"].'</td>
                <td>'.$row["NomClient"].'</td>
                <td>'.$row["TypeClient"].'</td>
                <td>'.$row["DatesLocation"].'</td>
                <td>'.$row["Cout_Mazout"].'</td>
                <td>'.$row["Cout_Pannes"].'</td>
                <td>'.$row["MontantDepense"].'</td>
                <td>'.$row["Motif"].'</td>
                <td>'.$row["NomTracteur"].'</td>
                <td>'.$row["DatesDep"].'</td>
                <td>'.$row["TotalBesoinT"].'</td>
              </tr>';

              $total_mazout += $row["Cout_Mazout"];
              $total_pannes += $row["Cout_Pannes"];
              $total_autre += $row["MontantDepense"];
              $total += $row["TotalBesoinT"];
            }
            echo'<h3 class="mt-4 mb-2 text-center">besoin mazout : '.$total_mazout.' $</h3>';
            echo'<h3 class="mt-2 mb-2 text-center">besoin pannes : '.$total_pannes.' $</h3>';
            echo'<h3 class="mt-2 mb-4 text-center">autre besoin : '.$total_autre.' $</h3>';
            echo'<h3 class="mt-2 mb-2 text-center">Total de tout les besoin : '.$total.' $</h3>';
            echo"</table>";
       }else{echo "Pas des donnees dans la base ";}
   }

  function paiement ($reqSql) {
    include 'connexion.php';

    $total_salaire = 0;
    $total_montant_paye = 0;
    echo '<h2 class="mt-0 mb-2 text-center">Paiement</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">Paiement par champs ou tours</h2>';
    
    $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Nom</th>
            <th>Salaire</th>
            <th>Dates definit</th>
            <th>Montant payé</th>
            <th>Commentaire</th>
            <th>Dates du paiement</th>
            <th>Nom du client + ID Champs</th>
        </tr>
        </thead>';
     
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["Nom"].'</td>
        <td>'.$row["Salaire"].'</td>
        <td>'.$row["DatesDit"].'</td>
        <td>'.$row["MontantPaye"].'</td>
        <td>'.$row["Commentaire"].'</td>
        <td>'.$row["DatesPaye"].'</td>
        <td>'.$row["idChamp"].' '.$row["NomClient"].'</td>
      </tr>';
      $total_salaire += $row["Salaire"];
      $total_montant_paye += $row["MontantPaye"];
        }
        echo'<h3 class="mt-4 mb-2 text-center">Total salaire : '.$total_salaire.' $</h3>';
        echo'<h3 class="mt-2 mb-2 text-center">Total paiement : '.$total_montant_paye.' $</h3>';
        echo'<h3 class="mt-2 mb-2 text-center">difference : '.$total_salaire - $total_montant_paye.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}
  }

  function caisseIn($reqSql, $reqSql0) {
    include 'connexion.php';
    
    echo '<h2 class="mt-0 mb-2 text-center">Caisse</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">toute la Caisse entre 2 dates</h2>';
    
    $total = 0;
    $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
        echo '<table id="table" class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Montant entrer</th>
            <th>Commentaire</th>
            <th>Type</th>
            <th>Dates</th>
        </tr>
        </thead>';
     
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["MontantIn"].'</td>
        <td>'.$row["Commentaire"].'</td>
        <td>'.$row["Type"].'</td>
        <td>'.$row["DatesIn"].'</td>
      </tr>';
      $total += $row["MontantIn"];
        }
        echo'<h3 class="mt-4 mb-2 text-center">Total montant entree : '.$total.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}

    $total1 = 0;           
    //$reqSql= ("SELECT * FROM CaisseOut order by idCaisseOut desc ");
    $result= mysqli_query($db, $reqSql0);
    if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Montant sorti</th>
            <th>Commentaire</th>
            <th>Type</th>
            <th>Dates</th>
        </tr>
        </thead>';
     
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["MontantOut"].'</td>
        <td>'.$row["Commentaire"].'</td>
        <td>'.$row["Type"].'</td>
        <td>'.$row["DatesOut"].'</td>
      
      </tr>';
      $total1 += $row["MontantOut"];
    }
    echo'<h3 class="mt-4 mb-2 text-center">Total montant sortie : '.$total1.' $</h3>';
    echo'<h3 class="mt-4 mb-2 text-center">difference entre l entre et la sortie : '.$total - $total1.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}
    
  }

  function salaire_paiement($sql) {
    include 'connexion.php';
    //
    echo '<h1>Salaire</h1>';
    $total_T_salaire = 0;
    $total_T_paiement = 0;
    $result1 = mysqli_query($db, $sql);
    $salaire = 0;
    if(mysqli_num_rows($result1)>0){
                        
        while($row1= mysqli_fetch_assoc($result1)){
          $idSalaire = $row1["idSalaire"];
          $req = ("SELECT Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, idChamp, NomClient FROM MontantPaye, Salaire , Personnel, Champs_cultive WHERE (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) and(Salaire.idSalaire = $idSalaire) and ( Salaire.idChamp = Champs_cultive.idChamps)order by idMontant desc");
          $total_salaire = 0;
          $total_montant_paye = 0;
          
          $result= mysqli_query($db, $req);
          if(mysqli_num_rows($result)>0){
              echo '<table class="table border border-1">
              <thead class="bg-secondary text-white">
              <tr>
                  <th>Nom</th>
                  <th>Salaire</th>
                  <th>Dates definit</th>
                  <th>Montant payé</th>
                  <th>Commentaire</th>
                  <th>Dates du paiement</th>
                  <th>Nom du client + ID Champs</th>
              </tr>
              </thead>';
           
              while($row= mysqli_fetch_assoc($result)){
                      echo'
                      <tr>
              <td>'.$row["Nom"].'</td>
              <td>'.$row["Salaire"].'</td>
              <td>'.$row["DatesDit"].'</td>
              <td>'.$row["MontantPaye"].'</td>
              <td>'.$row["Commentaire"].'</td>
              <td>'.$row["DatesPaye"].'</td>
              <td>'.$row["idChamp"].' '.$row["NomClient"].'</td>
            </tr>';
            $total_salaire += $row["Salaire"];
            $total_montant_paye += $row["MontantPaye"];
              }
              echo'<h3 class="mt-4 mb-2 text-center">Total salaire : '.$total_salaire.' $</h3>';
              echo'<h3 class="mt-2 mb-2 text-center">Total paiement : '.$total_montant_paye.' $</h3>';
              echo'<h3 class="mt-2 mb-2 text-center">difference : '.$total_salaire - $total_montant_paye.' $</h3>';
              echo"</table>";
          }else{echo "Pas des donnees dans la base ";}
          $total_T_salaire += $total_salaire;
          $total_T_paiement += $total_montant_paye;
        }
        echo'<h3 class="mt-4 mb-2 text-center">Total de tous les salaires : '.$total_T_salaire.' $</h3>';
        echo'<h3 class="mt-2 mb-2 text-center">Total de tous paiement : '.$total_T_paiement.' $</h3>';
        echo'<h3 class="mt-2 mb-2 text-center">Total de toutes les differences : '.$total_salaire - $total_T_paiement.' $</h3>';         
   }else{echo "Une erreur s est produite ";}
  }

  function salaire($reqSql) {
    include 'connexion.php';
    
    echo '<h2 class="mt-0 mb-2 text-center">Salaire</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">Salaire</h2>';
    
    $total = 0;
   $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Identifiant</th>
            <th>Nom client + ID champs</th>
            <th>Date location</th>
            <th>Type</th>
            <th>Nom travailleur</th>
            <th>Salaire</th>
            <th>Date definit</th>
            <th>Action</th>
        </tr>
        </thead>';
     
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["idSalaire"].'</td>
        <td>'.$row["idChamp"].' '.$row["NomClient"].'</td>
        <td>'.$row["DatesLocation"].'</td>
        <td>'.$row["TypeClient"].'</td>
        <td>'.$row["Nom"].'</td>
        <td>'.$row["Salaire"].'</td>
        <td>'.$row["DatesDit"].'</td>
        
      </tr>';
      $total += $row["Salaire"];
        }
        echo'<h3 class="mt-4 mb-2 text-center">Total de tous les salaires : '.$total.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}

  }

  function ventes($reqSql) {
    include 'connexion.php';

    echo '<h2 class="mt-0 mb-2 text-center">Salaire</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">Salaire</h2>';
    
    $total_pa = 0;
    $total_pv = 0;
    $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Prix achat</th>
            <th>Prix vente</th>
            <th>benefices</th>
            <th>Dates</th>
            <th>Commentaire</th>
        </tr>
        </thead>';
    
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["PA"].'</td>
        <td>'.$row["PV"].'</td>
        <td>'.$row["Benefice"].'</td>
        <td>'.$row["DatesVente"].'</td>
        <td>'.$row["Commentaire"].'</td>
      </tr>';
      $total_pa += $row["PA"];
      $total_pv += $row["PV"];
        }
        echo'<h3 class="mt-4 mb-2 text-center">Total PA : '.$total_pa.' $</h3>';
        echo'<h3 class="mt-4 mb-2 text-center">Total PV : '.$total_pv.' $</h3>';
        echo'<h3 class="mt-4 mb-2 text-center">Total benefices : '.$total_pv - $total_pa.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}

  }

  function depot($reqSql) {
    include 'connexion.php';
    
    echo '<h2 class="mt-0 mb-2 text-center">Depot</h2>';
    echo '<h2 class="mt-3 mb-2 text-center">Depot</h2>';
    
    $total = 0;
    //$reqSql= ("SELECT * FROM Depot order by idDepot desc ");
    $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
        echo '<table class="table border border-1">
        <thead class="bg-secondary text-white">
        <tr>
            <th>Materiels</th>
            <th>Quantite</th>
            <th>Valeur</th>
            <th>Commentaire</th>
            <th>Dates d acquisition</th>
        </tr>
        </thead>';
   
        while($row= mysqli_fetch_assoc($result)){
                echo'
                <tr>
        <td>'.$row["Materiels"].'</td>
        <td>'.$row["QuantiteStock"].'</td>
        <td>'.$row["Valeur"].'</td>
        <td>'.$row["Commentaire"].'</td>
        <td>'.$row["DatesAcquis"].'</td>
      </tr>';
      $total += $row["Valeur"];
        }
        echo'<h3 class="mt-4 mb-2 text-center">Valeur : '.$total.' $</h3>';
        echo"</table>";
    }else{echo "Pas des donnees dans la base ";}

  }

  $date1 = $_POST["Date1"];
  $date2 = $_POST["Date2"];
  $cache = $_POST["Cache"];
  $identifiant = $_POST["IdentifiantM"];
  $tabC = explode(":", $identifiant);
  $id = end($tabC);
  
?>
<body>
    <main>
    <?php
    
      if($cache == 'besoinId') {
        $reqSq= ("SELECT idDepense, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE (Tracteur.idChamps = $id) and Tracteur.idChamps = Champs_cultive.idChamps order by idDepense desc");
        besoin($reqSq);
      }

      if($cache == 'besoin2date') {
        $reqSqo= ("SELECT idDepense, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE (DatesDep BETWEEN '".$date1."' AND '".$date2."') and (Tracteur.idChamps = Champs_cultive.idChamps) order by idDepense desc");
        besoin($reqSqo);
      }

      if($cache == 'paieId') {
        $reqSq= ("SELECT Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, idChamp, NomClient FROM MontantPaye, Salaire , Personnel, Champs_cultive WHERE (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) and(Salaire.idChamp = $id) and ( Salaire.idChamp = Champs_cultive.idChamps)order by idMontant desc");
        paiement($reqSq);
      }

      if($cache == 'paie2date') {
        $reqSq= ("SELECT Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, idChamp, NomClient FROM MontantPaye, Salaire , Personnel, Champs_cultive WHERE (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) and(DatesPaye BETWEEN '".$date1."' and '".$date2."') and ( Salaire.idChamp = Champs_cultive.idChamps)order by idMontant desc");
        paiement($reqSq);
      }

      if($cache == 'tracteur1') {
        $reqSqo= ("SELECT idDepense, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE (NomTracteur = 'tracteur1') and (DatesDep BETWEEN '".$date1."' AND '".$date2."') and (Tracteur.idChamps = Champs_cultive.idChamps) order by idDepense desc");
        besoin($reqSqo);
      }

      if($cache == 'tracteur2') {
        $reqSqo= ("SELECT idDepense, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE (NomTracteur = 'tracteur2') and (DatesDep BETWEEN '".$date1."' AND '".$date2."') and (Tracteur.idChamps = Champs_cultive.idChamps) order by idDepense desc");
        besoin($reqSqo);
      }

      if($cache == 'tracteur3') {
        $reqSqo= ("SELECT idDepense, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE (NomTracteur = 'tracteur3') and (DatesDep BETWEEN '".$date1."' AND '".$date2."') and (Tracteur.idChamps = Champs_cultive.idChamps) order by idDepense desc");
        besoin($reqSqo);
      }

      if($cache == 'caisseTout') {
        $reqSqo= ("SELECT * FROM CaisseInput WHERE (DatesIn BETWEEN '".$date1."' AND '".$date2."' ) order by idCaisseIn desc ");
        $reqSq= ("SELECT * FROM CaisseOut WHERE (DatesOut BETWEEN '".$date1."' AND '".$date2."') order by idCaisseOut desc ");
        caisseIn($reqSqo, $reqSq);
      }

      if($cache == 'caisseEmp') {
        $reqSqo= ("SELECT * FROM CaisseInput WHERE (DatesIn BETWEEN '".$date1."' AND '".$date2."' ) and (Type = 'Emprunt') order by idCaisseIn desc ");
        $reqSq= ("SELECT * FROM CaisseOut WHERE (DatesOut BETWEEN '".$date1."' AND '".$date2."') and (Type = 'Emprunt') order by idCaisseOut desc ");
        caisseIn($reqSqo, $reqSq);
      }

      if($cache == 'caisseRembourse') {
        $reqSqo= ("SELECT * FROM CaisseInput WHERE (DatesIn BETWEEN '".$date1."' AND '".$date2."' ) and (Type = 'Remboursement') order by idCaisseIn desc ");
        $reqSq= ("SELECT * FROM CaisseOut WHERE (DatesOut BETWEEN '".$date1."' AND '".$date2."') and (Type = 'Remboursement') order by idCaisseOut desc ");
        caisseIn($reqSqo, $reqSq);
      }

      if($cache == 'travailNPE') {
        $sql0 = ("SELECT idSalaire, Nom, Salaire, DatesDit, NomClient FROM Salaire, Personnel, Champs_cultive WHERE(Salaire.idPersonnel = $id)and (Salaire.idPersonnel = Personnel.idPersonnel) and (Champs_cultive.idChamps = Salaire.idChamp) order by idSalaire desc");
        salaire_paiement($sql0);
      }

      if($cache == 'travailPNP2date') {
        $sql0 = ("SELECT idSalaire, Nom, Salaire, DatesDit, NomClient FROM Salaire, Personnel, Champs_cultive WHERE(Salaire.idPersonnel = $id and (DatesDit BETWEEN '".$date1."' AND '".$date2."'))and (Salaire.idPersonnel = Personnel.idPersonnel) and (Champs_cultive.idChamps = Salaire.idChamp) order by idSalaire desc");
        salaire_paiement($sql0);
      }

      if($cache == 'travailPNP2date') {
        $sql0 = ("SELECT idSalaire, Nom, Salaire, DatesDit, NomClient FROM Salaire, Personnel, Champs_cultive WHERE(Salaire.idPersonnel = $id and (DatesDit BETWEEN '".$date1."' AND '".$date2."'))and (Salaire.idPersonnel = Personnel.idPersonnel) and (Champs_cultive.idChamps = Salaire.idChamp) order by idSalaire desc");
        salaire_paiement($sql0);
      }

      if($cache == 'salaireCE2D') {
        $reqS= ("SELECT idSalaire, NomClient, DatesLocation, TypeClient, Nom, Salaire, DatesDit, idChamp FROM Salaire, Champs_cultive, Personnel WHERE (Salaire.idChamp = Champs_cultive.idChamps) and (DatesDit BETWEEN '".$date1."' AND '".$date2."') and (Salaire.idPersonnel = Personnel.idPersonnel) order by idSalaire desc");
        salaire($reqS);
      }

      if($cache == 'salaireC1PE2date') {
        $reqS= ("SELECT idSalaire, NomClient, DatesLocation, TypeClient, Nom, Salaire, DatesDit, idChamp FROM Salaire, Champs_cultive, Personnel WHERE (Salaire.idChamp = Champs_cultive.idChamps) and (DatesDit BETWEEN '".$date1."' AND '".$date2."') and (Salaire.idPersonnel = $id) and (Salaire.idPersonnel = Personnel.idPersonnel) order by idSalaire desc");
        salaire($reqS);
      }

      if($cache == 'salaireSC') {
        $reqS= ("SELECT idSalaire, NomClient, DatesLocation, TypeClient, Nom, Salaire, DatesDit, idChamp FROM Salaire, Champs_cultive, Personnel WHERE (Salaire.idChamp = Champs_cultive.idChamps) and (Salaire.idChamp = $id) and (Salaire.idPersonnel = Personnel.idPersonnel) order by idSalaire desc");
        salaire($reqS);
      }

      if($cache == 'salaireS1CE2date') {
        $reqS= ("SELECT idSalaire, NomClient, DatesLocation, TypeClient, Nom, Salaire, DatesDit, idChamp FROM Salaire, Champs_cultive, Personnel WHERE (Salaire.idChamp = Champs_cultive.idChamps) and (Salaire.idChamp = $id) and (DatesDit BETWEEN '".$date1."' AND '".$date2."')  and (Salaire.idPersonnel = Personnel.idPersonnel) order by idSalaire desc");
        salaire($reqS);
        //
      }

      if($cache == 'ventes') {
        $reqSl= ("SELECT * FROM Ventes WHERE (DatesVente BETWEEN '".$date1."' AND '".$date2."') order by idVentes desc");
        ventes($reqSl);
      }

      if($cache == 'depot') {
        $reqSl= ("SELECT * FROM Depot WHERE (DatesAcquis BETWEEN '".$date1."' AND '".$date2."') order by idDepot desc ");
        depot($reqSl);
      }
    ?>
    </main>
  
</body>
