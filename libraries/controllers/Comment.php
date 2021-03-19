<?php


namespace controllers;

class Comment extends Controller
{
    protected  $modelName = \models\Comment::class;

    public function insert(){
        //insert un commentaire

        $articleModel = new \models\Article();


        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
// On commence par l'author
        $author = null;
        if (!empty($_POST['author'])) {
            $author = htmlspecialchars($_POST['author']);
        }

// Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);
        }

// Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

        /** Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
         */

        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $article=$articleModel->find($article_id);

// Si rien n'a été trouvé, on fait une erreur
        if (!$article){
            die("Zut ! L'article $article_id n'existe pas !");
        }

        /**
         * 2. Insertion du commentaire
         */
        $this->model->insert($author,$content,$article_id);

        /**
         * 3. Redirection vers l'article en question :
         * */
       \Http::redirection('article.php?id=' . $article_id);

    }

    public function delete()
    {
        //suppression d'un commentaire

        /**
         * 1. Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Veillez préciser le paramètre id !");
        }

        $id = $_GET['id'];

        /**
         * 2. Vérification de l'existence du commentaire
         * dans la base de données
         */

        $commentaire=$this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 3. Suppression si celui-ci a été trouvé
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */

        $article_id = $commentaire['article_id'];

        $this->model->delete($id);

        /**
         * 4. Redirection vers l'article concerné
         */
      \Http::redirection("article.php?id=" . $article_id );

    }
}