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
    <script defer src="./jsfileAjax/takeChamp.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body class="bg-light">


    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Add client pour champs ou tours</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <input type="hidden" id="identifiantM" value="">
                 
                <!--<form class="ps-1 pe-1 pt-3 pb-3" method= "POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nomC">Nom du client*</span>
                            <input required type="text"  name="dates" id="nomClient" class="form-control w-50" placeholder="Entrer nom du client" aria-label="Username" aria-describedby="nom" >
                        </div>
                        <small id="clientVide"></small>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text" id="tours">Nombres d hectares ou tours*</span>
                            <input required type="text"  name="dates" id="champsTours" class="form-control w-50" placeholder="Entrer nombres d hectares ou tours" aria-label="Username" aria-describedby="nom" >
                        </div>
                        <small id="hectaresVide"></small>
                    </div>
                    <div class="input-group mb-3 col-md-4">
                        <label class="input-group-text" for="type">Type de client</label>
                        <select class="form-select" id="type">
                          <option selected value="champs">champs</option>
                          <option value="tours">tours</option>          
                        </select>
                     </div>
                </div>
                
                <div class="row mt-4 mb-4">
                    <div class="input-group col-md-6 ">
                        <span class="input-group-text" id="dates">Dates de la location*</span>
                        <input required type="date"  name="dates" id="datesLoc" class="form-control w-50" placeholder="mettre la date" aria-label="Username" aria-describedby="nom" value="<?php $d = strtotime("today"); echo date('Y-m-d',$d); ?>">
                    </div>
                    <div class="input-group col-md-6">
                        <span class="input-group-text">Sommes entrée*</span>
                        <input required type="float" id="montant" name="CM" class="form-control" placeholder="entrer argent" aria-label="Amount (to the nearest cdf)">
                        <span class="input-group-text">$</span>
                        <small id="montantVide"></small>
                    </div>
                </div>

                <div class="input-group w-75 mt-2">
                        <span class="input-group-text">Commentaires</span>
                        <textarea class="form-control" name="commentaire" id="commentaire" aria-label="With textarea" placeholder="Entrer commentaire"></textarea>
                      </div>
                
                      
                <p id="txtHint"></p>
                <input type="hidden" value="add" id="typeFormulaire">
                <button id='envoie' class="btn btn-primary p-3 fs-4 mt-4 w-25">Ajoutez</button>
            
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