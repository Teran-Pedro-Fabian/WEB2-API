# Endpoints basicos del servicio:

## GET (get general, todas las peliculas de la tabla) 

__Endpoint__

<p> http://localhost/WEB2-API/peliculas/ <p>



## GET (get espesifico, trae una pelicula por su id) 

__Endpoint__

<p> http://localhost/WEB2-API/peliculas/:ID </p>


## GET (get ordenado, trae una pelicula por un orden pedido por el usuario) 

__Endpoint__

<p> http://localhost/WEB2-API/peliculas/:ID </p>


## ## POST (Informacion (pelicula) a insertarse en formato JSON, validaciones por si se encuentra incompleta o erronea hechas, si no cumplen dichas validaciones devuelvo un status 400 con un mensaje)

__Endpoint__

<p> http://localhost/WEB2-API/peliculas/ </p>

__Ejemplo__
<p>Formato JSON, via raw:</p>
<p>
{
    "Nombre": "nombre_de_la_pelicula",
    "Descripcion": "descripcion_de_la_pelicula",
    "Genero": "Genero_de_la_pelicula",
    "Clasificacion_edad": "edad_para_la_que_se_prihibe_esta_pelicula", 
    "Director": "Director_que_dirijio_la_pelicula", 
    "id_director": "Clabe_foranea_del_director" 
}
</p>

<p>
    Datos a tener a en cuenta para un POST.

    Nombre:campo tipo string y obligatorio.
    Descripcion:campo tipo String y obligatorio.
    Genero:campo tipo string y obligatorio.
    Clasificacion_edad:campo tipo integer y  obligatorio.
    id_director:campo tipo number y obligatorio.
</p>


## PUT (Se coloca el ID de la pelicula a editar, si la informacion es correcta devuelvo un status 200, en caso de dejar informacion sin completar para la edicion de la pelicula devuelvo un status 400)

__Endpoint__

<p> http://localhost/WEB2-API/peliculas/:ID </p>

__Ejemplo__

<p> http://localhost/WEB2-API/peliculas/2 </p>

__Formato JSON, via raw:__
<p> PEGAR OBJETO
{
    "Nombre": "Machete",
    "Descripcion": "hombre con machete",
    "Genero": "accion",
    "Clasificacion_edad": "15", 
    "Director": "stiven", 
    "id_director": "7" 
}
</p>


--------------------------------------------------------------------------------------------------------------------

# Desde ya espero que les sirva este documento, gracias por leer!!