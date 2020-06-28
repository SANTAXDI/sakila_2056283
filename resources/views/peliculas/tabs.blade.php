<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Tabs - Default functionality</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
 
<div id="tabs">
  <ul>
    @foreach ($categorias as $categoria)
    <li><a href="#{{ $categoria->category_id }}">{{ $categoria->name }}</a></li>
    @endforeach
  </ul>
  @foreach ($categorias as $categoria)
  <div id="{{ $categoria->category_id }}">
        <p>
            <!-- hacer una tabla de peliculas de la categoria -->
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Clasificacion</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria->peliculas()->get() as $pelicula)
                        <tr>
                            <td>{{$pelicula->title}}</td>
                            <td>{{$pelicula->rating }}</td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </p>
      
  </div>
 
  @endforeach
</div>
 

</body>
</html