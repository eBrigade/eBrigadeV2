<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/userMaterials/view/:user_id/:material_id',['controller' => 'UserMaterials','action' => 'view'],[
        'pass' => ['user_id','material_id'],
        'user_id' => '[0-9]+',
        'material_id' => '[0-9]+'
    ]);
    $routes->connect('/userMaterials/edit/:user_id/:material_id',['controller' => 'UserMaterials','action' => 'edit'],[
        'pass' => ['user_id','material_id'],
        'user_id' => '[0-9]+',
        'material_id' => '[0-9]+'
    ]);
    $routes->connect('/skills-users/edit/:skill_id/:user_id',['controller' => 'SkillsUsers','action' => 'edit'],[
        'pass' => ['skill_id','user_id'],
        'skill_id' => '[0-9]+',
        'user_id' => '[0-9]+'
    ]);
    $routes->connect('/deconnexion',['controller' => 'Users','action' => 'logout']);
 //   __________________________________________________________________Vue des Casernes
    $routes->connect(
        '/casernes/liste',
        ['controller' => 'Barracks', 'action' => 'index']
    );
    $routes->connect(
        '/casernes/fiche',
        ['controller' => 'Barracks', 'action' => 'annuaire']
    );
    $routes->connect(
        '/casernes/arborescence',
        ['controller' => 'Barracks', 'action' => 'tree']
    );
    $routes->connect(
        '/casernes/carte',
        ['controller' => 'Barracks', 'action' => 'carte']
    );
    $routes->connect(
        '/caserne/ajouter',
        ['controller' => 'Barracks', 'action' => 'add']
    );

    $routes->connect(
        '/caserne/:id-:name',
        ['controller' => 'Barracks', 'action' => 'view'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/caserne/:id-:name/edition',
        ['controller' => 'Barracks', 'action' => 'edit'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
//   __________________________________________________________________ Gestion des casernes
    $routes->connect(
        '/gestion/caserne/:id-:name/personnel',
        ['controller' => 'Barracks', 'action' => 'gestionuser'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/gestion/caserne/:id-:name/evenements',
        ['controller' => 'Barracks', 'action' => 'gestionevent'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/gestion/caserne/:id-:name/vehicules',
        ['controller' => 'Barracks', 'action' => 'gestionvehi'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/gestion/caserne/:id-:name/materiel',
        ['controller' => 'Barracks', 'action' => 'gestionmat'],
        [
            'pass' => ['id','name'],
            'id' => '[0-9]+',
        ]
    );
    $routes->fallbacks(DashedRoute::class);
});


//   __________________________________________________________________ Calendrier des disponibilités
Router::prefix('Calendrier',  function($routes) {
    $routes->connect(
        '/disponibilite',
        ['controller' => 'Calendar', 'action' => 'add']
    );
    $routes->connect(
        '/sauvegarder',
        ['controller' => 'Calendar', 'action' => 'save']
    );
    $routes->fallbacks(DashedRoute::class);
});
//   __________________________________________________________________ Calendrier des événements
Router::prefix('Calendrier',  function($routes) {
    $routes->connect(
        '/evenements',
        ['controller' => 'Calendar', 'action' => 'index']
    );
    $routes->fallbacks(DashedRoute::class);
});
//   __________________________________________________________________ Messagerie
Router::prefix('Messagerie',  function($routes) {
    $routes->connect(
        '/boite-de-reception',
        ['controller' => 'Messages', 'action' => 'index']
    );
    $routes->connect(
        '/ecrire-un-message/*',
        ['controller' => 'Messages', 'action' => 'send' ]
    );
    $routes->connect(
        '/boite-d-envoi',
        ['controller' => 'Messages', 'action' => 'dispatch']
    );
    $routes->connect(
        '/boite-d-envoi',
        ['controller' => 'Messages', 'action' => 'dispatch']
    );
    $routes->connect(
        '/boite-de-reception/:id-:subject',
        ['controller' => 'Messages', 'action' => 'view'],
        [
            'pass' => ['id','subject'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/boite-d-envoi/:id-:subject',
        ['controller' => 'Messages', 'action' => 'sendview'],
        [
            'pass' => ['id','subject'],
            'id' => '[0-9]+',
        ]
    );
    $routes->fallbacks(DashedRoute::class);
});

//   __________________________________________________________________ Plugins
Plugin::routes();
Router::extensions('json', 'xml');
