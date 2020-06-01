<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
       //atributos correspondientes a la table
       protected $table = "category";
       protected $primaryKey = "category_id";
       public $timestamps = false;

//metodo que ralacione la categoria con las pelicualas
public function  peliculas (){
       //La categoria se relaciona con muchas peliculas 
       //La pelicula pertenecera a muchas cateorias(M....M) 
       return $this->belongsToMany('App\Pelicula','film_category','category_id','film_id');
}

}


