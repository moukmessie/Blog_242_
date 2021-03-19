<?php

namespace models;

class Comment extends Model
{
    protected string $table = "comments";
    /**
     * recheche de la liste des commentaires
     * @param int $article_id
     * @return array retourne la liste
     */
    public function findAllWithArticle(int $article_id): array{

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        return $query->fetchAll();
    }

    /**
     * insertion d'un commentaire
     */
    public function insert(string $author, string $content, int $article_id):void{

        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}