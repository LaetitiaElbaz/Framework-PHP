<?php

namespace NamespaceForThisProject\Controllers;

class ErrorController extends \App\Controllers\CoreController {
    public function err404() {
        // On envoie l'entete 404 Not found
        header('HTTP/1.0 404 Not Found');

        $this->show('404');
    }
}