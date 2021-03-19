<?php

/**
 * ON CHERCHE A SUPPRIMER L'ARTICLE DONT L'ID EST PASSE EN GET
 *
 * bien s'assurer qu'un paramètre "id" est bien passé en GET, puis que cet article existe
 * Ensuite, supprimer l'article et rediriger vers la page d'accueil
 */
require_once ('libraries/autoload.php');
$controller =new \controllers\Article();
$controller->delete();
