<?php

require_once('libraries/models/Model.php');

class Article extends Model
{



    /**
     * Retourne la liste des articles classés par date création
     * @return array
     */
    public function findAll(){

        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        // extraction des données réelles
        $articles = $resultats->fetchAll();
    }


    /**
     * recherche d'un article
     * @param string $id
     * @return array returne un l'article
     */

    public function find(string $id){

        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

        // exécution de la requête en précisant le paramètre :article_id
        $query->execute(['article_id' => $id]);

        // extraction des données réelles de l'article
        $article = $query->fetch();

        return $article;
    }

    /**
     * supression d'un article
     * @param int $article_id
     * @return array
     */
    public function delete(int $id): void{

        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);

    }


}