<section>
<section> <a href="index.php">Se déconnecter</a></section>

<section>
            <h2>FORMULAIRE DE CREATION (CREATE)</h2>
            <form class="ajax" action="" method="POST">
                <input type="text" name="username" required placeholder="entrez le nom">
                <select name="title">
                <option class="C1"value=" A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web<img src="assets/img/C1.png"></option>
                    <option id="C2" value="Concevoir l’architecture technique de l’application web">Concevoir l’architecture technique de l’application web</option>
                    <option id="C3"value="Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option id="C4"value="Configurer et assurer la gestion de la base de données de l’application"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option id="C5"value="Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option id="C6"value="Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option id="C7"value="Ajouter de l’interactivité aux pages web de l’application en Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option id="C8"value="Tester et assurer la compatibilité de l’application sur différents terminaux">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option id="C9"value="Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option id="C10"value="Configurer un serveur web"> Configurer un serveur web</option>
                    <option id="C11"value=" Mettre en ligne l’application web"> Mettre en ligne l’application web</option>
                    <option id="C12"value="Assurer la disponibilité et le suivi de l’application web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option id="C13"value="Prévenir l’application web des risques classiques"> Prévenir l’application web des risques classiques</option>
                    <option id="C14"value="Mettre en pratique les méthodes de prévention contre les attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option id="C15" value="Faire de la veille"> Faire de la veille</option>
                    <option id="C16"value="Travailler en équipe">Travailler en équipe</option>
                    <option id="C17"value="Etre autonome et auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option id="C18"value=" S'exprimer sur des éléments techniques auprès de ses collaborateurs"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
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
            <h2>AFFICHAGE DES TACHES (READ)</h2>

            <form class="ajax read" action="" method="POST">
                <button type="submit">RAFRAICHIR LA LISTE DES TACHES</button>
                
                <input type="hidden" name="identifiantFormulaire" value="read">
            </form>
            <div class="listTodo">
            </div>
        </section>
<<<<<<< HEAD
=======
       
>>>>>>> ebbce412a401cb40354650a0b4d9b7fa195df67f
        <section>
            <h2>FORMULAIRE DE MODIFICATION (UPDATE)</h2>
            <form class="ajax update" action="" method="POST">
            <input type="text" name="username" required placeholder="entrez le nom">
            <select name="title">
                <option class="C1"value=" A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web"> A partir d'un cahier des charges précis, identifier les technologies nécessaires à la réalisation de l'apllication web <img src="assets/img/C1.png"></option>
                    <option id="C2" value="Concevoir l’architecture technique de l’application web">Concevoir l’architecture technique de l’application web</option>
                    <option id="C3"value="Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants">Réaliser les fonctionnalités basiques d’une application web à partir d'un langage backend et utiliser les framewworks correspondants</option>
                    <option id="C4"value="Configurer et assurer la gestion de la base de données de l’application"> Configurer et assurer la gestion de la base de données de l’application</option>
                    <option id="C5"value="Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels"> Créer des gabarits à partir d’un cahier des charges et de schémas fonctionnels</option>
                    <option id="C6"value="Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges"> Intégrer le contenu visuel et textuel de l’application web en respectant le cahier des charges</option>
                    <option id="C7"value="Ajouter de l’interactivité aux pages web de l’application en Javascript"> Ajouter de l’interactivité aux pages web de l’application en Javascript</option>
                    <option id="C8"value="Tester et assurer la compatibilité de l’application sur différents terminaux">Tester et assurer la compatibilité de l’application sur différents terminaux</option>
                    <option id="C9"value="Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité">Réaliser une application web qui respecte les principales normes de qualité et d'accessibilité</option>
                    <option id="C10"value="Configurer un serveur web"> Configurer un serveur web</option>
                    <option id="C11"value=" Mettre en ligne l’application web"> Mettre en ligne l’application web</option>
                    <option id="C12"value="Assurer la disponibilité et le suivi de l’application web"> Assurer la disponibilité et le suivi de l’application web</option>
                    <option id="C13"value="Prévenir l’application web des risques classiques"> Prévenir l’application web des risques classiques</option>
                    <option id="C14"value="Mettre en pratique les méthodes de prévention contre les attaques">Mettre en pratique les méthodes de prévention contre les attaques</option>
                    <option id="C15" value="Faire de la veille"> Faire de la veille</option>
                    <option id="C16"value="Travailler en équipe">Travailler en équipe</option>
                    <option id="C17"value="Etre autonome et auto-apprendre">Etre autonome et auto-apprendre</option>
                    <option id="C18"value=" S'exprimer sur des éléments techniques auprès de ses collaborateurs"> S'exprimer sur des éléments techniques auprès de ses collaborateurs</option>
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
<<<<<<< HEAD

       
=======
     
>>>>>>> ebbce412a401cb40354650a0b4d9b7fa195df67f


        
   
   </section>