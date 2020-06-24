<?php

namespace App\Http\Controllers;
use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    //accion para mostrar el catalogo de peliculas 
    public function index(){
        //seleccionar todas las peliculas 
        $peliculas = Pelicula::paginate(5);
        return view('peliculas.index')->with("peliculas",$peliculas);
    }
}
