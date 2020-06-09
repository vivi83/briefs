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
var tableauArticle = [];    
var listeFormulaire = document.querySelectorAll("form.ajax");

listeFormulaire.forEach(function(formulaire){
    formulaire.addEventListener("submit", envoyerFormulaireAjax);
});

document.querySelector("form.read button[type=submit]").click();

function envoyerFormulaireAjax (event) 
{
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");
  
    var formulaire = event.target;
 
    var formData = new FormData(formulaire);    
           
    var contenuForm = 
    {
        method: 'POST',     
        body:   formData
    };
    
    fetch("api-ajax.php", contenuForm)
 
    .then(function(responseServer) {
     
        console.log(responseServer);
        
        return responseServer.json();
    })
    .then(function(objetJSON) {
       
        console.log(objetJSON);
      
        if ('tableauArticle' in objetJSON)
        {
            tableauArticle = objetJSON.tableauArticle;
           
            rafraichirListeArticle();
        }
    })
    ;
};

function rafraichirListeArticle ()
{

    var baliseListTodo = document.querySelector(".listTodo");
    baliseListTodo.innerHTML = '';
    for(var indice=0; indice < tableauArticle.length; indice++)
    {
        var article = tableauArticle[indice];
        var codeHTML = 
        `
                    <article class="${article.title}">
                        <h3>${article.username}</h3>
                        <h4>${article.title}</h4>
                        <p>${article.level}</p>
                        <button class="update" data-indice="${indice}" data-id="${article.id}">modifier</button>
                        <button class="delete" data-id="${article.id}">supprimer</button>
                    </article>
        `;
        
        baliseListTodo.innerHTML += codeHTML;
    }
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
    console.log(event.target);
    var bouton = event.target;
    
    var indice = bouton.getAttribute("data-indice");
    var article = tableauArticle[indice];
   
    console.log(article);
    
    document.querySelector("form.update input[name=id]").value = article.id;
    document.querySelector("form.update input[name=username]").value = article.username;
    document.querySelector("form.update select[id=title]").value = article.title;
    
    var selecteurRadio = "form.update input[value=" + article.level + "]";
    
    document.querySelector(selecteurRadio).checked = true;
}

function supprimerLigne (event)
{
    console.log(event.target);
    var bouton = event.target;
    
    var id = bouton.getAttribute("data-id");
  
    var inputId = document.querySelector("form.delete input[name=id]");
    inputId.value = id;

    document.querySelector("form.delete button[type=submit]").click();
}


// ON VEUT LE CODE JS 
// QUI PRODUISE LE HTML POUR LA LISTE DES TACHES
// REPETITION => TECHNIQUE:             BOUCLE
//                  AVEC COMME COMBO :  UN TABLEAU
