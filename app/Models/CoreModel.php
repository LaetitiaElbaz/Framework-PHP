<?php

namespace App\Models;

use PDO;
use App\Utils\Database;

/**
 * modèle de base : c'est classe mère dont vont hériter TOUS les models
 * cette classe n'est pas destinée à être instanciée, à créer des objets, mais seulement à être héritée/étendue
 */
abstract class CoreModel {
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;

    // On force l'existence d'une méthode find dans chaque enfant
    abstract public static function find(int $id);
    // On force l'existence d'une méthode findAll dans chaque enfant
    abstract public static function findAll();
    // On force l'existence d'une méthode insert dans chaque enfant
    abstract protected function insert();
    // On force l'existence d'une méthode update dans chaque enfant
    abstract protected function update();
    // On force l'existence d'une méthode delete dans chaque enfant
    abstract public function delete();

    /**
     * Méthode permettant de sauvegarder le Model en DB
     * elle "remplace" insert & update
     * 
     * @return boolean
     */
    public function save() {
        // Si l'id n'est pas vide
        if ($this->id > 0) {
            // Alors, on modifie, update
            return $this->update();
        }
        // Sinon
        else {
            // On ajoute, insert
            return $this->insert();
        }
    }

    /**
     * Méthode générique permettant de récupérer un Model "enfant"
     * 
     * @param int $id
     * @param string $tableName
     * @param string FQCN
     * @return Object|false
     */
    protected static function findModel(int $id, string $tableName, string $fqcn) {
        // requete SQL
        $sql = "
            SELECT *
            FROM `" . $tableName . "`
            WHERE `id` = :id
        ";

        // On prépare notre requete car une donnée provient de l'extérieur (inconnu)
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Je donne une valeur à chaque jeton/token/placeholder
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        // J'execute la requête
        $pdoStatement->execute();

        // on récupère 1 résultat sous forme d'objet
        $result = $pdoStatement->fetchObject($fqcn);

        return $result;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}