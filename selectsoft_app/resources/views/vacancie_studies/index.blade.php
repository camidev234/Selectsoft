@extends('layout.header')

@section('content')
    <h2>Lista de Estudios para la vacante</h2>

    <a href="{{ route('vacancie_studies.create') }}">Crear Nuevo Vacancie Study</a>

    <table>
        <thead>
            <tr>
                <!-- Agrega las columnas según tu modelo y necesidades -->
            </tr>
        </thead>
        <tbody>
            @foreach ($vacancieStudies as $vacancie_study)
                <tr>
                    <!-- Agrega las celdas según tu modelo y necesidades -->
                    <td>{{ $vacancie_study->study_name }}</td>
                    <td>
                        <a href="{{ route('vacancie_studies.edit', $vacancie_study->id) }}">Editar</a>
                        <form action="{{ route('vacancie_studies.destroy', $vacancie_study->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection