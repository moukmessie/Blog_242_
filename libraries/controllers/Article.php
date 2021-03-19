<?php
namespace controllers;

use models\Comment;






class Article extends Controller
{
    protected  $modelName = \models\Article::class;


    public function index(){
        //montre la liste des article



        /**
         * 1. Récupération des articles
         */

        $articles = $this->model->findAll("created_at DESC");

        /**
         * 2. Affichage
         */
        $pageTitle = "Accueil";

        \Renderer::render('articles/index',compact('pageTitle','articles'));

    }
    public function show(){
        //montrer un article


        $commentModel = new \models\Comment();

        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
// On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

// S'il y'en a un et que c'est un nombre entier
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

// On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Veillez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * Récupération de l'article
         *
         */

// On fouille le résultat pour en extraire les données réelles de l'article
        $article = $this->model->find($article_id);

        /**
         *  Récupération des commentaires de l'article en question
         */
        $commentaires= $commentModel->findAllWithArticle($article_id);

        /**
         * 5. On affiche
         */
        $pageTitle = $article['title'];

       \Renderer:: render('articles/show', compact('pageTitle','article','commentaires','article_id'));

    }

    public function delete(){
        //suppression d'un article


        /**
         * 1. vérification que le GET possède bien un paramètre "id" et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Veillez préciser l'id de l'article !");
        }

        $id = $_GET['id'];

        /**
         * 2. Vérification que l'article existe
         */

        $article= $this->model->find($id);

        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 3. Suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 4. Redirection vers la page d'accueil
         */
       \Http::redirection(index.php);
    }

}