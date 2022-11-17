<?php


function autoLoading($className)
{
    if(file_exists($fichier = __DIR__ . '/' . $className . '.php'))
    {
        require $fichier;
    }
    // require_once(__DIR__ .$nomFichier . '.php');
}

// function chargementAuto2($nomFichier)
// {
//     require_once('../' . $nomFichier . '.php');
// }

spl_autoload_register('autoLoading');


