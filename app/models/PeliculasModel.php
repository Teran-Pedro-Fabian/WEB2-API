<?php


class PeliculasModel{
  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=pelisplus;charset=utf8', 'root', '');
  }
  function getPeliculas(){

    $sentencia = $this->db->prepare('SELECT * FROM peliculas');
    $sentencia->execute();
    $peliculas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $peliculas;
  }

  function getPelicula($id){
    $sentencia = $this->db->prepare('SELECT * FROM peliculas WHERE ID = ?');
    $sentencia->execute([$id]);
    $pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
    return $pelicula;
  }


  function getPeliculaordenado($ordenarPor, $orden){
    $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $ordenarPor $orden");
    $query->execute();
    $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
    return $peliculas;
  }


  public function insertarPelicula($nombre, $Descripcion,$Genero, $Clasificacion_edad,$id_director){
      $query = $this->db->prepare("INSERT INTO peliculas (Nombre, Descripcion, Genero,Clasificacion_edad,Director,id_director) VALUES (? ,? , ?, ?, ?, ?)");
      $query->execute([$nombre, $Descripcion,$Genero, $Clasificacion_edad,0,$id_director]);
      return $this->db->lastInsertId();
  }





  public function editarPelicula($nombre, $Descripcion,$Genero, $Clasificacion_edad,$id_director, $id)
  {
      $query = $this->db->prepare("UPDATE peliculas SET Nombre = ?, Descripcion = ?, Genero = ?, Clasificacion_edad= ?,Director = ? , id_director = ? WHERE ID = ?");
      $query->execute([$nombre, $Descripcion,$Genero, $Clasificacion_edad,0,$id_director, $id]);
  }
}
