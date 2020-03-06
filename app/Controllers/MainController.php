<?php

namespace NamespaceForThisProject\Controllers;

// Tous les Controllers doivent hériter de la classe CoreController
class MainController extends \App\Controllers\CoreController {
    /**
     * Méthode pour la page d'accueil
     * 
     * URL : /
     * HTTP method : GET
     */
    public function home() {
        $this->show('home');
    }
}