<?php
/**
 * AFFICHE LA PAGE D'ACCUEIL
 */

require_once ('libraries/controllers/Article.php');
$controller = new \controllers\Article();
$controller->index();