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
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.esm.js"></script>
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.esm.min.js"></script>
    <script defer  src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
    <script defer src="./jsfile/navbar.js"></script>
   
    <link rel="stylesheet" href="index.css">
</head>
<body class="bg-light">

    <main>
        <div class="container bg-transparent pt-5">
        
            <div class=" p-3 mb-5 border border-1 rounded mt-5" id="sa">
                <h2 class="p-2">Ajoutez sorties</h2>
                <hr class="w-auto">
                <form class="ps-1 pe-1 pt-3 pb-1 mb-5">
                    
                      <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text" id="anne">Date*</span>
                            <input required type="date" class="form-control" placeholder="Nom du client" aria-label="Username" aria-describedby="anne">
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <label class="input-group-text" for="inputGroupSelect01">type</label>
                            <select class="form-select" id="inputGroupSelect01">
                              <option selected value="envies">envies</option>
                              <option value="2">charge</option>
                              <option selected value="envies">emprunt</option>
                              <option value="2">depenses</option>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-group mb-3 col-md-6">
                            <span class="input-group-text">Motif :*</span>
                            <textarea class="form-control" aria-label="With textarea" placeholder="Entrer motif"></textarea>
                          </div>
                      </div>
                      <div class="input-group col-md-5">
                        <span class="input-group-text">Montant*</span>
                        <input required type="float" pattern="[0-9]" class="form-control" placeholder="entrer montant sortie" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">$</span>
                    </div>
                      
                      <button type="submit" class="btn btn-primary p-2 mt-4">Ajoutez sorties</button>
                    
                </form>
            </div>
            
        </div>
    
    </main>

    <footer>
        <hr class="w-100">
        <p class="text-secondary text-center p-3">&copy; copyright Maria</p>
    </footer>
    
</body>
</html>