
<?php

function controlons($idSalaire) {
  include 'connexion.php';
    
  $total = 0;
  $reqSql= ("SELECT Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, idChamp, NomClient FROM MontantPaye, Salaire , Personnel, Champs_cultive WHERE (Salaire.idSalaire = $idSalaire) and (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) and ( Salaire.idChamp = Champs_cultive.idChamps )order by idMontant desc");
  $result= mysqli_query($db, $reqSql);
  if(mysqli_num_rows($result)>0){
    while($row= mysqli_fetch_assoc($result)){
      $total += $row["MontantPaye"];
    }
  }else{}
  return $total;
}

  $q = $_REQUEST["q"];
  $tabC = explode(":", $q);
  $autre = '';
  if ($q !== "") {
    $hint = $q;
    $autre = controlons($tabC[1]);
  }
  echo $autre;
?>