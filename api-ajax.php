<?php

// ICI ON VA RECEVOIR LES INFOS DU NAVIGATEUR
// ENVOYEES PAR AJAX

// EN PHP
// ON DES TABLEAUX ASSOCIATIFS (CLE/VALEUR)
// EN JS
// ON A DES OBJETS (PROPRIETE/VALEUR)

// PROGRAMMATION FONCTIONNELLE
// => JE RANGE MON CODE DANS DES FONCTIONS

// PROGRAMMATION PAR CLASSE  (static) (POO SIMPLIFIEE...)
// => JE RANGE MES FONCTIONS DANS DES CLASSES
class Crudite
{
    // PROPRIETE DE CLASSE (static)
    static $tabAssoReponse = [];

    // METHODE DE CLASSE (static)
    static function cruder ()
    {
        // DEBUG
        // ON VA RENVOYER CE QU'ON RECOIT...
        Crudite::$tabAssoReponse["request"] = $_REQUEST;
        
        $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
        
        
        if ($identifiantFormulaire == "create")
        {
            Crudite::creer();
        }

        if ($identifiantFormulaire == "read")
        {
            // EN PROGRAMMATION PAR CLASSE
            // POUR APPELER UNE METHODE
            // ON PRECISE D'ABORD LA CLASSE ET ENSUITE LA METHODE A APPELER
            // Classe::methode()
            Crudite::lire();
        }
        

        if ($identifiantFormulaire == "update")
        {
            Crudite::modifier();
        }

        if ($identifiantFormulaire == "delete")
        {
            Crudite::supprimer();
        }

        // ON VA FOURNIR DU JSON
        echo json_encode(Crudite::$tabAssoReponse, JSON_PRETTY_PRINT);
        
    }
    
    // UPDATE
    static function modifier ()
    {
        // TODO: AJOUTER SECURITE... 

        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL todo
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "username"          name="username"
            "id"            =>  $_REQUEST["id"] ?? "",          // IMPORTANT
            "username"         =>  $_REQUEST["username"] ?? "",
            "title"   =>  $_REQUEST["title"] ?? "",
            "level"        =>  $_REQUEST["level"] ?? "",
           
        ];
    
        // IL FAUDRA GERER A PART LE CAS DE L'UPLOAD QUI DEVIENT OPTIONNEL
        // ... 
        
        $requetePrepareeSQL = 
<<<CODESQL
    
        UPDATE competence
        SET
        username       = :username,
        title = :title,
        level      = :level,
          
        WHERE id = :id
CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE CREATE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC LA TACHE QUI VIENT D'ETRE CREE... 
        Crudite::lire();
    }

    // DELETE
    static function supprimer ()
    {
        // TODO: AJOUTER SECURITE... 

        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL todo
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "titre"          name="titre"
            "id"         =>  $_REQUEST["id"] ?? "",
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        DELETE FROM competence
        WHERE id = :id

CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE DELETE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC LA TACHE QUI VIENT D'ETRE CREE... 
        Crudite::lire();
    }

    // CREATE
    static function creer ()
    {
        // TODO: AJOUTER SECURITE... 

        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL todo
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "username"          name="username"
            "username"         =>  $_REQUEST["username"] ?? "",
            "title"   =>  $_REQUEST["title"] ?? "",
            "level"        =>  $_REQUEST["level"] ?? "",
            
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        INSERT INTO `competence` 
        (`id`, `username`, `title`, `level`) 
        VALUES 
        (NULL, :username, :title, :level );
    
CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE CREATE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC LA TACHE QUI VIENT D'ETRE CREE... 
        Crudite::lire();

    }

    // READ
    static function lire ()
    {
        // ON VA AJOUTER LE CODE PHP
        // POUR FAIRE UN READ
        // POUR ENVOYER LA LISTE DES TACHES AU NAVIGATEUR
        $tabAssoColonneValeur = [];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
    SELECT * FROM competence
    ORDER BY id DESC
    
CODESQL;
    
        // ON PASSE PAR LA METHODE envoyerRequeteSQL QUI EST DANS LA CLASSE Model
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        // ON RECUPERE LES LIGNES SQL EN PHP DANS UN TABLEAU ASSOCIATIF
        $tabAssoLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        // JE L'AJOUTE DANS LE TABLEAU DE REPONSE A ENVOYER AU NAVIGATEUR
        Crudite::$tabAssoReponse["tableauArticle"] = $tabAssoLigne;

    }
}


class Model
{
    // METHODE STATIC DE CLASSE
    static function envoyerRequeteSQL ($requetePrepareeSQL, $tabAssoColonneValeur)
    {
        // POUR AJOUTER LA LIGNE DANS LA TABALE SQL
        // ETAPE1: SE CONNECTER A LA BASE DE DONNEES
        // https://www.php.net/manual/fr/pdo.construct.php
        $pdo = new PDO("mysql:host=localhost;dbname=brief;charset=utf8", "root", "");
    
        // SECURITE: POUR SE PROTEGER CONTRE LES INJECTIONS SQL
        // POUR ENVOYER LA REQUETE
        // ON SEPARE LES INFOS DE LA REQUETE SQL PREPAREE
        $pdoStatement = $pdo->prepare($requetePrepareeSQL);
        $pdoStatement->execute($tabAssoColonneValeur);

        // DEBUG: A ACTIVER SEULEMENT EN CAS DE PROBLEME
        // https://www.php.net/manual/fr/pdostatement.debugdumpparams.php
        // $pdoStatement->debugDumpParams();

        // POUR POUVOIR FAIRE LE READ...
        return $pdoStatement;
    }
}


// POUR ACTIVER MON CODE
// => J'APPELLE LA METHODE STATIC DE LA CLASSE
Crudite::cruder();