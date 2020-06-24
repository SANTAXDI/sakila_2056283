<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = "film";
    protected $primaryKey = "film_id";
    public $timestamps = false;

    //metodo para  encontrar  las categorias  a las  pertenece  la pelicula
public function categorias (){
    return $this->belongsToMany('App\Categoria','film_category','film_id','category_id');
}
public function idioma (){
    //retornamos el inverso de la relacion: muchos a 1
    return $this->belongsTo('App\Idioma','language_id'); 

}
}

