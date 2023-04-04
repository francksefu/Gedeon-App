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
    <script defer src="./jsfile/takeBesoinBon.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body class="back">
<?php
  include 'connexion.php';
  function datachamps(){
    include 'connexion.php';
    $sql = ("SELECT * FROM Champs_cultive");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='Nom client :".$row["NomClient"].": Hectares :".$row["NbreHectares"].": Dates location :".$row["DatesLocation"].": type = :".$row["TypeClient"].": id = :".$row["idChamps"]."'>".$row["NomClient"]." : ".$row["NbreHectares"]." : ".$row["TypeClient"]."</option>"; 
        }
                
   }else{echo "Une erreur s est produite ";}  

}

function dataBesoin(){
    include 'connexion.php';
    $sql = ("SELECT idDepense,Tracteur.idChamps, Cout_Mazout, Cout_Pannes, MontantDepense, Tracteur.Motif, NomTracteur, DatesDep, TotalBesoinT, NomClient, DatesLocation, TypeClient FROM Tracteur, Champs_cultive WHERE Tracteur.idChamps = Champs_cultive.idChamps order by idDepense desc");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='ID ::".$row["idDepense"].":: Nom client ::".$row["NomClient"].":: Type  ::".$row["TypeClient"].":: DatesLocation ::".$row["DatesLocation"].":: cout_M ::".$row["Cout_Mazout"].":: cout_P ::".$row["Cout_Pannes"].":: montant ::".$row["MontantDepense"].":: Motif ::".$row["Motif"].":: tracteur ::".$row["NomTracteur"].":: Dates dep ::".$row["DatesDep"].":: champ ::".$row["idChamps"]."'>".$row["NomClient"]." : ".$row["DatesLocation"]." : ".$row["TypeClient"]."</option>"; 
        }
                
   }else{echo "Une erreur s est produite ";}  

}

?>

    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Modifier besoin du tracteur</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <!--<form class="ps-1 pe-1 pt-3 b-3" method= "POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                    <div class="input-group mb-3  mx-auto d-block">
                        <span class="input-group-text " id="id">Identifiant*</span>
                        <input required type="text" list="dataBesoin" id="identifiantM" class="form-control w-50" placeholder="entrer identifiant" aria-label="Username" aria-describedby="nom" >
                            <datalist id="dataBesoin">
                                <?php 
                                    dataBesoin();

                                ?>
                            </datalist>
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto d-block">
                        <span class="input-group-text w-50" id="dates">Dates de la depense*</span>
                        <input required type="date"  name="dates" id="datesDep" class="form-control w-50" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" >
                    </div>
                    <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <label class="input-group-text" for="tracteur">Nom du tracteur</label>
                            <select class="form-select" id="tracteur">
                              <option selected value="tracteur1">tracteur 1</option>
                              <option value="tracteur2">tracteur 2</option>
                              <option value="tracteur3">tracteur 3</option>
                              
                            </select>
                          </div>
                          <div class='mb-3 col-md-6'>
                            <div class="input-group ">
                                <span class="input-group-text" id="nom">Identifier le champ*</span>
                                <input required type="text" list="champsChoix" name="champs" id="nomChamps" class="form-control" placeholder="choisir le champs" aria-label="Username" aria-describedby="nom">
                                <datalist id="champsChoix">
                                    <?php 
                                        datachamps();

                                    ?>
                                </datalist>
                            </div>
                            <small id="identifiantVide"></small>
                          </div>
                          
                    </div>
                   
                      <div class="row">
                      <div class="input-group mt-5 mb-4 col-md-7">
                            <span class="input-group-text">Cout_Mazout*</span>
                            <input required type="float" id="cout_Mazout" name="CM" class="form-control" placeholder="entrer cout_Mazout" aria-label="Amount (to the nearest cdf)">
                            <span class="input-group-text">FC</span>
                        </div>
                        <div class="input-group mb-3 col-md-7">
                            <span class="input-group-text">Cout_Pannes*</span>
                            <input required type="float" id="cout_Pannes" name="CP" class="form-control" placeholder="entrer cout des pannes" aria-label="Amount (to the nearest cdf)">
                            <span class="input-group-text">FC</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-group mb-5 col-md-7">
                            <span class="input-group-text">Montant depenses divers*</span>
                            <input required type="float"  name="montant" id="montant" class="form-control" placeholder="entrer Montant" aria-label="Amount (to the nearest cdf)">
                            <span class="input-group-text">FC</span>
                        </div>
                        
                        <div class="input-group mb-3 col-md-7">
                            <span class="input-group-text">Total besoin*</span>
                            <input readonly type="float" id="totalB" name="CP" class="form-control" placeholder="je calcul tout pour toi" aria-label="Amount (to the nearest cdf)">
                            <span class="input-group-text">FC</span>
                        </div>
                      <div class="row">
                        
                      <div class="input-group">
                        <span class="input-group-text">Commentaires</span>
                        <textarea class="form-control" name="commentaire" id="commentaire" aria-label="With textarea" placeholder="Entrer commentaire"></textarea>
                      </div>

                      <p id="txtHint"></p>
                      <input type="hidden" value="update" id="typeFormulaire">
                      <button id='envoie' class="btn btn-primary p-3 fs-4 mt-4 w-25">modifier ce besoin</button>
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