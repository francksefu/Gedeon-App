// take all value inside inputs

const infoChamps = document.querySelector('#nomChamps');
const mazout = document.querySelector('#cout_Mazout');
const pannes = document.querySelector('#cout_Pannes');
const montant = document.querySelector('#montant');
const motif = document.querySelector('#commentaire');
const nomTracteur = document.querySelector('#tracteur');
const datesDep = document.querySelector('#datesDep');
const total = document.querySelector('#totalB');
const btn = document.querySelector('#envoie');
const idChampsVide = document.querySelector('#identifiantVide'); 
let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`;

// take juste id for champs 


const messageVide = 'Veuillez remplir ce champs svp'

// Calcul sommes 
const calculSomme = () => {
  let mazoutC = mazout.value;
  let pannesC = pannes.value;
  let montantC = montant.value;

  if (mazoutC == '') {mazoutC = 0;} 
  if (pannesC == '') {pannesC = 0;}
  if (montantC == '') {montantC = 0;}  
  return mazoutC*1 + pannesC*1 + montantC*1;
}

// Use ajax to insere it in the BD (communication with CRUD file)

function showHint(str) {
  
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
        feedback = this.responseText;
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    xmlhttp.open("GET", "classBesoin.php?q=" + str);
    xmlhttp.send();
    }
  }
btn.addEventListener('click', () => {
  if(infoChamps.value == ''){
    idChampsVide.textContent = messageVide;
    idChampsVide.style.color = 'red';
    return;
  }
  let mazoutValeur = mazout.value;
  let pannesValeur = pannes.value;
  let montantValeur = montant.value;
  if (mazoutValeur == '') {mazoutValeur = 0;} 
  if (pannesValeur == '') {pannesValeur = 0;}
  if (montantValeur == '') {montantValeur = 0;}
  
  const idC = infoChamps.value.split(':');
  const prend = idC[idC.length - 1]+"::"+mazoutValeur+"::"+pannesValeur+"::"+montantValeur+"::"+motif.value+"::"+nomTracteur.value+"::"+datesDep.value;
  showHint(prend);
  
    infoChamps.value =""; 
    mazout.value = "";
    pannes.value = ""
    montant.value = "";
    motif.value = ""; 
    total.value = "";
});


mazout.addEventListener('change', () => {
  
    total.value = calculSomme();
});
pannes.addEventListener('change', () => {
    total.value = calculSomme();
});
montant.addEventListener('change', () => {
    total.value = calculSomme();
});