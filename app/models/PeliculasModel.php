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
}
