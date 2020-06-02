<section>

<section>
            <h2>FORMULAIRE DE CREATION (CREATE)</h2>
            <form class="ajax" action="" method="POST">
                <input type="text" name="username" required placeholder="username">
             <!--    <input type="text" name="title" required placeholder="title">  -->
              

       <select name="title" class="deroulant">
            <option value="compt1">compt1</option>
            <option value="compt2">compt2</option>
            <option value="compt3">compt3</option>
            <option value="compt4">compt4</option>
            <option value="compt5">compt5</option>
            <option value="compt6">compt6</option>
            <option value="compt7">compt7</option>
            <option value="compt8">compt8</option>
            <option value="compt9">compt9</option>
            <option value="compt10">compt10</option>

        </select>
        
                
                
                <label>
                    <input type="radio" name="level" value="imiter" required placeholder="level">
                    <span>imiter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="adapter" required placeholder="level">
                    <span>adapter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="transposer" required placeholder="level">
                    <span>transposer</span>
                </label>

                
                <button type="submit">CREER UNE TACHE</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="create">
            </form>
        </section>
        <section>
            <h2>AFFICHAGE DES TACHES (READ)</h2>
            <!-- FORMULAIRE POUR RAFRAICHIR LA LISTE DES TACHES -->
            <form class="ajax read" action="" method="POST">
                <button type="submit">RAFRAICHIR LA LISTE DES TACHES</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="read">
            </form>
            <div class="listTodo">
            
            </div>
   
         </section>



        <section>
            <h2>FORMULAIRE DE MODIFICATION (UPDATE)</h2>
            <form class="ajax update" action="" method="POST">
                <input type="text" name="username" required placeholder="username">
                 <!--    <input type="text" name="title" required placeholder="title">  -->
               
         <select name="title" class="deroulant">
            <option value="compt1">compt1</option>
            <option value="compt2">compt2</option>
            <option value="compt3">compt3</option>
            <option value="compt4">compt4</option>
            <option value="compt5">compt5</option>
            <option value="compt6">compt6</option>
            <option value="compt7">compt7</option>
            <option value="compt8">compt8</option>
            <option value="compt9">compt9</option>
            <option value="compt10">compt10</option>
         </select>
         
               
                
                <label>
                    <input type="radio" name="level" value="imiter" required placeholder="level">
                    <span>imiter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="adapter" required placeholder="level">
                    <span>adapter</span>
                </label>
                <label>
                    <input type="radio" name="level" value="transposer" required placeholder="level">
                    <span>transposer</span>
                </label>

              

                <!-- IMPORTANT NE PAS OUBLIER L'ID DE LA LIGNE -->
                <input type="hidden" name="id" required placeholder="id de la ligne">

                <button type="submit">MODIFIER UNE TACHE</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="update">
            </form>
        </section>

        <section class="cache">
            <h2>FORMULAIRE DE DELETE</h2>
            <form class="ajax delete" action="">
                <input type="number" name="id" required placeholder="id de la ligne">
                <button type="submit">SUPPRIMER LA LIGNE</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>



        
   
   </section>