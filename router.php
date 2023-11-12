<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controller/PeliculasApiController.php';
    $router = new Router();
    /* api/tareas/" */
    #                 endpoint    verbo     controller           método
    $router->addRoute('peliculas','GET','PeliculasApiController','getPeliculas'); # TaskApiController->get($params)
    $router->addRoute('peliculas/:ID','GET','PeliculasApiController','getPelicula'); # TaskApiController->get($params)

    /* endpoint para probar: http://localhost/API/WEB2-API/api/peliculas/ */
   
    #del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


    ?>