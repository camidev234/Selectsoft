<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('update_occupation',['id'=>$occupation->id])}}" method="post">
        @method('PUT')
    @csrf
        <label for="occupation_code">Código de ocupación:</label>
        <input type="text" name="occupation_code" id="occupation_code" value="{{$occupation->occupation_code}}" >
        <label for="occupation_name">Nombre de ocupación:</label>
        <input type="text" name="occupation_name" id="occupation_name" value="{{$occupation->occupation_name}}">
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{$occupation->description}}">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>