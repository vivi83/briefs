<section>
<section> 
    <div id="dis"><a href="index.php">Se déconnecter</a></div></section>

<section>
            <h2>Créer Ta Compétence</h2>
            <form class="ajax" action="" method="POST">
                <input type="text" name="username" required placeholder="entrez le nom">
                <select name="title">
                <option class="C1"value="identifier-les-technologies-nécessaires"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web <img src="assets/img/C1.png"></option>
                    <option id="C2" value="Concevoir-l-architecture">Concevoir l’architecture technique de l’application web</option>
                    <option id="C3"value="Réaliser-fonctionnalités-backend-et-framewworks">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option id="C4"value="Configurer-assurer-la-BDD"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option id="C5"value="Créer-gabarits-et-schémas"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option id="C6"value="Intégrer-contenu-visuel-et-textuel"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option id="C7"value="Ajouter-interactivité-avec-Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option id="C8"value="Tester-responsive ">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option id="C9"value="Réaliser-application-qui-respecte-l-accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option id="C10"value="Configurer-serveur-web"> Configurer un serveur web</option>
                    <option id="C11"value="Mettre-en-ligne-l-application-web"> Mettre en ligne l’application web</option>
                    <option id="C12"value="Assurer-disponibilité-de-l-application-web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option id="C13"value="Prévenir-l-application-des-risques"> Prévenir l’application web des risques classiques</option>
                    <option id="C14"value="Utiliser-méthodes-de-prévention-contre-les-attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option id="C15" value="Faire-de-la-veille"> Faire de la veille</option>
                    <option id="C16"value="Travailler-en-équipe">Travailler en équipe</option>
                    <option id="C17"value="Etre-autonome-auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option id="C18"value="S-exprimer-sur-des-éléments-techniques"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
                </select>
                
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
    
                <button type="submit">Créer Ta Compétence</button>
               
                <input type="hidden" name="identifiantFormulaire" value="create">
            </form>
        </section>
        <section>
            <h2>Connaitre Ta Compétence</h2>

            <form class="ajax read" action="" method="POST">
                <button type="submit">Rafraichir Ta Compétence</button>
                
                <input type="hidden" name="identifiantFormulaire" value="read">
            </form>
            <div class="listTodo">
            </div>
        </section>

        <section>
            <h2>Modifier Ta Compétence</h2>
            <form class="ajax update" action="" method="POST">
            <input type="text" name="username" required placeholder="entrez le nom">
            <select name="title">
                <option class="C1"value="identifier-les-technologies-nécessaires"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web <img src="assets/img/C1.png"></option>
                    <option id="C2" value="Concevoir-l-architecture">Concevoir l’architecture technique de l’application web</option>
                    <option id="C3"value="Réaliser-fonctionnalités-backend-et-framewworks">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option id="C4"value="Configurer-assurer-la-BDD"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option id="C5"value="Créer-gabarits-et-schémas"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option id="C6"value="Intégrer-contenu-visuel-et-textuel"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option id="C7"value="Ajouter-interactivité-avec-Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option id="C8"value="Tester-responsive">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option id="C9"value="Réaliser-application-qui-respecte-l-accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option id="C10"value="Configurer-serveur-web"> Configurer un serveur web</option>
                    <option id="C11"value="Mettre-en-ligne-l-application-web"> Mettre en ligne l’application web</option>
                    <option id="C12"value="Assurer-disponibilité-de-l-application-web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option id="C13"value="Prévenir-l-application-des-risques"> Prévenir l’application web des risques classiques</option>
                    <option id="C14"value="Utiliser-méthodes-de-prévention-contre-les-attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option id="C15" value="Faire-de-la-veille"> Faire de la veille</option>
                    <option id="C16"value="Travailler-en-équipe">Travailler en équipe</option>
                    <option id="C17"value="Etre-autonome-auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option id="C18"value="S-exprimer-sur-des-éléments-techniques"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
                </select>
                
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
                <button type="submit">Modifier Ta Compétence</button>
                
                <input type="hidden" name="identifiantFormulaire" value="update">
            </form>
        </section>
        <section class="cache">
            <h2>Supprimer Ta Compétence</h2>
            <form class="ajax delete" action="">
                <input type="number" name="id" required placeholder="id de la ligne">
                <button type="submit">Supprimer Ta Compétence</button>
               
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>



        
   
   </section>