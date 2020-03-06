<?php

// On inclut les dépendances fournies par Composer
require __DIR__.'/../vendor/autoload.php';

// On crée une instance de la classe Application
// FQCN (Fully Qualified Class Name) de la classe Application
$app = new \App\Application(); 
// On lance l'application
$app->run();
