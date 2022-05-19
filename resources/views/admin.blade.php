<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PAGINA DE ADMINS</h1>
    <form method="POST" action="/mi-tienda/admin/producto">
        @csrf
        INTRODUCIR NUEVO PRODUCTO 
        <label for="nombre"> Nombre </label>
        <input type="text" name="nombre" id="nombre">
        <label for="descripcion"> Descripción </label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="stock"> Stock </label>
        <input type="number" name="stock" id="stock">
        <label for="precio"> Precio </label>
        <input type="number" name="precio_unitario" id="precio_unitario">
        <label for="cat"> Categoria </label>
        <select name="id_categoria" id="id_categoria">
        @php
            $categorias = \App\Models\Categoria::all();
        @endphp

        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}"> {{ $categoria->nombre }}</option>
        @endforeach
    </select>
        <button type="submit">Submit</button>
    </form>
    <form method="POST" action="/mi-tienda/admin/categoria">
        @csrf
        INTRODUCIR NUEVA CATEGORIA 
        <label for="nombre"> Nombre </label>
        <input type="text" name="nombre" id="nombre">
        <button type="submit">Submit</button>
    </form>

    <table>
        <th>PRODUCTOS</th>
        <tbody>
            @php
                $productos = \App\Models\Producto::all();
            @endphp

            <tr><th>NOMBRE</th><th>DESCRIPCION</th><th>STOCK</th><th>PRECIO UNITARIO</th></tr>

            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->precio_unitario }}</td>
                <td><a href="/mi-tienda/admin/producto/{{ $producto->id_producto }}/editar">EDIT</a></td>
                <td><form method="POST" action="/mi-tienda/admin/producto/{{ $producto->id_producto }}/eliminar">
                    @csrf 
                    @method('DELETE')
                    <button>DELETE</button>
                    
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>