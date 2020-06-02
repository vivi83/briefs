<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brief</title>
    <style>
html, body {
    width:100%;
    height:100%;
    padding:0;
    margin:0;
    font-size:16px;
}
* {
    box-sizing: border-box;
}
h1, h2, h3 {
    padding:0.5rem;
    text-align:center;
    margin:0;
}
form {
    display: flex;
    flex-direction: column;
    width:100%;
    padding:1rem;
}        
form > * {
    margin: 0.2rem;
    padding: 0.2rem;
    font-family: monospace;
    width:100%;
}
.listTodo {
    display:flex;
    flex-wrap: wrap;
    width:100%;
    justify-content: center;
}
.listTodo article {
    border:1px solid #aaaaaa;
    padding: 0.25rem;
    margin:0.25rem;
    width: calc(100% / 3 - 0.5rem); /* IL FAUT ENLEVER LE MARGIN */
    min-width:200px;
}
article img {
    width:100%;
    height:15vh;
    object-fit:cover;
}
article.imiter {
    background-color:red;
}
article.adapter {
    background-color: #BB0B0B;
}
article.transposer {
    background-color: #BF3030;
}
article {
    transition: all 0.5s;
}
article:hover {
    border:1px solid #ffffff;
    box-shadow: 1px 2px 4px rgba(0,0,0,0.8);
}
body {
    display: flex;
    flex-direction: column;
    width:100%;
    align-items: center;
}
body > * {
    max-width:960px;
}
.cache {
    display: none;
}
    </style>
</head>
<body>
    <header>
        <h1>BRIEF</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATION (CREATE)</h2>
            <form class="ajax" action="" method="POST">
                <input type="text" name="username" required placeholder="entrez le nom">
                <input type="text" name="title" required placeholder="entrez compétence">
                
                <label>
                    <input type="radio" name="level" value="imiter" required placeholder="entrez le statut">
                    <span>imiter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="adapter" required placeholder="entrez le statut">
                    <span>adapter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="transposer" required placeholder="entrez le statut">
                    <span>transposer</span>
                </label>
    
                <button type="submit">CREER UNE TACHE</button>
               
                <input type="hidden" name="identifiantFormulaire" value="create">
            </form>
        </section>
        <section>
            <h2>FORMULAIRE DE MODIFICATION (UPDATE)</h2>
            <form class="ajax update" action="" method="POST">
            <input type="text" name="username" required placeholder="entrez le nom">
                <input type="text" name="title" required placeholder="entrez compétence">
                
                <label>
                    <input type="radio" name="level" value="imiter" required placeholder="entrez le statut">
                    <span>imiter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="adapter" required placeholder="entrez le statut">
                    <span>adapter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="transposer" required placeholder="entrez le statut">
                    <span>transposer</span>
                </label>
                
                <input type="hidden" name="id" required placeholder="id de la ligne">
                <button type="submit">MODIFIER UNE TACHE</button>
                
                <input type="hidden" name="identifiantFormulaire" value="update">
            </form>
        </section>
        <section class="cache">
            <h2>FORMULAIRE DE DELETE</h2>
            <form class="ajax delete" action="">
                <input type="number" name="id" required placeholder="id de la ligne">
                <button type="submit">SUPPRIMER LA LIGNE</button>
               
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>
        <section>
            <h2>AFFICHAGE DES TACHES (READ)</h2>

            <form class="ajax read" action="" method="POST">
                <button type="submit">RAFRAICHIR LA LISTE DES TACHES</button>
                
                <input type="hidden" name="identifiantFormulaire" value="read">
            </form>
            <div class="listTodo">
            </div>
        </section>
    </main>
    <footer>
        <p>tous droits réservés - 2020</p>
    </footer>
    <script>

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
                    <article class="${article.level}">
                        <h3>${article.username}</h3>
                        <p>${article.title}</p>
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
    document.querySelector("form.update input[name=title]").value = article.title;
    
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

    </script>
</body>
</html>