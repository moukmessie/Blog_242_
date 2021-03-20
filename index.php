<?php
/**
 * AFFICHE LA PAGE D'ACCUEIL
 */

require_once ('libraries/autoload.php');

//Application::process();
$controller = new \controllers\Article();
$controller->index();