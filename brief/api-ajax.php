<?php

class Brief
{
   
    static $tabAssoReponse = [];   
    
    static function appliquer ()
    {
        Brief::$tabAssoReponse["request"] = $_REQUEST;
        
        $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
                
        if ($identifiantFormulaire == "create")
        {
            Brief::creer();
        }

        if ($identifiantFormulaire == "read")
        {
            Brief::lire();
        }

        if ($identifiantFormulaire == "update")
        {
            Brief::modifier();
        }

        if ($identifiantFormulaire == "delete")
        {
            Brief::supprimer();
        }

  
        echo json_encode(Brief::$tabAssoReponse, JSON_PRETTY_PRINT);
        
    }
    
    // UPDATE
    static function modifier ()
    {
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "titre"          name="titre"
            "id"            =>  $_REQUEST["id"] ?? "",          // IMPORTANT
            "username"         =>  $_REQUEST["username"] ?? "",
            "title"   =>  $_REQUEST["title"] ?? "",
            "level"        =>  $_REQUEST["level"] ?? "",
            
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        UPDATE competence
        SET
            username       = :username,
            title        = :title,
            level      = :level
        WHERE id = :id
CODESQL;
        
        $pdoStatement = Connexion::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
     
        Brief::lire();
    }

    // DELETE
    static function supprimer ()
    {
        $tabAssoColonneValeur = [
            "id"         =>  $_REQUEST["id"] ?? "",
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        DELETE FROM competence
        WHERE id = :id
CODESQL;
        
        $pdoStatement = Connexion::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        Brief::lire();
    }

    // CREATE
    static function creer ()
    {
        $tabAssoColonneValeur = [
            
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
        
        $pdoStatement = Connexion::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        Brief::lire();

    }

    // READ
    static function lire ()
    {
        $tabAssoColonneValeur = [];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
    SELECT * FROM competence
    ORDER BY id DESC
    
CODESQL;
    
        $pdoStatement = Connexion::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        $tabAssoLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
       
        Brief::$tabAssoReponse["tableauArticle"] = $tabAssoLigne;

    }
}


class Connexion
{
    static function envoyerRequeteSQL ($requetePrepareeSQL, $tabAssoColonneValeur)
    {
        
        $pdo = new PDO("mysql:host=localhost;dbname=brief;charset=utf8", "root", "");

        $pdoStatement = $pdo->prepare($requetePrepareeSQL);
        $pdoStatement->execute($tabAssoColonneValeur);

        return $pdoStatement;
    }
}



Brief::appliquer();