<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de categorias</title>
</head>
<body>
    <h1>Lista de categorías</h1>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th colspan="2">
                    Nombre de Categoría
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $c)  
                <tr>
                    <td>
                        {{ $c->name   }}
                    </td>
                    <th>            
                    <a href="{{  url('categorias/edit/'.$c->category_id)   }}">Actualizar</a>           
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- paginacion de categorias con el metodo links -->
    {{ $categorias ->links()}}
</body>
</html>