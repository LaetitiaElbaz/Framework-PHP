<?php

namespace App\Controllers;

abstract class CoreController {
    /**
     * Méthode permettant d'afficher
     */
    protected function show($viewName, $viewData = [])
    {
        // on définit cette variable pour que nos vues puissent mettre le lien de la page courante en avant
        $viewData['currentPage'] = $viewName;
        
        // déclare des variables dont le nom correspond aux clés du tableau passé en argument
        extract($viewData);

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
    
    /**
    * Méthode permettant d'afficher/retourner un JSON à l'appel Ajax effectué
    *
    * @param mixed $data
    */
    protected function showJson($data)
    {
        // Autorise l'accès à la ressource depuis n'importe quel autre domaine
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        // Dit au navigateur que la réponse est au format JSON
        header('Content-Type: application/json');
        // La réponse en JSON est affichée
        echo json_encode($data);
    }
}