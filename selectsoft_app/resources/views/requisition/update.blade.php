<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateRequisition.css')}}">
    <title>Editar Requisición</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('requisitions.update', ['requisition' => $requisition->id])}}" class="form">
        @csrf
        @method('PATCH')
        <!-- Campo para seleccionar la ocupación -->
        <label for="occupation_id">Ocupación:</label>
        <select name="occupation_id">
            @foreach($occupations as $occupation)
                <option value="{{ $occupation->id }}" {{ $requisition->occupation_id == $occupation->id ? 'selected' : '' }}>
                    {{ $occupation->occupation_name }}
                </option>
            @endforeach
        </select>
        <br>

        <!-- Campos de la requisición -->
        <label for="description">Descripción:</label>
        <input type="text" name="description" value="{{ old('description', $requisition->description) }}">
        <br>

        <label for="function">Función:</label>
        <input type="text" name="function" value="{{ old('function', $requisition->function) }}">
        <br>

        <label for="denomination">Denominación:</label>
        <input type="text" name="denomination" value="{{ old('denomination', $requisition->denomination) }}">
        <br>

        <label for="skills">Habilidades:</label>
        <input type="text" name="skills" value="{{ old('skills', $requisition->skills) }}">
        <br>

        <label for="knowledge">Conocimientos:</label>
        <input type="text" name="knowledge" value="{{ old('knowledge', $requisition->knowledge) }}">
        <br>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Actualizar Requisición</button>
    </form>
    @endsection
</body>

</html>