<?php

require_once('libraries/models/Model.php');

class Comment extends Model
{


    /**
     * recheche de la liste des commentaires
     * @param int $article_id
     * @return array retourne la liste
     */

    public function findAllWithArticle(int $article_id): array{

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    /**
     * retourne un commentaire
     * @param int $id
     * @return mixed
     */

    public function find(int $id){


        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);

        $commentaire = $query->fetch();

        return $commentaire;
    }

    /***
     * suppression d'un commentaire
     * @param int $id
     */

    public function delete(int $id):void{



        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    /**
     * insertion d'un commentaire
     */
    public function insert(string $author, string $content, int $article_id):void{


        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}