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

    function getPeliculasordenado($params){
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
    }

    public function insertarPelicula($params = null)
    {
        $datosDelForm = $this->getData();
        if (empty($datosDelForm->nombre) || empty($datosDelForm->genero) || empty($datosDelForm->descripcion)) {
            $this->view->response("Complete los datos", 400);
        } else if (is_numeric($datosDelForm->clasificacion_edad) || is_numeric($datosDelForm->id_director)){
            $id = $this->model->insertarPelicula($datosDelForm->nombre, $datosDelForm->descripcion, $datosDelForm->genero, $datosDelForm->clasificacion_edad, $datosDelForm->id_director);
            $this->view->response($id, 201);
        }else{
            $this->view->response("Los campos clasificacion_edad y id_director deben ser de tipo numerico", 404);
        }
    }


    function updatePelicula($nombre, $descripcion, $genero, $clasificacion_edad, $director, $id){
        
        if(!empty($nombre)&&!empty($descripcion)&&!empty($genero)&&!empty($clasificacion_edad)&&!empty($director)){
            $this-> model -> editarPelicula($nombre, $descripcion, $genero, $clasificacion_edad, $director, $id);
            
        }else{
            $error = "Complete los datos";
            $this-> view -> response($error,400);
        }
    }


    
}
