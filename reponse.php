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
        $reqSq= ("SELECT Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, idChamp, NomClient FROM MontantPaye, Salaire , Personnel, Champs_cultive WHERE (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) and ( Salaire.idChamp = Champs_cultive.idChamps = $id )order by idMontant desc");
        paiement($reqSq);
      }
    ?>
    </main>
  
</body>
