<h1>Lista de peliculas </h1>
<table>
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Clasificacion</th>
            <th>Idioma</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peliculas as $p)
            <tr>
            <td>{{  $p->title  }}</td>
            <td>{{  $p->rating  }}</td>
           <td>{{  $p->idioma()->first()->name  }}</td>
           <td>
               @foreach ($p->categorias()->getresults() as $categoria)
                   {{  $categoria->name }} ,
               @endforeach
           </td>
            </tr>
        @endforeach
    </tbody>

</table>