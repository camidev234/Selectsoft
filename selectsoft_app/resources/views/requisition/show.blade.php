<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/showRequisition.css')}}">
    <title>Requisición: {{$requisition->id}}</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="requisitionInfo">
            <h2>ID de Requisición: {{$requisition->id}}</h2><br>
            <p><strong>Ocupación: </strong>{{$requisition->occupation->occupation_name}}</p>
            <p><strong>Descripción: </strong>{{$requisition->description}}</p>
            <p><strong>Función: </strong>{{$requisition->function}}</p>
            <p><strong>Denominación: </strong>{{$requisition->denomination}}</p>
            <p><strong>Habilidades: </strong>{{$requisition->skills}}</p>
            <p><strong>Conocimientos: </strong>{{$requisition->knowledge}}</p>
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
                    @forelse($requisitionFunctions as $function)
                        <tr>
                            <td>{{$function->function}}</td>
                            <td class="functionActions">
                                <form action="{{route('requisitionFunction.edit', ['requisition_function' => $function->id, 'requisition' => $requisition->id])}}">
                                    <button class="btnUpdate">Actualizar</button>
                                </form>
                                <form action="{{route('requisitionFunction.destroy', ['requisition_function' => $function->id, 'requisition' => $requisition->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnDelete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>La requisición {{$requisition->id}} no posee funciones</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section><br>
        <section class="createFunction">
            <a href="{{route('requisitionFunction.create',['requisition' => $requisition->id])}}">Crear función</a>
        </section>
    </section>
    @endsection
</body>

</html>