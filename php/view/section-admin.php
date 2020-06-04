<section>
<section> <a href="index.php">Se déconnecter</a></section>

<section>
            <h2>FORMULAIRE DE CREATION (CREATE)</h2>
            <form class="ajax" action="" method="POST">
                <input type="text" name="username" required placeholder="entrez le nom">
                <select name="title">
                <option value=" A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web</option>
                    <option value="Concevoir l’architecture technique de l’application web">Concevoir l’architecture technique de l’application web</option>
                    <option value="Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option value="Configurer et assurer la gestion de la base de données de l’application"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option value="Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option value="Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option value="Ajouter de l’interactivité aux pages web de l’application en Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option value="Tester et assurer la compatibilité de l’application sur différents terminaux">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option value="Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option value="Configurer un serveur web"> Configurer un serveur web</option>
                    <option value=" Mettre en ligne l’application web"> Mettre en ligne l’application web</option>
                    <option value="Assurer la disponibilité et le suivi de l’application web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option value="Prévenir l’application web des risques classiques"> Prévenir l’application web des risques classiques</option>
                    <option value="Mettre en pratique les méthodes de prévention contre les attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option value="Faire de la veille"> Faire de la veille</option>
                    <option value="Travailler en équipe">Travailler en équipe</option>
                    <option value="Etre autonome et auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option value=" S'exprimer sur des éléments techniques auprès de ses collaborateurs"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
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
    
                <button type="submit">CREER UNE TACHE</button>
               
                <input type="hidden" name="identifiantFormulaire" value="create">
            </form>
        </section>
        <section>
            <h2>FORMULAIRE DE MODIFICATION (UPDATE)</h2>
            <form class="ajax update" action="" method="POST">
            <input type="text" name="username" required placeholder="entrez le nom">
            <select name="title">
            <option value=" A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web</option>
                    <option value="Concevoir l’architecture technique de l’application web">Concevoir l’architecture technique de l’application web</option>
                    <option value="Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option value="Configurer et assurer la gestion de la base de données de l’application"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option value="Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option value="Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option value="Ajouter de l’interactivité aux pages web de l’application en Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option value="Tester et assurer la compatibilité de l’application sur différents terminaux">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option value="Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option value="Configurer un serveur web"> Configurer un serveur web</option>
                    <option value=" Mettre en ligne l’application web"> Mettre en ligne l’application web</option>
                    <option value="Assurer la disponibilité et le suivi de l’application web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option value="Prévenir l’application web des risques classiques"> Prévenir l’application web des risques classiques</option>
                    <option value="Mettre en pratique les méthodes de prévention contre les attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option value="Faire de la veille"> Faire de la veille</option>
                    <option value="Travailler en équipe">Travailler en équipe</option>
                    <option value="Etre autonome et auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option value=" S'exprimer sur des éléments techniques auprès de ses collaborateurs"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
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
       


        
   
   </section>