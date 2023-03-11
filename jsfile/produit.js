const nom = document.querySelector('#nomProduit');
const image = document.querySelector('#imageProduit');
const pA = document.querySelector('#pA');
const pV = document.querySelector('#pV');
const pVmin = document.querySelector('#pVmin');
const quantite = document.querySelector('#quantite');
const quantiteMin = document.querySelector('#quantiteMin');
const description = document.querySelector('#description');
const btn = document.querySelector('#envoie');
let feedback = '';
const compareFeedback = `<div class='alert alert-success' role='alert'>
Insertion fait avec success
</div>`;
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
    xmlhttp.open("GET", "produitClass.php?q=" + str);
    xmlhttp.send();
    }
  }
btn.addEventListener('click', () => {
  const prend = nom.value+"::"+image.value+"::"+pA.value+"::"+pV.value+"::"+pVmin.value+"::"+quantite.value+"::"+quantiteMin.value+"::"+description.value;
  showHint(prend);
  
    nom.value =""; 
    image.value = "";
    pA.value = ""
    pV.value = "";
    pVmin.value = ""; quantite.value = ""; quantiteMin.value = ""; description.value = "";
  
});
