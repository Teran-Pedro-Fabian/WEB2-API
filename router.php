<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controller/PeliculasApiController.php';
    $router = new Router();
    
    #                 endpoint    verbo     controller           método
  /*   $router->addRoute('peliculas','GET','PeliculasApiController','getPeliculas');  */
    $router->addRoute('peliculas/:ID','GET','PeliculasApiController','getPelicula'); 
    $router->addRoute('peliculas', 'GET','PeliculasApiController','getPeliculasordenado'); 
    $router ->addRoute('peliculas','POST', 'PeliculasApiController','insertarPelicula');
    $router ->addRoute('peliculas/:ID','PUT', 'PeliculasApiController','updatePelicula');
    
    
    
    
    
    #del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


    ?>