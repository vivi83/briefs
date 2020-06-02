console.log("CA MARCHE");
// ON VA PRENDRE LA MAIN SUR LE FORMULAIRE
// ON VA BLOQUER L'ENVOI CLASSIQUE DU FORMULAIRE    => EVENEMENT submit SUR LE FORMULAIRE
// ET ON VA ENVOYER LES INFOS DU FORMULAIRE PAR AJAX
// AVANTAGE: ON NE RECHARGE PAS LA PAGE... 
//          (PLUS FLUIDE POUR LE VISITEUR, PLUS PERFORMANT...)

// ETAPE1: DECLARATION DE LA FONCTION
// => CODE EN ATTENTE
// POUR SAVOIR QUE CETTE FONCTION CALLBACK A UN PARAMETRE => DOC DE JS...

// PB: querySeclector NE PERMET DE SELECTIONNER QU'UNE SEULE BALISE
// MAIS MAINTENANT, ON A PLUSIEURS FORMULAIRES EN AJAX
// var formulaire = document.querySelector("form.ajax");

// ON DEFINIT LE TABLEAU ICI
var tableauArticle = [];    // CE SERA LE SERVEUR QUI VA ME CONSTRUIRE CE TABLEAU


var listeFormulaire = document.querySelectorAll("form.ajax");
// ON FAIT UNE BOUCLE POUR AGIR SUR CHAQUE FORMULAIRE UN PAR UN
listeFormulaire.forEach(function(formulaire){
    // POUR CHAQUE FORMULAIRE
    // ON VA BLOQUER LE FONCTIONNEMENT CLASSIQUE
    // ET ON VA ENVOYER LES INFOS PAR AJAX
    formulaire.addEventListener("submit", envoyerFormulaireAjax);
});


document.querySelector("form.read button[type=submit]").click();


function envoyerFormulaireAjax (event) 
{
    // LE PARAMETRE event NOUS SERT A BLOQUER LE FORMULAIRE CLASSIQUE...
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");

    // ON VA RECUPERER LES INFOS DU FORMULAIRE
    // ET ENSUITE ON VA ENVOYER LE REQUETE AJAX AVEC fetch

    var formulaire = event.target;
    // ON VA UTILISER UN OBJET DE LA CLASSE FormData
    // => CET OBJET SERVIRA DE CONTAINER AUX INFOS DU FORMULAIRE
    var formData = new FormData(formulaire);    
                                    // => AUTOMATIQUEMENT, 
                                    // formData VA ASPIRER TOUTES LES INFOS DU formulaire
                                    // COOL POUR NOUS ;-p

    // MAINTENANT ON PEUT ENVOYER LA REQUETE AJAX AVEC fetch
    var contenuForm = 
    {
        method: 'POST',     // NECESSAIRE POUR UPLOAD DE FICHIER
        body:   formData
    };
    // LA FONCTION fetch DE JS ENVOIE UNE REQUETE AJAX VERS api-ajax.php (le premier paramètre)
    fetch("api-ajax.php", contenuForm)
    // POUR LE READ IL FAUT COMPLETER LE CODE POUR RECUPERER LES DONNEES RENVOYEES PAR LE SERVEUR
    .then(function(responseServer) {
        // DEBUG
        console.log(responseServer);

        // EXTRAIRE UN OBJET JS DEPUIS LA REPONSE DU SERVEUR
        return responseServer.json();
    })
    .then(function(objetJSON) {
        // DEBUG
        console.log(objetJSON);

        // SI LE TABLEAU DES ARTICLES EST FOURNI PAR LE SERVEUR
        // ALORS JE VAIS M'EN SERVIR POUR CONSTRUIRE LE HTML
        if ('tableauArticle' in objetJSON)
        {
            // ON COPIE LE TABLEAU DANS NOTRE VARIABLE tableauArticle
            tableauArticle = objetJSON.tableauArticle;
            // => CE TABLEAU JSON SERA EN FAIT FOURNI PAR LE SERVEUR WEB (PHP + TABLE SQL)
            // => LES PROPRIETES SERONT CONSTRUITES A PARTIR DES NOMS DES COLONNES SQL
            rafraichirListeArticle();

        }
    })
    ;

};


// PROGRAMMATION FONCTIONNELLE
// => JE RANGE MON CODE DANS DES FONCTIONS

function rafraichirListeArticle ()
{
    // ON REMET LA LISTE A ZERO
    var baliseListTodo = document.querySelector(".listTodo");
    baliseListTodo.innerHTML = '';

    for(var indice=0; indice < tableauArticle.length; indice++)
    {
        var article = tableauArticle[indice];
        var codeHTML = 
        `
                    <article class="${article.level}">
                        <h3>${article.username}</h3>
                        <p>${article.title}</p>
                        <p>${article.level}</p>
                        <p>${article.id}</p>
                       
                        <button class="update" data-indice="${indice}" data-id="${article.id}">modifier</button>
                        <button class="delete" data-id="${article.id}">supprimer</button>
                    </article>
        `;
        // AJOUTER DANS LA BALISE listTodo
        baliseListTodo.innerHTML += codeHTML;
    }


    // CHRONOLOGIE: 
    // JE DOIS ATTENDRE QUE LES BOUTONS SOIENT RAJOUTES AVEC LES ARTICLES
    // ET ENSUITE JE PEUX AJOUTER LES EVENT LISTENER DESSUS

    // UNE FOIS QU'ON A CREE LES ARTICLES AVEC LES BOUTONS SUPPRIMER
    // ON VA AJOUTER UN EVENT LISTENER SUR CHAQUE BOUTON
    var listeBoutonSupprimer = document.querySelectorAll(".listTodo button.delete");
    listeBoutonSupprimer.forEach(function(bouton) {
        bouton.addEventListener("click", supprimerLigne);
    });


    var listeBoutonModifier = document.querySelectorAll(".listTodo button.update");
    listeBoutonModifier.forEach(function(bouton) {
        bouton.addEventListener("click", modifierLigne);
    });

}

function modifierLigne (event)
{
    // DEBUG
    console.log(event.target);
    var bouton = event.target;
    // JE RECUPERE indice DANS tableauArticle
    var indice = bouton.getAttribute("data-indice");
    var article = tableauArticle[indice];
    // DEBUG
    console.log(article);

    // MAINTENANT IL FAUT COPIER LES INFOS DANS LE FORMULAIRE
 
    document.querySelector("form.update input[name=id]").value = article.id;
    document.querySelector("form.update input[name=username]").value = article.username;
    //document.querySelector("form.update input[name=title]").value = article.title;

    var selecteurRadio = "form.update input[value=" + article.level + "]";
    //var radio = document.querySelector(selecteurRadio);
    console.log(selecteurRadio);
    
    // JE SELECTIONNE EN CSS LA BONNE BALISE radio ET JE LA CHECK EN HTML
    document.querySelector(selecteurRadio).checked = true;

    var selecteurDeroulant = "form.update input[value=" + article.title + "]";
    //var deroulant = document.querySelector(selecteurDeroulant);
    console.log(selecteurDeroulant);
  
    
}

// FONCTION DE CALLBACK SUR LE CLICK DU BOUTON SUPPRIMER
function supprimerLigne (event)
{
    // DEBUG
    console.log(event.target);
    var bouton = event.target;
    // JE RECUPERE id DE LA LIGNE A SUPPRIMER
    var id = bouton.getAttribute("data-id");
    // ET JE COPIE id DANS LE FORMULAIRE
    var inputId = document.querySelector("form.delete input[name=id]");
    inputId.value = id;

    // MAINTENANT ON VA DECLENCHER L'ENVOI DU FORMULAIRE DE DELETE
    // document.querySelector("form.delete").submit(); // ENVOI SANS AJAX
    document.querySelector("form.delete button[type=submit]").click();
}




// ON VEUT LE CODE JS 
// QUI PRODUISE LE HTML POUR LA LISTE DES TACHES
// REPETITION => TECHNIQUE:             BOUCLE
//                  AVEC COMME COMBO :  UN TABLEAU
