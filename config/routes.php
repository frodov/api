<?php

$router = new Phalcon\Mvc\Router();


/**
 * This route is for consult, add and delete vehicles
 */
$router->add(
    '/service/{mode}/:params',
    [
        'controller' => 'Vehicle',
        'action' => 'process',
        'params' => 2
    ]
);

return $router;
