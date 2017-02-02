<?php

namespace  App\Data;

use \PDOException;
use \PDO;
/**
 * Classe Database
 * Permet une abstraction des appels a la base de donnees
 */
class Database
{
    private $bdd;

    private $error;

    private $requete;

    /**
     * Database constructor.
     * @param $container
     */
    public function __construct($container){
        $base = $container['driver'] . ':host='
            . $container['host'] . ';dbname='
            . $container['database']. ';charset='
            . $container['charset'];
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_PERSISTENT    => false,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        try{
            $this->bdd = new PDO($base, $container['username'], $container['password'], $options);
        }
        catch (PDOException $exception){
            $this->error = $exception->getMessage();
        }
    }

    /**
     * Prepare une requete
     * @param $requete
     */
    public function query($requete){
        if($this->bdd != null)
            $this->requete = $this->bdd->prepare($requete);
    }


    /**
     * Associe une valeur dans la requete
     * @param $valeur
     * @param $param
     */
    public function bindParam($param, $valeur){
        $type = "";
        if(is_int($valeur))
            $type = PDO::PARAM_INT;
        if(is_string($valeur))
            $type = PDO::PARAM_STR;
        if(is_null($valeur))
            $type = PDO::PARAM_NULL;
        if(is_bool($valeur))
            $type = PDO::PARAM_BOOL;
        $this->requete->bindValue($param, $valeur, $type);
    }

    /**
     *  Execute la requete
     */
    public function exec(){
        if($this->bdd != null)
            $this->requete->execute();
    }

    /**
     * @return mixed
     */
    public function fetchAll(){
        if($this->bdd != null){
            $this->exec();
            return $this->requete->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    /**
     * @return mixed
     */
    public function fetch(){
        if($this->bdd != null){
            $this->exec();
            return $this->requete->fetch(PDO::FETCH_ASSOC);
        }
    }

    /**
     * @return string
     */
    public function lastID(){
        return $this->bdd->lastInsertId();
    }
}