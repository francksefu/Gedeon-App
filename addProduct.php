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
    <script defer src="./jsfile/produit.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body class="bg-light">

    <main>
    
        <div class="container bg-transparent pt-5">
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Add product</h2>
                <hr class="w-auto">
                <div class="ps-1 pe-1 pt-3 pb-3">
                <!--<form class="ps-1 pe-1 pt-3 pb-3" method= "POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
                    <div class="row">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="stock">Choisir stock</label>
                            <select class="form-select" name="stock" id="stock">
                              <option selected value="1">Stock 1</option>
                              <option value="2">Stock 2</option>
                            </select>
                          </div>
                          
                    </div>
                    
                      <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text" id="nom">Nom*</span>
                            <input required type="text" name="nomProduit" id="nomProduit" class="form-control" placeholder="Nom du produit" aria-label="Username" aria-describedby="nom">
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text" id="image">Image</span>
                            <input required type="text" name="imageProduit" id="imageProduit" class="form-control" placeholder="nom de l image du produit" aria-label="Username" aria-describedby="image">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text">Prix d achat*</span>
                            <input required type="float" name="PA" id="pA" class="form-control" placeholder="entrer prix d achat" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">$</span>
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text">Prix de vente*</span>
                            <input required type="text" id="pV" name="pV" class="form-control" placeholder="entrer prix de vente" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">$</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text">Prix de vente minimum*</span>
                            <input required type="number" id="pVmin" name="pVmin" class="form-control" placeholder="entrer prix de vente a ne pas depasser" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">$</span>
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text" id="basic-addon1">Quantite*</span>
                            <input required type="text" id="quantite" name="quantite" class="form-control" placeholder="Entrer quantite" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="input-group mb-3 col-md-6">
                        <span class="input-group-text" id="basic-addon1">Quantite minimum*</span>
                        <input required type="text" id="quantiteMin" name="quantiteMin" class="form-control" placeholder="Entrer quantite minimum" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                      <div class="input-group">
                        <span class="input-group-text">Description du produit</span>
                        <textarea class="form-control" name="description" id="description" aria-label="With textarea" placeholder="Entrer description"></textarea>
                      </div>

                      <p id="txtHint"></p>
    
                      <!--<button type="submit" class="btn btn-primary p-2 mt-4">Ajouter produit</button>-->
                      <p id='envoie' class=" bg-primary p-2 mt-4">Envoie</p>
      </div>    
                
            </div>
            
        </div>
    
    </main>

    <footer>
        <hr class="w-100">
        <p class="text-secondary text-center p-3">&copy; copyright Maria</p>
    </footer>
    
    <!--<script  src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>