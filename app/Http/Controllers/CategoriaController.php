<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    //Los controllers se componen de acciones 
    //acciones= metodos
    //pueden tener el nombre deseado de que no sea mayuscula
    public function index(){
        //dentro de la accion van las instruccines a ejecutar
      
         //seleccionar datos a traves de modelo 
    $categorias = Categoria::paginate(5);
    //invocar vista e ingresar a la vista el listado de categorias
    return view("categorias.index")->with("categorias",$categorias);
    }

    //Accion create: mostrar el formulario para registro de categoria
    public function create(){
       return view("categorias.new"); 
    }

    //Accion store: guardar la categoria que viene desde formulario
    public function store(){
        //validar datos
        //reglas de validacion paras lo capos en el formulario
        $reglas = [
            "categoria" => ["required","alpha","min:4","unique:category,name"]
        ];
        //mensajes en español
        $mensajes= [
            "required" => "Campo obligatorio",
            "alpha" => "solo letras",
            "min"=> "Solo categrias :min caracteres",
            "unique" => "categoria repetida"
        ];
        //aplicar la validacion
        //creando un objeto validar
        $validador = Validator::make($_POST, $reglas,$mensajes);
        //con los datos a validar y las reglas 
        //hacer comparacion de reglas
        if ($validador->fails()) {
            //la validacion fallo
            //redirigir al formulario con los mensages de error
            //tamien con los datos traidos con el formulario
            return redirect("categorias/create")->withErrors($validador)->withInput();
        }else {

            //la validacion no fallo?
            //ejecusion del flujo normal de caso de uso 
            //$_POST:es un arreglo(unidimensional) incorporado en PHP
            // donde quedan almacenados lo datos de un formulario
            //Crear mi objeto categoria
            $categoria = new Categoria;
            //asignarle nombre
            $categoria->name=$_POST["categoria"];
            //guardar
            $categoria->save();
            //letrero de exito : por medio de un redireccionamiento
            //redireccionamos a rutas que tengamos en web.php
            return redirect('categorias/create')->with("exito","Categoria registrada");
        }
        
        
       
    }

    //mostrar el formulario de actualizar
    public function edit($idcategoria){
       // seleccionar la categoria que tenga ese id
         $categoria = Categoria::find($idcategoria);
         
         //llevar los datos de la categoria a la vista de edicion
        return view('categorias.edit')->with("categoria",$categoria);
    }

    //Guadar la categoria actualizada
    public function update(){
        //seleccina categoria editar
        $categoria = Categoria::find($_POST["id"]);
        //actualizamos artributos
        $categoria->name = $_POST["categoria"];
        //guardadr cambios
        $categoria->save();
        echo"cambios guardado";
    }

}
