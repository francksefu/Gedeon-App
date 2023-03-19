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
    <script defer src="./takeVentes.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body class="bg-light">
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

?>

    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Add ventes</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <!--<form class="ps-1 pe-1 pt-3 pb-3" method= "POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                    <div class="input-group mb-3 w-50 mx-auto d-block">
                        <span class="input-group-text w-50" id="dates">Dates de la ventes*</span>
                        <input required type="date"  name="dates" id="datesVente" class="form-control w-50" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <div class="input-group ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="nom">Nom du produit*</span>
                                    <input type="text"  name="nom" id="nomProduit" class="form-control" placeholder="Entrer nom du produit" aria-label="Username" aria-describedby="nom" >
                                </div>
                            </div>
                            <small id="nomVide"></small>
                        </div>

                        
                          
                          
                    </div>
                   
                      <div class="row">
                        <div class="col-md-7 mb-4">
                            <div class="input-group ">
                                <span class="input-group-text">Prix d achat*</span>
                                <input required type="float" id="pA" name="CM" class="form-control" placeholder="entrer cout_Mazout" aria-label="Amount (to the nearest cdf)">
                                <span class="input-group-text">FC</span>
                            </div>
                            <small id="paVide"></small> 
                        </div>
                     
                        <div class="col-md-7 mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Prix de vente*</span>
                                <input required type="float" id="pV" name="CP" class="form-control" placeholder="entrer cout des pannes" aria-label="Amount (to the nearest cdf)">
                                <span class="input-group-text">FC</span>
                            </div>
                            <small id="pvVide"></small>
                        </div>
                        
                      </div>
                      <div class="row">
                        
                        <div class="input-group mb-5 col-md-7">
                            <span class="input-group-text">Benefice*</span>
                            <input readonly type="float" id="benefice" name="CP" class="form-control" placeholder="je calcul tout pour toi" aria-label="Amount (to the nearest cdf)">
                            <span class="input-group-text">FC</span>
                        </div>
                      <div class="row">
                        
                        <div class="input-group">
                            <span class="input-group-text">Commentaires</span>
                            <textarea class="form-control" name="commentaire" id="commentaire" aria-label="With textarea" placeholder="Entrer commentaire"></textarea>
                        </div>

                        <p id="txtHint"></p>
        
                        <button id='envoie' class="btn btn-primary p-3 fs-4 mt-4 w-25">Ajoutez</button>
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