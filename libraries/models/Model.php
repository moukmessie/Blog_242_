<?php
require_once ('libraries/database.php');

class Model
{
    protected $pdo;

    /**
     * Article constructor.
     * @param $pdo
     */
    public function __construct()
    {
        $this->pdo = getPdo();
    }


}