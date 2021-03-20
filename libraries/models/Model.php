<?php
namespace models;

abstract class Model
{
    protected  $pdo;
    protected string $table;
    /**
     * Article constructor.
     *
     */
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    /**
     * recherche d'un article
     * @param string $id
     * @return array returne un l'article
     */
    public function find(string $id){
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        // exécution de la requête en précisant le paramètre :article_id
        $query->execute(['id' => $id]);

        // extraction des données réelles de l'article
        return $query->fetch();
    }

    /***
     * suppression
     * @param int $id
     */
    public function delete(int $id):void{
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * Retourne la liste des articles classés par date création
     * @param string|null $order
     * @return array
     */
    public function findAll($order =""):array{

        $sql = "SELECT * FROM {$this->table }";

        if($order){
            $sql .= " ORDER BY  $order";

        }

        $resultats = $this->pdo->query($sql);
        // extraction des données réelles
        return $resultats->fetchAll();
    }

}