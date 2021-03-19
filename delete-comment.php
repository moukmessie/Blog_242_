<?php

/**
 * ON CHERCHE A SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 *
 * verification que le paramètre "id" est bien présent en GET et qu'il correspond bien à un commentaire existant
 * Puis  suppression
 */
require_once ('libraries/controllers/Comment.php');
$controller = new \controllers\Comment();
$controller->delete();