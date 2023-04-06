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
    <script defer src="./jsfile/takePaiements.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body class="back">
<?php
  include 'connexion.php';
  function dataSalaire(){
    include 'connexion.php';
    $sql = ("SELECT idSalaire, Nom, Salaire, DatesDit, NomClient FROM Salaire, Personnel, Champs_cultive WHERE (Salaire.idPersonnel = Personnel.idPersonnel) and (Champs_cultive.idChamps = Salaire.idChamp) order by idSalaire desc");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='ID :".$row["idSalaire"].": Nom du travailleur :".$row["Nom"].": Salaire convenu :".$row["Salaire"].":Fc en date du = :".$row["DatesDit"].": pour le client = :".$row["NomClient"]."'>".$row["Nom"]." : ".$row["Salaire"]." : ".$row["NomClient"]."</option>"; 
        }
                
   }else{echo "Une erreur s est produite ";}

  }

  function dataPaiement() {
    include 'connexion.php';
    $sql = ("SELECT idMontant, Nom, Salaire, DatesDit, MontantPaye, DatesPaye, Commentaire, Salaire.idSalaire FROM MontantPaye, Salaire , Personnel WHERE (MontantPaye.idSalaire = Salaire.idSalaire) and (Salaire.idPersonnel = Personnel.idPersonnel) order by idMontant desc");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='ID ::".$row["idMontant"].":: Nom ::".$row["Nom"].":: Salaire convenu ::".$row["Salaire"]."::$ en date du = ::".$row["DatesDit"].":: montant = ::".$row["MontantPaye"].":: dates ::".$row["DatesPaye"].":: motif ::".$row["Commentaire"].":: idSalaire :: ".$row["idSalaire"]."'>".$row["Nom"]." :salaire ".$row["Salaire"]." : montant ".$row["MontantPaye"]."</option>"; 
        }
                
    }else{echo "Une erreur s est produite ";}
  }
?>

    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Modifier Paiements</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <div class="input-group mb-3  mx-auto d-block">
                        <span class="input-group-text " id="id">Identifiant*</span>
                        <input required type="text" list="dataBesoin" id="identifiantM" class="form-control w-50" placeholder="entrer identifiant" aria-label="Username" aria-describedby="nom" >
                            <datalist id="dataBesoin">
                                <?php 
                                    dataPaiement();

                                ?>
                            </datalist>
                    </div>
                <!--<form class="ps-1 pe-1 pt-3 pb-3" method= "POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                    <div class="input-group mb-3 w-50 mx-auto d-block">
                        <span class="input-group-text w-50" id="dates">Dates *</span>
                        <input required type="date"  name="dates" id="datesPaye" class="form-control w-50" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
                    </div>
                    <div class="row">
                    <div class='mb-3 col-md-12'>
                            <div class="input-group ">
                                <span class="input-group-text">Choisir salaire convenu*</span>
                                <input required type="text" list="salaireChoix" name="champs" id="salaireConvenu" class="form-control" placeholder="choisir salaire convenu" aria-label="Username" aria-describedby="nom">
                                <datalist id="salaireChoix">
                                    <?php 
                                        dataSalaire();

                                    ?>
                                </datalist>
                            </div>
                            <small id="salaireVide"></small>
                          </div>

                          <div class="col-md-7 mt-5 mb-4">
                            <div class="input-group ">
                                <span class="input-group-text">Montant payé*</span>
                                <input required type="float" id="montant" name="CM" class="form-control" placeholder="entrer salaire payé" aria-label="Amount (to the nearest cdf)">
                                <span class="input-group-text">FC</span>
                            </div>
                            <small id="montantVide"></small>
                        </div>
                    </div>
                   
                      
                      
                      <div class="row">
                        
                      <div class="input-group">
                        <span class="input-group-text">Commentaires</span>
                        <textarea class="form-control" name="commentaire" id="commentaire" aria-label="With textarea" placeholder="Entrer commentaire"></textarea>
                      </div>

                      <p id="txtHint"></p>
                      <input type="hidden" value="update" id="typeFormulaire">
                      <button id='envoie' class="btn btn-primary p-3 fs-4 mt-4 w-25">Modifiez</button>
                     <!-- <p id='envoie' class=" bg-primary p-2 mt-4">Envoie</p>-->
      </div>    
                
            </div>
            
        </div>
    
    </main>

    <footer>
        <hr class="w-100">
        <p class="text-secondary text-center p-3">&copy; copyright franck</p>
    </footer>
    
</body>
</html>