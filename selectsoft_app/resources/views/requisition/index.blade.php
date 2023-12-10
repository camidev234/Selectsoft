<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Requisiciones</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>ID</th>
                    <th>Ocupación</th>
                    <th>Descripción</th>
                    <th>Función</th>
                    <th>Denominación</th>
                    <th>Habilidades</th>
                    <th>Conocimientos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @forelse($requisitions as $requisition)
                <tr>
                    <td>{{ $requisition->id }}</td>
                    <td>{{ $requisition->occupation->occupation_name }}</td>
                    <td>{{ $requisition->description }}</td>
                    <td>{{ $requisition->function }}</td>
                    <td>{{ $requisition->denomination }}</td>
                    <td>{{ $requisition->skills }}</td>
                    <td>{{ $requisition->knowledge }}</td>
                    <td class="actions-l">
                        <form action="{{ route('requisitions.destroy', ['requisition' => $requisition->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Eliminar</button>
                        </form>
                        <form action="{{ route('requisitions.show', ['requisition' => $requisition->id]) }}" method="get">
                            <button class="detailsBtn">Detalles</button>
                        </form>
                        <form action="{{ route('requisitions.edit', ['requisition' => $requisition->id]) }}" method="get">
                            <button class="updateBtn">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">No hay requisiciones en el sistema</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="create">
        <a href="{{ route('requisitions.create') }}">Crear requisición</a>
    </div>
    @endsection
</body>

</html>