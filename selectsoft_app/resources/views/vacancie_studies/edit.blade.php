@extends('layout.header')

@section('content')
    <h2>Editar Estudio de la vacante</h2>

    <form action="{{ route('vacancie_studies.update', $vacancie__study->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Agrega los campos del formulario según tu modelo y necesidades -->
        
        <button type="submit">Actualizar</button>
    </form>
@endsection