<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createRequisition.css')}}">
    <title>Crear Requisición</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <form method="post" action="{{ route('requisitions.store') }}" class="form">
        @csrf
        <!-- Campo para seleccionar la ocupación -->
        <label for="occupation_id">Ocupación:</label>
        <select name="occupation_id">
            @foreach($occupations as $occupation)
                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
            @endforeach
        </select>
        <!-- Campo para descripción -->
        <label for="description">Descripción:</label>
        <input type="text" name="description" value="{{ old('description') }}">
        @error('description')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <!-- Campo para función -->
        <label for="function">Función:</label>
        <input type="text" name="function" value="{{ old('function') }}">
        @error('function')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <!-- Campo para denominación -->
        <label for="denomination">Denominación:</label>
        <input type="text" name="denomination" value="{{ old('denomination') }}">
        @error('denomination')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <!-- Campo para habilidades -->
        <label for="skills">Habilidades:</label>
        <input type="text" name="skills" value="{{ old('skills') }}">
        @error('skills')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <!-- Campo para conocimientos -->
        <label for="knowledge">Conocimientos:</label>
        <input type="text" name="knowledge" value="{{ old('knowledge') }}">
        @error('knowledge')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <!-- Botón para enviar el formulario -->
        <button type="submit">Crear Requisición</button>
    </form>
    @endsection
</body>