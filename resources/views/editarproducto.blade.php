<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    HOLA
    <form method="POST" action="/mi-tienda/admin/producto/{{ $producto->id_producto }}/actualizar">
        @csrf
        Editar PRODUCTO 
        <label for="nombre"> Nombre </label>
        <input type="text" name="nombre" id="nombre" value=" {{$producto->nombre}}">
        <label for="descripcion"> Descripción </label>
        <input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
        <label for="stock"> Stock </label>
        <input type="number" name="stock" id="stock" value="{{$producto->stock}}">
        <label for="precio"> Precio </label>
        <input type="number" name="precio_unitario" id="precio_unitario" value="{{$producto->precio_unitario}}">
        <label for="cat"> Categoria </label>
        <select name="id_categoria" id="id_categoria">
        @php
            $categorias = \App\Models\Categoria::all();
        @endphp

        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}" @if ($categoria->id_categoria == $producto->id_categoria) selected @endif> {{ $categoria->nombre }}</option>
        @endforeach
    </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>