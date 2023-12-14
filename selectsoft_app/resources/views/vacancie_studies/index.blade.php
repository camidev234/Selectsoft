<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Estudios</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>ID</th>
                    <th>Nivel de Estudio</th>
                    <th>Estado de Estudio</th>
                    <th>Nombre del Estudio</th>
                    <th>Puntos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vacancieStudies as $vacancieStudy)
                    <tr>
                        <td>{{ $vacancieStudy->id }}</td>
                        <td>{{ $vacancieStudy->studyLevel->name }}</td>
                        <td>{{ $vacancieStudy->studyStatus->status_name }}</td>
                        <td>{{ $vacancieStudy->study_name }}</td>
                        <td>{{ $vacancieStudy->points }}</td>
                        <td class="actions-l">
                            <form action="{{ route('vacancie_studies.destroy', ['vacancieStudy' => $vacancieStudy->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="deleteBtn">Eliminar</button>
                            </form>
                            <form action="{{ route('vacancie_studies.edit', ['vacancieStudy' => $vacancieStudy->id]) }}" method="get">
                                <button class="updateBtn">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>No hay estudios para esta vacante</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    
    @endsection
</body>

</html>