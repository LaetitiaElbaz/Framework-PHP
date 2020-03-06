<?php

namespace App;

class Application {
    /**
     * @var AltoRouter
     */
    private $router;
    /**
     * @var string
     */
    private $controllersNamespace;

    /**
     * Constructeur de la classe
     * On y place le code pour configurer l'application
     */
    public function __construct() {
        // On charge la conf
        $configData = parse_ini_file(__DIR__.'/config.ini');
        // On récupère le namespace des Controllers
        $this->controllersNamespace = $configData['CONTROLLERS_NAMESPACE'];
        // On crée la variable $controllersNamespace pour la rendre dispoible dans routes.php
        $controllersNamespace = $this->controllersNamespace;

        // instancier l'objet AltoRouter
        $this->router = new \AltoRouter();

        // on fournit à AltoRouter la partie de l'URL à ne pas prendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
        // on vérifie que BASE_URI est fournie avant de faire le setBasePath()
        if (!empty($_SERVER['BASE_URI'])) {
            $this->router->setBasePath($_SERVER['BASE_URI']);
        }

        // On crée un tableau vide, qui va contenir toutes les routes
        $routes = [];

        // On inclut le fichier "personnaliable" des routes
        include __DIR__.'/routes.php';

        // On ajoute toutes les routes renseignées dans le fichier routes.php
        $this->router->addRoutes($routes);
    }

    /**
     * Méthode permettant de lancer l'application
     * c'est-à-dire exécuter les instructions pour livrer la page courante
     */
    public function run() {
        // Si AltoRouter trouve une route pour l'URL actuelle
        $match = $this->router->match();

        // Instancier le dispatcher, lui donner la variable $match et une action fallback
        $dispatcher = new \Dispatcher(
            $match,
            $this->controllersNamespace.'ErrorController::err404'
        );
        // Lancer la méthode dispatch() 
        $dispatcher->dispatch();
    }
}