<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://kit.fontawesome.com/be85762cea.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Editar producto</title>
</head>
<body>
                    <div class="header" >
                            <div class="tituloHeader"> <p>Editar producto</p></div>
                        
                        </div>
                        <div class="actionHeader">
                        <div class="tituloActionHeader"> <p>Ingrese los nuevos parametros de {{$producto->nombre}}</p>
                            </div>
                        </div>
                    
    <form method="POST" action="/mi-tienda/admin/producto/{{ $producto->id_producto }}/actualizar">
        @csrf<div class="inputContainers mb-3">

<div class="div2InputsContainer">
            <div class="divInputPlusLabelHalfed">
            <label for="">Nombre</label>
            <input class="inputSignup" type="text" name="nombre" id="nombre" value=" {{$producto->nombre}}">
            </div>
            <div class="divInputPlusLabelHalfed">
                    <label for="">Descripción</label>
                    <input class="inputSignup" type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
            </div>
</div>

<div class="div2InputsContainer">
<div class="divInputPlusLabelThreeParts">
                        <label for="stock"> Stock </label>
                        <input class="inputSignup" type="number" name="stock" id="stock" step="1"  min="0" value="{{$producto->stock}}">
            </div>
            <div class="divInputPlusLabelThreeParts">
                        <label for="precio"> Precio </label>
                        <input class="inputSignup" type="number" name="precio_unitario" id="precio_unitario" value="{{$producto->precio_unitario}}" step="0.001"  min="0.001">
            </div>
            <div class="divInputPlusLabelThreeParts">
                        <label for="cat"> Categoria </label>
                        <select class="inputSignup" name="id_categoria" id="id_categoria">                                                          
                              @php
                                $categorias = \App\Models\Categoria::all();
                            @endphp

                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria }}" @if ($categoria->id_categoria == $producto->id_categoria) selected @endif> {{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
            </div>
</div>

<div class="div2InputsContainer">
<button class="buttonAdm" type="submit">Registrar</button>
</div>

</div>
       <!--  Editar PRODUCTO 
        
        <label for="nombre"> Nombre </label>
        <input class="inputSignup" type="text" name="nombre" id="nombre" value=" {{$producto->nombre}}">
        <label for="descripcion"> Descripción </label>
        <input class="inputSignup" type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
        <label for="stock"> Stock </label>
        <input class="inputSignup" type="number" name="stock" id="stock" value="{{$producto->stock}}">
        <label for="precio"> Precio </label>
        <input class="inputSignup" type="number" name="precio_unitario" id="precio_unitario" value="{{$producto->precio_unitario}}">
        <label for="cat"> Categoria </label>
        <select class="inputSignup" name="id_categoria" id="id_categoria">
        @php
            $categorias = \App\Models\Categoria::all();
        @endphp

        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}" @if ($categoria->id_categoria == $producto->id_categoria) selected @endif> {{ $categoria->nombre }}</option>
        @endforeach
    </select>
        <button type="submit">Submit</button> -->
    </form>
    <div class="container">

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
  <div class="col-md-4 d-flex align-items-center">
    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
    </a>
    <span class="text-muted">© 2021 Roldan chicken, Inc</span>
  </div>

  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
  </ul>
</footer>
</div>
</body>
</html>