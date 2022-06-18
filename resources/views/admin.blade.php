<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin.css">
    <!-- <link rel="stylesheet" href="/css/main.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://kit.fontawesome.com/be85762cea.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>
<body>

   {{--  MENSAJES DE CONFIRMACIÓN O ERROR --}}
    
    @if (session()->has('mensaje'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('mensaje') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      @endif


    </div>
                <!--   TAB CALL  -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Agregar producto</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Agregar categoria</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Modificar productos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                </li>
                </ul>
                <!-- TAB CALL END -->



                <!-- TAB CONTENT -->

                <div class="tab-content" id="myTabContent">

                    <!-- PRODUCTOS TAB -->

                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="header" >
                            <div class="tituloHeader"> <p>Productos</p></div>
                        
                        </div>
                        <div class="actionHeader">
                        <div class="tituloActionHeader"> <p>Introduzca el nuevo producto</p>
                            </div>
                        </div>
                    
                    <form method="POST" action="/mi-tienda/admin/producto">
                        @csrf
                    

                        <div class="inputContainers mb-3">

                        <div class="div2InputsContainer">
                                    <div class="divInputPlusLabelHalfed">
                                    <label for="">Nombre</label>
                                        <input class="inputSignup" type="text" name="nombre" id="nombre">
                                    </div>
                                    <div class="divInputPlusLabelHalfed">
                                            <label for="">Descripción</label>
                                                <input class="inputSignup" type="text" name="descripcion" id="descripcion">
                                    </div>
                        </div>

                        <div class="div2InputsContainer">
                        <div class="divInputPlusLabelThreeParts">
                                                <label for="stock"> Stock </label>
                                                <input class="inputSignup" type="number" name="stock" id="stock" min="0" step="1">
                                    </div>
                                    <div class="divInputPlusLabelThreeParts">
                                                <label for="precio"> Precio </label>
                                                <input class="inputSignup" type="number" name="precio_unitario" id="precio_unitario" >
                                    </div>
                                    <div class="divInputPlusLabelThreeParts">
                                                <label for="cat"> Categoria </label>
                                                <select class="inputSignup" name="id_categoria" id="id_categoria">                                                            @php
                                                        $categorias = \App\Models\Categoria::all();
                                                    @endphp

                                                    @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id_categoria }}"> {{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                        </div>

                        <div class="div2InputsContainer">
                        <button class="buttonAdm" type="submit">Registrar</button>
                        </div>
                        
                        </div>
                        </form>

                    </div>


                
        
                       <!-- PRODUCTOS TAB END -->



                    <!-- CATEGORIAS TAB -->
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="header" >
                        <div class="tituloHeader"> <p>Categorias</p></div>
                    
                    </div>
                    <div class="actionHeader">
                    <div class="tituloActionHeader"> <p>Introduzca la nueva categoria</p></div>
                    </div>
                    

                <form method="POST" action="/mi-tienda/admin/categoria">
                    @csrf

                    <div class="inputContainersRow mb-5">
                            <div class="divInputPlusLabel">
                            <label for="nombre"> Nombre </label>
                            <input class="inputSignup" type="text" name="nombre" id="nombre">

                            </div>
                            <div class="divBtn">
                            <button  class="buttonAdm" type="submit" style="width:100%; padding:14%; margin-top:-14%">Registrar</button>
                            </div>

                    </div>
                </form>

                    
                <div class="header" >
                    <div class="tituloHeader"> <p>Eliminar categoria</p></div>                 
                        </div>
                        <div class="actionHeader">
                        <div class="tituloActionHeader"> <p>Seleccione la categoria en la tabla para eliminarla</p></div>
                        </div>
     
                        <!-- TABLE BEGIN -->
                        <div class="tableWrapper">
                        <table class="tableWrapper">
     
        <tbody>
            @php
                $categorias = \App\Models\Categoria::all();
            @endphp
     
            <tr><th>NOMBRE</th><th></th> <th></th></tr>
     
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>
                    <div class="divEdit">
                    {{-- <a class="buttonAdm" href="/mi-tienda/admin/producto/{{ $producto->id_producto }}/editar" style="text-decoration:none; font-weight:300; width:100%; padding:5%; margin-top:10% !important">Modificar categoria</a> --}}
     
                    </div>
                </td>
                <td><form method="POST" action="/mi-tienda/admin/categoria/{{ $categoria->id_categoria }}/eliminar">
                    @csrf 
                    @method('DELETE')
                    <button class="buttonAdm" style="font-weight:300; width:100%; padding:5%; margin-top:10%">Eliminar</button>
                    
                </form></td>
            </tr>
            @endforeach
        </tbody>
     </table>
                        </div>
     
        <!-- TABLE END -->
     
     
     
            </div>

              <!-- CATEGORIAS TAB END -->

              <!-- MODIFICAR PRODUCTO TAB -->
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    
                     <div class="header" >
                    <div class="tituloHeader"> <p>Modificar producto</p></div>                 
                        </div>
                        <div class="actionHeader">
                        <div class="tituloActionHeader"> <p>Seleccione el producto en la tabla para modificarlo</p></div>
                        </div>

                        <!-- TABLE BEGIN -->
                        <div class="tableWrapper">
                        <table class="tableWrapper">

        <tbody>
            @php
                $productos = \App\Models\Producto::all();
            @endphp

            <tr><th>NOMBRE</th><th>DESCRIPCION</th><th>STOCK</th><th>PRECIO UNITARIO</th><th></th> <th></th></tr>

            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->precio_unitario }}</td>
                <td>
                    <div class="divEdit">
                    <a class="buttonAdm" href="/mi-tienda/admin/producto/{{ $producto->id_producto }}/editar" style="text-decoration:none; font-weight:300; width:100%; padding:5%; margin-top:10% !important">Modificar producto</a>

                    </div>
                </td>
                <td><form method="POST" action="/mi-tienda/admin/producto/{{ $producto->id_producto }}/eliminar">
                    @csrf 
                    @method('DELETE')
                    <button class="buttonAdm" style="font-weight:300; width:100%; padding:5%; margin-top:10%">Eliminar</button>
                    
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                        </div>
  
        <!-- TABLE END -->

</div>
<!-- TABLE TAB END -->
  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
</div>

        
        


      

        <!-- 
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
    </form> -->

   @include('footer')
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</html>