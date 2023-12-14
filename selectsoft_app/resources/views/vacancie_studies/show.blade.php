<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/showRequisition.css')}}">
    <title>Estudios vacante: {{$requisition->id}}</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="studiesInfo">
            <h2>ID de estudio: {{$vacancieStudies->id}}</h2><br>
            <p><strong>Nivel de estudio: </strong>{{$vacancieStudies->studyLevel->name}}</p>
            <p><strong>Estado de estudio: </strong>{{$vacancieStudies->studyStatus->status_name }}</p>
            <p><strong>Nombre del estudio: </strong>{{$vacancieStudies->study_name}}</p>
            <p><strong>Puntos: </strong>{{$vacancieStudies->points }}</p>
        </section>
        <section class="functions-title">
            <h2>Funciones: </h2>
        </section>
        <section class="functions">
            <table>
                <thead>
                    <tr>
                        <th>Función</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vacancieStudiesFunctions as $function)
                        <tr>
                            <td>{{$function->function}}</td>
                            <td class="functionActions">
                                <form action="{{route('vacancie_studiesFunction.edit', ['vacancie_studies_function' => $function->id, 'vacancie_studies' => $vacancieStudies->id])}}">
                                    <button class="btnUpdate">Actualizar</button>
                                </form>
                                <form action="{{route('vacancie_studiesFunction.destroy', ['vacancie_studies_function' => $function->id, 'vacancie_studies' => $vacancieStudies->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnDelete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay estudios para esta vacante</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section><br>
        <section class="createFunction">
            <a href="{{route('vacancie_studiesFunction.create',['vacancie_studies' => $vacancieStudies->id])}}">Crear estudio</a>
        </section>
    </section>
    @endsection
</body>

</html>