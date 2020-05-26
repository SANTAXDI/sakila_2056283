<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta de prueba

Route::get('prueba', function () {
    $estudiantes=[
        "Ana",
        "Jorge",
        "Maria"
    ];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre";

});

Route::get('paises', function () {
    $paises=[
            "Colombia" => [
                "capital" => "Bogoto",
                "moneda" => "Peso",
                "poblacion" => 55,
                "ciudades" => ["Cali","Medellin","Barranquilla"]
            ],
            "Ecuador" => [
                "capital" => "Quito",
                "moneda" => "Dolar",
                "poblacion" => 10,
                "ciudades" => ["Guayaquil","Manta","Pichincha"]
            ],
            "Brazil"=> [
                "capital" => "Brazilia",
                "moneda" => "Real",
                "poblacion" => 220,
                "ciudades" => ["Santos","Sao Paulo","Bahia"]
            ]
    ];

    //pasar el arreglo de paises a una vista
    return view("paises")->with("paises", $paises);
});
//Ruta de controlador
//Controlador y accion se separa por arroba
Route::get('categorias', "CategoriaController@index" );
//Añadir categoria
Route::get('categorias/create', "CategoriaController@create" );
//Guardar la nueva categoria
Route::post('categorias/store', "CategoriaController@store");
//Ruta para mostrar la el furmulario para actualizar (cambiar nombre) categoria
Route::get("categorias/edit/{idcategoria}", "CategoriaController@edit");
//Ruta para guardar cambios de categoria
Route::post("categorias/update", "CategoriaController@update");