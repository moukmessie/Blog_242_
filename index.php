<?php
/**
 * AFFICHE LA PAGE D'ACCUEIL
 */

require_once ('libraries/autoload.php');
$controller = new \controllers\Article();
$controller->index();