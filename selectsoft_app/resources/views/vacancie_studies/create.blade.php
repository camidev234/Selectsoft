@extends('layout.header')

@section('content')
    <h2>Crear Estudios de la vacante</h2>
    
    <form action="{{ route('vacancie_studies.store') }}" method="POST">
        @csrf

        <!-- Agrega los campos del formulario según tu modelo y necesidades -->

        <button type="submit">Guardar</button>
    </form>
@endsection