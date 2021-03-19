<?php

/**
 *  AFFICHE UN ARTICLE ET SES COMMENTAIRES
 *
 *  récupération du paramètre "id" qui sera présent en GET et vérifier son existence
 * on cas de non existence message d'erreur
 *
 * Sinon, connexion à la base de données et récupération des commentaires du plus ancien au plus récent (SELECT * FROM comments WHERE article_id = ?)
 *
 * puis afficher l'article ainsi que ses commentaires
 */

require_once ("libraries/controllers/Article.php");
$controller =new \controllers\Article();
$controller->show();