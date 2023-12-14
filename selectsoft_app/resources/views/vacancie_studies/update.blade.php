<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateOccupation.css')}}">
    <title>Edición de estudios</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{route('vacancie_studies.update', ['vacancie_studies' => $vacancie_studies->id])}}" class="form">
        @csrf
        @method('PUT')
        <br><label for="study_level_id">Nivel de estudio</label>
        <select name="study_level_id" value="{{ old('study_level_id') }}"><br>
            <option value="1">Preescolar</option>
            <option value="2">Basica primaria</option>
            <option value="3">Basica secundaria</option>
            <option value="4">Educacion media</option>
            <option value="5">Capacitacion</option>
            <option value="6">Tecnico</option>
            <option value="7">Tecnologo</option>
            <option value="8">Pregrado</option>
            <option value="9">Posgrado</option>
        </select><br>
        @error('study_level_id')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <br><label for="study_status_id">Estado de Estudio:</label>
        <select name="study_status_id" value="{{ old('study_status_id') }}"><br>
            <option value="1">Terminado</option>
            <option value="2">En curso</option>
        </select><br>
        @error('study_status_id')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <br><label for="study_name">Nombre del Estudio:</label><br>
            <input type="text" name="study_name" id="" class="form-control" value="{{ old('study_name') }}">
        </div>
        <div class="form-group">
            <br><label for="points">Puntos:</label><br>
            <input type="number" name="points" id="" class="form-control" value="{{ old('points') }}">
        </div>
        <br><button type="submit" class="btn btn-primary">Crear Estudio de Vacante</button>
    </form>
    @endsection
</body>
</html>
