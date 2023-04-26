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
    <script defer src="./jsfile/rapport.js"></script>
</head>
<?php
  include 'connexion.php';
  function dataChamps(){
    include 'connexion.php';
    $sql = ("SELECT * FROM Champs_cultive");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='Nom client :".$row["NomClient"].": Hectares :".$row["NbreHectares"].": Dates location :".$row["DatesLocation"].": type = :".$row["TypeClient"].": id = :".$row["idChamps"]."'>".$row["NomClient"]." : ".$row["NbreHectares"]." : ".$row["TypeClient"]."</option>"; 
        }
                
   }else{echo "Une erreur s est produite ";}  

}

function dataPersonnel() {
  include 'connexion.php';
  $sql = ("SELECT * FROM Personnel");
  $result = mysqli_query($db, $sql);
          
  if(mysqli_num_rows($result)>0){
                      
      while($row= mysqli_fetch_assoc($result)){
          echo"<option value='personnel :".$row["Nom"].": Poste :".$row["Poste"].": identifiant :".$row["idPersonnel"]."'>".$row["Nom"]." : ".$row["Poste"]." : ".$row["Telephone"]."</option>"; 
      }
              
 }else{echo "Une erreur s est produite ";} 
}
?>
<body>
    <main class="container-fluid">
        <h1>Rapport ou resume de tout</h1>
        <div class="row">
        <div class="col-md-4">
            <h2>Besoin tracteur</h2>
            <button class="btn btn-primary" id="tracteur-id">Par identifiant champs</button>
            <button class="btn btn-primary" id="tracteur-2-date">Entre 2 dates</button>
            <br><br>

            <h2>Paiement</h2>
            <button class="btn btn-primary" id="paie-id">Par identifiant champs</button>
            <button class="btn btn-primary" id="paie-2-date">Entre 2 dates</button>
            <br><br>

            <h2>Besoin par tracteur entre 2 dates</h2>
            <button class="btn btn-primary" id="tracteur1">tracteur 1</button>
            <button class="btn btn-primary" id="tracteur2">tracteur 2</button>
            <button class="btn btn-primary" id="tracteur3">tracteur 3</button>
            <br><br>

            <h2>Activite dans la caisse</h2>
            <button class="btn btn-primary mb-2" id="caisse-tout">Entre 2 dates</button>
            <button class="btn btn-primary mb-2" id="caisse-emprunt">Emprunt entre 2 dates</button>
            <button class="btn btn-primary mb-2" id="caisse-remboursement">Remboursement entre 2 dates</button>
            <br><br>

            <h2>Paiement et salaire</h2>
            <button class="btn btn-primary mb-2" id="travail1">Voir tous les salaires et les paiements d un employee</button>
            <button class="btn btn-primary mb-2" id="travail-non-paye-et-payer-d1-employe-sur-une-periode">Voir tous les salaires et les paiements d un employee 2 dates</button>
            <!-- Tous les salaire  des tous les employee entre 2 date -->
            <button class="btn btn-primary mb-2" id="salaire-convenu-sur-une-periode">Salaire convenu entre 2 dates</button>
            <!-- Tous les salaire qu lui a attribuer entre 2 date -->
            <button class="btn btn-primary mb-2" id="salaire-convenu-d1-personnel-entre-2dates">salaire convenu d un personnel entre 2 dates</button>
            <button class="btn btn-primary mb-2" id="tous-les-salaires-sur-un-champs">Tous les salaires sur un champs</button>
            <button class="btn btn-primary mb-2" id="tous-les-salaires-sur-un-champs-entre-2-dates">Tous les salaires sur un champs entre 2 dates</button> 
            
            <br><br>

            <h2>Ventes</h2>
            <button class="btn btn-primary" id="ventes-2Dates">Entre 2 dates</button>
            <br><br>

            <h2>Depots</h2>
            <button class="btn btn-primary" id="depots-2Dates">Entre 2 dates</button>
            <br><br>
        </div>
        <div class="col-md-7 mt-5">
          
          <form action="reponse.php" method="POST" class=" mt-5">
            <p class=" text-secondary pt-3 mt-5" id="phrase"></p>
            <div id="date" class="mt-5">
              <div class="input-group mb-3 w-75">
                <span class="input-group-text" >Dates 1*</span>
                <input required type="date"  name="Date1" id="dates1" class="form-control" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
              </div>
              <div class="input-group mb-3 w-75">
                <span class="input-group-text" >Dates 2*</span>
                <input required type="date"  name="Date2" id="dates2" class="form-control" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
              </div>
            </div>
            <div id="choix-identifiant">
              <div class="input-group mb-3  mx-auto d-block">
                  <span class="input-group-text w-25" id="phrase-identifiant">Identifiant*</span>
                  <input  type="text" name="IdentifiantM" list="" id="identifiantM" class="form-control w-75" placeholder="entrer identifiant" aria-label="Username" aria-describedby="nom" >
                  <datalist id="dataPersonnel">
                      <?php 
                        dataPersonnel();
                      ?>
                  </datalist>
                  <datalist id="dataChamps">
                      <?php 
                        dataChamps();
                      ?>
                  </datalist>
              </div>
            </div>
            <input type="hidden" name="Cache" id="cacho" >
            <input type="submit" value="Submit">
          </form>
       </div>
       </div>
</main>
</body>
</html>