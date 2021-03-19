<?php


class Http
{
    /**
     * redirection vers l'url
     * @param string $url
     */
  public static function redirection (string $url):void{
        header("Location: $url");
        exit();
    }

}