<?php

require_once 'app/views/api.view.php';
require_once 'app/models/PeliculasModel.php';

class PeliculasApiController
{
    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new ApiView();
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }


    function getPelicula($params = []){
        $pelicula = $this->model->getPelicula($params[':ID']);
        if (!empty($pelicula)) {

            $this->view->response($pelicula, 200);
        } else {
            $this->view->response('La pelicula con el id=' . $params[':ID'] . ' no existe.', 404);
        }
    }

    function getPeliculasordenado($params = []){
        if (isset($_GET['ordenarPor']) || isset($_GET['orden'])) {
            if (isset($_GET['ordenarPor']) && isset($_GET['orden'])) {
                $peliculas = $this->model->getPeliculaordenado($_GET['ordenarPor'], $_GET['orden']);
                if (!empty($peliculas)) {
                    $this->view->response($peliculas);
                } else {
                    $this->view->response("No se han encontrado peliculas", 404);
                }
            } else {
                $this->view->response("Complete ambos campos", 400);
            }
        } else {
            $peliculas = $this->model->getPeliculaordenado();
            if (!empty($peliculas)) {
                $this->view->response($peliculas);
            }
        }
    }

    public function insertarPelicula($params = null)
    {
        $datosDelForm = $this->getData();
        if (empty($datosDelForm->Nombre) || empty($datosDelForm->Genero) || empty($datosDelForm->Descripcion) || empty($datosDelForm->Clasificacion_edad) || empty($datosDelForm->Director) || empty($datosDelForm->id_director)) {
            $this->view->response("Complete los datos", 400);
        } else if (is_numeric($datosDelForm->Clasificacion_edad) || is_numeric($datosDelForm->id_director)){
            $id = $this->model->insertarPelicula($datosDelForm->Nombre, $datosDelForm->Descripcion, $datosDelForm->Genero, $datosDelForm->Clasificacion_edad,$datosDelForm->Director, $datosDelForm->id_director);
            $this->view->response("Se creo una pelicula con el id = ".$id, 201);
        }else{
            $this->view->response("Los campos clasificacion_edad y id_director deben ser de tipo numerico", 404);
        }
    }


    function updatePelicula($params = null){
       $id = $params[':ID'];
       $peliQueVoyAEditar = $this->model->getPelicula($id);
       if (isset($peliQueVoyAEditar)) {
        $datosDelForm = $this->getData(); 
      
        $peliculaEditada = $this->model->editarPelicula($id,$datosDelForm->Nombre,
        $datosDelForm->Genero,
        $datosDelForm->Descripcion,
        $datosDelForm->Clasificacion_edad,
        $datosDelForm->Director,
        $datosDelForm->id_director);
        $peliculaEditada=$this->model->getPelicula($id);
        $this->view->response($peliculaEditada,200);
       }else {
        $this->view->response("No puede dejar estos campos sin completar", 400);
        }

    }


    
}
