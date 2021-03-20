<?php


class Renderer
{
    /***
     * Affiche un template html en injectant les variables
     * @param string $path
     * @param array $variabbles
     */
   public static function render(string $path, array  $variabbles=[]): void{
        extract($variabbles, EXTR_SKIP);
        ob_start();
        require ('templates/'. $path .'.php');
        $pageContent = ob_get_clean();

        require ('templates/layout.php');
    }




}