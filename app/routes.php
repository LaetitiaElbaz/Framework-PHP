<?php

// fichier contenant toutes les routes du projet ($routes)
$routes[] = [
   'GET',
   '/',
   [
     'controller' => $controllersNamespace.'MainController',
     'method' => 'home',
   ],
   'main-home'
];
