<?php
function render(string $path, array  $variabbles=[]){
    extract($variabbles, EXTR_SKIP);
     ob_start();
     require ('templates/'.$path.'.php');
     $pageContent = ob_get_clean();

     require ('templates/layout.php');
}

function redirection (string $url):void{
    header("Location: $url");
    exit();
}
