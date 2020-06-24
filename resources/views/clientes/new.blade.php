<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
    <script>
        //se carga el documento y esta listo para mostrarse  en browser
        $(document).ready(function(){
            console.log("hola paises");
            //elegir el control con id pais
            //al cambiar de option  en el  select 
            $("#pais").change(function(){
                //limpiar el select
                $("#ciudad").html("");
                var idpais=$("#pais").val();
                //console.log(idpais);
                //hacer peticion a la ruta jsoncities para que me traiga(json)las ciudades del pais
                $.getJSON('jsoncities/'+ idpais , function(resultados){
                    //console.log(resultados);
                    //recorrer el arreglo de resultados
                    $.each(resultados, function(indice, objeto_ciudad) {
                        //crear un option y anexarlo al select "ciudad"
                        $("#ciudad").append("<option value='"+objeto_ciudad.city_id+"'>"+objeto_ciudad.city+"</option>");
                    });
                });
            });
        }
        );
    </script>
</head>
<body>
<form method="post" action="{{ url('clientes/store') }}" class="form-horizontal">
        @csrf
        <fieldset>
        
        <!-- Form Name -->
        <legend>Nuevo Cliente</legend>
            
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Nombre</label>  
          <div class="col-md-4">
          <input id="textinput" name="nombre_cliente" type="text" placeholder="placeholder" class="form-control input-md">
            
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Apellido</label>  
          <div class="col-md-4">
          <input id="textinput" name="apellido_cliente" type="text" placeholder="placeholder" class="form-control input-md">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">email</label>  
          <div class="col-md-4">
          <input id="textinput" name="email_cliente" type="text" placeholder="placeholder" class="form-control input-md">
            
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Pais</label>
          <div class="col-md-4">
            <select id="pais" name="pais_cliente" class="form-control">
              @foreach ($paises as $pais)
            <option value="{{ $pais->country_id}}">{{ $pais->country }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Ciudad</label>
          <div class="col-md-4">
            <select id="ciudad" name="ciudad_cliente" class="form-control">
            
            </select>
          </div>
        </div>
        
         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Dirección: </label>  
          <div class="col-md-4">
          <input id="textinput" name="direccion_cliente" type="text" placeholder="placeholder" class="form-control input-md">
            
          </div>
        </div>

         <!-- Multiple Checkboxes (inline) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="checkboxes">Activo</label>
          <div class="col-md-4">
            <label class="checkbox-inline" for="checkboxes-0">
              <input type="checkbox" name="activo_cliente" id="checkboxes-0" value="1">
              
            </label>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for=""></label>
          <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-primary">Guardar</button>
          </div>
        </div>

        </fieldset>
        </form>
</body>
</html>