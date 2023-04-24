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
    <script defer src="./jsfile/takeSalaire.js"></script>
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

  function dataSalaire(){
    include 'connexion.php';
    $sql = ("SELECT idSalaire, Salaire.motif, NomClient, Poste, DatesLocation, TypeClient, Nom, Salaire, DatesDit, Personnel.idPersonnel, Champs_cultive.idChamps FROM Salaire, Champs_cultive, Personnel WHERE (Salaire.idChamp = Champs_cultive.idChamps) and (Salaire.idPersonnel = Personnel.idPersonnel) order by idSalaire desc");
    $result = mysqli_query($db, $sql);
            
    if(mysqli_num_rows($result)>0){
                        
        while($row= mysqli_fetch_assoc($result)){
            echo"<option value='ID ::".$row["idSalaire"].":: Nom travailleur ::".$row["Nom"].":: Salaire ::".$row["Salaire"].":: Nom du Client = ::".$row["NomClient"].":: Dates location =::".$row["DatesLocation"].":: Type de client = ::".$row["TypeClient"].":: idPersonnel = ::".$row["idPersonnel"].":: idChamps = ::".$row["idChamps"].":: hectares = ::".$row["NbreHectares"]."::dates dit ::".$row["DatesDit"].":: poste ::".$row["Poste"]."::motif ::".$row["motif"]."'>client: ".$row["NomClient"]." :personnel ".$row["Nom"]." : salaire ".$row["Salaire"]."</option>"; 
        }
                
   }else{echo "Une erreur s est produite ";}

}
?>

    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Modifier Salaire</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <div class="input-group mb-3  mx-auto d-block">
                        <span class="input-group-text " id="id">Identifiant*</span>
                        <input required type="text" list="dataBesoin" id="identifiantM" class="form-control w-50" placeholder="entrer identifiant" aria-label="Username" aria-describedby="nom" >
                            <datalist id="dataBesoin">
                                <?php 
                                    dataSalaire();

                                ?>
                            </datalist>
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto d-block">
                        <span class="input-group-text w-50" id="dates">Dates *</span>
                        <input required type="date"  name="dates" id="datesDit" class="form-control w-50" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
                    </div>
                    <div class="row">
                    <div class='mb-3 col-md-6'>
                            <div class="input-group ">
                                <span class="input-group-text">Choisir Personnel*</span>
                                <input required type="text" list="personnelChoix" name="champs" id="personnel" class="form-control" placeholder="choisir le personnel" aria-label="Username" aria-describedby="nom">
                                <datalist id="personnelChoix">
                                    <?php 
                                        dataPersonnel();

                                    ?>
                                </datalist>
                            </div>
                            <small id="idPVide"></small>
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
                            <small id="idCVide"></small>
                          </div>
                          
                    </div>
                   
                      <div class="row">
                        <div class="col-md-7 mt-5 mb-4">
                            <div class="input-group ">
                                <span class="input-group-text">Salaire*</span>
                                <input required type="float" id="salaire" name="CM" class="form-control" placeholder="entrer salaire" aria-label="Amount (to the nearest cdf)">
                                <span class="input-group-text">FC</span>
                            </div>
                            <small id="salaireVide"></small>
                        </div>
                      
                        
                      </div>
                      
                      <div class="row">
                        
                      <div class="input-group">
                        <span class="input-group-text">Commentaires</span>
                        <textarea class="form-control" name="commentaire" id="commentaire" aria-label="With textarea" placeholder="Entrer commentaire"></textarea>
                      </div>

                      <p id="txtHint"></p>
                      <input type="hidden" value="update" id="typeFormulaire">
                      <button id='envoie' class="btn btn-primary p-3 fs-4 mt-4 w-25">Modifier</button>
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