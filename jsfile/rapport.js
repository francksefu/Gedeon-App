const butBesoinIdentifiant = document.querySelector('#tracteur-id');
const butBesoin2dates = document.querySelector('#tracteur-2-date');

const butPaiementIdentifiant = document.querySelector('#paie-id');
const butPaiement2dates = document.querySelector('#paie-2-date');

const butTracteur1 = document.querySelector('#tracteur1');
const butTracteur2 = document.querySelector('#tracteur2');
const butTracteur3 = document.querySelector('#tracteur3');

const caisseTout2date = document.querySelector('#caisse-tout');
const caisseEmprunt = document.querySelector('#caisse-emprunt');
const caisseRemboursement = document.querySelector('#caisse-remboursement');

const travailNonPayeEmploye = document.querySelector('#travail1');
const travailPaieNonPaieEmploye = document.querySelector('#travail-non-paye-et-payer-d1-employe');
const travailPaieNonPaieEmploye2Dates = document.querySelector('#travail-non-paye-et-payer-d1-employe-sur-une-periode');
const toutTravauxNonPaye = document.querySelector('#tout-lestravaux-nonpayee');
const salaireConvenu2Dates = document.querySelector('#salaire-convenu-sur-une-periode');
const salaireConvenu1PersonnelEntre2Dates = document.querySelector('#salaire-convenu-d1-personnel-entre-2dates');
const tousSalaireSur1Champs = document.querySelector('#tous-les-salaires-sur-un-champs');
const tousSalaireSur1Champs2Dates = document.querySelector('#tous-les-salaires-sur-un-champs-entre-2-dates');

const ventes = document.querySelector('#ventes-2Dates');
const depots = document.querySelector('#depots-2Dates');

function complete(phraseCont, type, data, cache) {
  const phrase = document.querySelector('#phrase');
  const dateContainer = document.querySelector('#date');
  const identifiantCont = document.querySelector('#choix-identifiant');
  const identifiant = document.querySelector('#identifiantM');
  identifiant.value ='';
  document.querySelector('#cacho').value = cache;
  phrase.textContent = phraseCont;

  if ( data !== '') {
    identifiant.setAttribute('list', data);
  }

  if ( type === 'identifiant') {
    dateContainer.style.display = 'none';
    identifiantCont.style.display = 'block';
  }

  if(type === 'date') {
    dateContainer.style.display = 'block';
    identifiantCont.style.display = 'none';
  }

  if(type === 'tout') {
    dateContainer.style.display = 'block';
    identifiantCont.style.display = 'flex';
  }
}

butBesoinIdentifiant.addEventListener('click',() => {
  const phrase = 'rechercher les besoins par identifiant champs, choississez juste le champs et l on vous montrera tous les besoins qui y sont lie'
  complete(phrase, 'identifiant', 'dataChamps', 'besoinId');
});

butBesoin2dates.addEventListener('click',() => {
  const phrase = 'rechercher les besoins entre 2 dates, completez juste les 2 fields ensuite soumettez';
  complete(phrase, 'date', '', 'besoin2date');
});

butPaiementIdentifiant.addEventListener('click',() => {
  const phrase = 'rechercher les paiements par identifiant champs, choississez juste le champs et l on vous montrera tous les besoins qui y sont lie'
  complete(phrase, 'identifiant', 'dataChamps', 'paieId');
});

butPaiement2dates.addEventListener('click',() => {
  const phrase = 'rechercher les paiements entre 2 dates, tous les paiements effectuer (quand vous payez vos employes entre 2 dates)';
  complete(phrase, 'date', '', 'paie2date');
});

butTracteur1.addEventListener('click',() => {
  const phrase = 'rechercher les beoins du tracteur 1 entre 2 dates, besoins triee par tracteur';
  complete(phrase, 'date', '', 'tracteur1');
});

butTracteur2.addEventListener('click',() => {
  const phrase = 'rechercher les beoins du tracteur 2 entre 2 dates, besoins triee par tracteur';
  complete(phrase, 'date', '', 'tracteur2');
});

butTracteur3.addEventListener('click',() => {
  const phrase = 'rechercher les beoins du tracteur 3 entre 2 dates, besoins triee par tracteur';
  complete(phrase, 'date', '', 'tracteur3');
});

caisseTout2date.addEventListener('click',() => {
  const phrase = 'Voir l etat de  votre caisse entre 2 dates';
  complete(phrase, 'date', '', 'caisseTout');
});

caisseEmprunt.addEventListener('click',() => {
  const phrase = 'Voir l etat de  votre caisse entre 2 dates (l argent triee par emprunt)';
  complete(phrase, 'date', '', 'caisseEmp');
});

caisseRemboursement.addEventListener('click',() => {
  const phrase = 'Voir l etat de  votre caisse entre 2 dates triee par remboursements';
  complete(phrase, 'date', '', 'caisseRembourse');
});

travailNonPayeEmploye.addEventListener('click',() => {
  const phrase = 'Voir tous les salaires et les paiements d un employee';
  complete(phrase, 'identifiant', 'dataPersonnel', 'travailNPE');
});


travailPaieNonPaieEmploye2Dates.addEventListener('click',() => {
  const phrase = 'Voir tous les salaires et les paiements d un employee entre 2 dates';
  complete(phrase, 'tout', 'dataPersonnel', 'travailPNP2date');
});

salaireConvenu1PersonnelEntre2Dates.addEventListener('click',() => {
  const phrase = 'salaire convenu d un employE entre 2 dates';
  complete(phrase, 'tout', 'dataPersonnel', 'salaireC1PE2date');
});

salaireConvenu2Dates.addEventListener('click',() => {
  const phrase = 'Tous les salaire convenu entre 2 dates';
  complete(phrase, 'date', '', 'salaireCE2D');
});

tousSalaireSur1Champs.addEventListener('click',() => {
  const phrase = 'Tous les salaire convenu sur un champs particulier';
  complete(phrase, 'identifiant', 'dataChamps', 'salaireSC');
});

tousSalaireSur1Champs2Dates.addEventListener('click',() => {
  const phrase = 'Tous les salaire convenu sur un champs particulier entre 2 date';
  complete(phrase, 'tout', 'dataChamps', 'salaireS1CE2date');
});

ventes.addEventListener('click',() => {
  const phrase = 'ventes entre 2 dates, completez et voyez';
  complete(phrase, 'date', '', 'ventes');
});

depots.addEventListener('click',() => {
  const phrase = 'depot entre 2 dates, completez et voyez';
  complete(phrase, 'date', '', 'depot');
});
