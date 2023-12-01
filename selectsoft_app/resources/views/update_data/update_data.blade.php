<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    <form action="{{route('updated.dates')}}" method="post">
        @csrf
        @method('PATCH')
        <section id="datos_personales">
            <h2>DATOS PERSONALES</h2>
            <section class="info">
                <article>
                    <label for="nombres">NOMBRES</label>
                    <input type="text" id="nombres" name="name" value="{{old('name')}} {{$user->name}}">
                    @error('name')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </article>
                <article>
                    <label for="apellidos">APELLIDOS</label>
                    <input type="text" id="apellidos" name="last_name" value="{{old('last_name')}} {{$user->last_name}}">
                    @error('last_name')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </article>
                <article>
                    <label for="tipo_documento">TIPO DE DOCUMENTO</label>
                    <select id="tipo_documento" name="document_type_id">
                        @foreach($document_types as $dct)
                            <option value="{{$dct->id}}">{{ $dct->document_type }}</option>
                        @endforeach
                    </select>
                </article>
            </section>
        </section>
        <section id="ubicacion">
            <h2>UBICACIÓN</h2>
            <section class="info">
                <article>
                    <label for="pais">PAÍS</label>
                    <select name="id_country" id="">
                        @forelse($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_code }}-{{ $country->country_name }}</option>
                        @empty
                            <option value="">No hay paises en el sistema</option>
                        @endforelse
                    </select>
                </article>
                <article>
                    <label for="departamento">DEPARTAMENTO</label>
                    <select name="id_department" id="">
                        @foreach($departaments as $dpto)
                            <option value="{{$dpto->id}}">{{$dpto->departament_name}}</option>
                        @endforeach
                    </select>
                </article>
                <article>
                    <label for="ciudad">CIUDAD</label>
                    <select name="id_city" id="">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                </article>
                <article>
                    <label for="direccion">DIRECCIÓN</label>
                    <input type="text" id="direccion" name="address" value="{{old('address')}} {{$user->address}}">

                    @error('address')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </article>
                <article>
                    <label for="telefono">TELEFONO</label>
                    <input type="text" id="telefono" name="telephone" value="{{old('telephone')}} {{$user->telephone}}">
                    @error('telephone')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </article>
                <article>
                    <label for="celular">CELULAR</label>
                    <input type="text" id="number" name="phone_number" value="{{old('phone_number')}} {{$user->phone_number}}">
                    @error('phone_number')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </article>
            </section>

    </section>
    <input type="submit" value="actualizar">
</form>
    @endsection

</body>
</html>