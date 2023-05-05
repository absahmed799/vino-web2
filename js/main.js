/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

// **********************************************************
// NE EFFACER PAS BaseURL, UTILISE COMMENT OU UNCOMMENT !!!

//const BaseURL = "http://localhost/vino-git/";
const BaseURL = "http://127.0.0.1:8888/vino_etu/";
//const BaseURL = document.baseURI;

// **********************************************************

console.log(BaseURL);
window.addEventListener("load", function () {
  console.log("load");
  document.querySelectorAll(".btnBoire").forEach(function (element) {
    //console.log(element);
    element.addEventListener("click", function (evt) {
      let id = evt.target.parentElement.dataset.id;
      let requete = new Request(
        BaseURL + "index.php?requete=boireBouteilleCellier",
        { method: "POST", body: '{"id": ' + id + "}" }
      );

      fetch(requete)
        .then((response) => {
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error("Erreur");
          }
        })
        .then((response) => {
          console.debug(response);
        })
        .catch((error) => {
          console.error(error);
        });
    });
  });

  document.querySelectorAll(".btnAjouter").forEach(function (element) {
    console.log(element);
    element.addEventListener("click", function (evt) {
      let id = evt.target.parentElement.dataset.id;
      let requete = new Request(
        BaseURL + "index.php?requete=ajouterBouteilleCellier",
        { method: "POST", body: '{"id": ' + id + "}" }
      );

      fetch(requete)
        .then((response) => {
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error("Erreur");
          }
        })
        .then((response) => {
          console.debug(response);
        })
        .catch((error) => {
          console.error(error);
        });
    });
  });

  let inputNomBouteille = document.querySelector("[name='nom_bouteille']");
  console.log(inputNomBouteille);
  let liste = document.querySelector(".listeAutoComplete");

  if (inputNomBouteille) {
    inputNomBouteille.addEventListener("keyup", function (evt) {
      console.log(evt);
      let nom = inputNomBouteille.value;
      liste.innerHTML = "";
      if (nom) {
        // let requete = new Request(BaseURL+"index.php?requete=autocompleteBouteille", {method: 'POST', body: '{"nom": "'+nom+'"}'});
        let requestBody = { nom: nom };
        let requete = new Request(
          BaseURL + "index.php?requete=autocompleteBouteille",
          {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(requestBody),
          }
        );
        //console.log(requete); // debug
        fetch(requete)
        .then((response) => {
          console.log(response);
      
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error("Erreur");
          }
        })
        .then((data) => { // <-- change le nom du parametre
          console.log(data.data);
      
          data.forEach(function (element) { // <-- use lethe stored data
            liste.innerHTML +=
              "<li data-id='" + element.id + "'>" + element.nom + "</li>";
          });
        })
        .catch((error) => {
          console.error(error);
        });
      
      }
    });

    let bouteille = {
      nom: document.querySelector(".nom_bouteille"),
      millesime: document.querySelector("[name='millesime']"),
      quantite: document.querySelector("[name='quantite']"),
      date_achat: document.querySelector("[name='date_achat']"),
      prix: document.querySelector("[name='prix']"),
      garde_jusqua: document.querySelector("[name='garde_jusqua']"),
      notes: document.querySelector("[name='notes']"),
    };

    liste.addEventListener("click", function (evt) {
      console.dir(evt.target);
      if (evt.target.tagName == "LI") {
        bouteille.nom.dataset.id = evt.target.dataset.id;
        bouteille.nom.innerHTML = evt.target.innerHTML;

        liste.innerHTML = "";
        inputNomBouteille.value = "";
      }
    });

    let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
    if (btnAjouter) {
      btnAjouter.addEventListener("click", function (evt) {
       
        var param = {
          id_bouteille: bouteille.nom.dataset.id,
          date_achat: bouteille.date_achat.value,
          garde_jusqua: bouteille.garde_jusqua.value,
          notes: bouteille.notes.value,
          prix: bouteille.prix.value,
          quantite: bouteille.quantite.value,
          millesime: bouteille.millesime.value,
        };
        let requete = new Request(
          BaseURL + "index.php?requete=ajouterNouvelleBouteilleCellier",
          { method: "POST", body: JSON.stringify(param) }
        );
        fetch(requete)
          .then((response) => {
            if (response.status === 200) {
              return response.json();
            } else {
              throw new Error("Erreur");
            }
          })
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.error(error);
          });
      });
    }



    let btnModifer = document.querySelector("[name='modifierBouteilleCellier']");
    if (btnModifer) {
      btnModifer.addEventListener("click", function (evt) {
        console.log('click modifier');
         let id= document.querySelector("[name='id']");
         console.log(id.value);
        var param = {
         id:id.value,
          date_achat: bouteille.date_achat.value,
          garde_jusqua: bouteille.garde_jusqua.value,
          notes: bouteille.notes.value,
          prix: bouteille.prix.value,
          quantite: bouteille.quantite.value,
          millesime: bouteille.millesime.value,
        };
        let requete = new Request(
          BaseURL + "index.php?requete=modifierBouteilleCellier",
          { method: "POST", body: JSON.stringify(param) }
        );
        console.log(requete);
        fetch(requete)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              return response.json();
            } else {
              throw new Error("Erreur");
            }
          })
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.error(error);
          });
      });
    }
  }
});


/**
 * Mettre a jour la quantité de bouteille dans le cellier
 */

function ajouterBouteilleQt(btn) {
  let bouteille = btn.closest('.bouteille');
  let quantiteElem = bouteille.querySelector('.quantite-valeur');
  let quantite = parseInt(quantiteElem.innerHTML);
  quantite++;
  quantiteElem.innerHTML = quantite;
}

function boireBouteilleQt(btn) {
  let bouteille = btn.closest('.bouteille');
  let quantiteElem = bouteille.querySelector('.quantite-valeur');
  let quantite = parseInt(quantiteElem.innerHTML);
  if (quantite > 0) {
      quantite--;
  }
  quantiteElem.innerHTML = quantite;
}

let btnAjouterList = document.querySelectorAll('.btnAjouter');
let btnBoireList = document.querySelectorAll('.btnBoire');

btnAjouterList.forEach(function(btnAjouter) {
  btnAjouter.addEventListener('click', function() {
      ajouterBouteilleQt(btnAjouter);
  });
});

btnBoireList.forEach(function(btnBoire) {
  btnBoire.addEventListener('click', function() {
      boireBouteilleQt(btnBoire);
  });
});
