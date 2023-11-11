<?php
    require_once 'libs/router.php';
    require_once './app/controllers/jugadores.controller.php';
    require_once './app/controllers/clubes.controller.php';

    $router = new Router();

    #wine             endpoint      verbo     controller               método
    $router->addRoute('jugadores',  'GET',   'JugadoresController',   'get');
    $router->addRoute('jugadores/:ID',  'GET',   'JugadoresController',   'get');
    $router->addRoute('jugadores/:ID',  'DELETE',   'JugadoresController',   'delete');
    $router->addRoute('jugadores',  'POST',   'JugadoresController',   'create');
    $router->addRoute('jugadores/:ID',  'PUT',   'JugadoresController',   'update');




     #wine             endpoint      verbo     controller               método
     $router->addRoute('clubes',  'GET',   'ClubesController',   'get');
     $router->addRoute('clubes/:ID',  'GET',   'ClubesController',   'get');
     $router->addRoute('clubes/:ID',  'DELETE',   'ClubesController',   'delete');
     $router->addRoute('clubes',  'POST',   'ClubesController',   'create');
     $router->addRoute('clubes/:ID',  'PUT',   'ClubesController',   'update');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);