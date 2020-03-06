# Framework PHP

Un super méga framework top moumoute qu'il est bien à utiliser.

## TODO

- copier `app/config.ini.dist` en `app/config.ini`

- configurer `app/config.ini` pour le projet
  ; fichier de configuration
; ici, principalement, on va avoir la config pour se connecter à la DB
; => copier-coller ce fichier dans un fichier config.ini
: => et donner des valeurs aux configurations suivantes

DB_HOST=localhost
DB_NAME=okanban
DB_USERNAME=okanban
DB_PASSWORD=okanban

; namespace des Controllers
NamespaceForThisProject
CONTROLLERS_NAMESPACE=\NamespaceForThisProject\Controllers\

- remplacer le namespace "NamespaceForThisProject" par le namespace du projet dans les classes et dans `composer.json`
- changer les routes
- pour le reste, débrouille-tio, c'est pas si compliqué
