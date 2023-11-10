<?php

require_once 'app/views/api.view.php';
require_once 'app/models/PeliculasModel.php';

class PeliculasApiController
{
    private $model;
    private $view;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new ApiView();
    }

    function getPeliculas($params = []){
        /* api/peliculas/1 */
        $peliculas = $this->model->getPeliculas();
        $this->view->response($peliculas, 200);
    }

    function getPelicula($params = []){
        $pelicula = $this->model->getPelicula($params[':ID']);
        if (!empty($pelicula)) {

            $this->view->response($pelicula, 200);
        } else {
            $this->view->response('La pelicula con el id=' . $params[':ID'] . ' no existe.', 404);
        }
    }
}
