<?php

spl_autoload_register('chargerClasses');

function chargerClasses($classe)
{
    $fichier = $classe . '.php';

    try {
        if (file_exists(__DIR__ . '/Models/' . $fichier)) {
            require_once __DIR__ . '/Models/' . $fichier;
        } elseif (file_exists(__DIR__ . '/repositories/' . $fichier)) {
            require_once __DIR__ . '/repositories/' . $fichier;
        } else {
            throw new Error("La classe $classe n'a pas été trouvée.");
        }
    } catch (Error $error) {
        echo "Une erreur est survenue : " . $error->getMessage();
    }
}

require __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE) {
    $db = new Database;

    $db->initializeDB();
}
