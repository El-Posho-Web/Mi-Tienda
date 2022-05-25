<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  @include('head')
  <link rel="stylesheet" href="/css/carrito.css">
  <title>Mi Tienda</title>
</head>
<body>
      <!-- header -->
      
      @include('header')

      @if (session()->has('productoagregado'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('productoagregado') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      
      @if (session()->has('productoeliminado'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('productoeliminado') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif



            {{-- guarda todos los elementos --}}
      <div class="generalCont">
            {{-- caja contenedora del nav --}}
          <div class="carritoNav">
            {{-- items del nav(carrito,guardados) --}}
                  <div class="itemNav">
                      <span>Carrito</span>
                  </div>
                  <div class="itemNav">
                      <a href="#" style="text-decoration: none; color:black">Guardados</a>
                  </div>
          </div>

          {{-- caja contenedora de los items del Carrito(productos en si) --}}
          <div class="ItemsCont">
            @php
            $total = 0;
            @endphp
            @if (session()->has('carrito'))
            @foreach ($carrito as $id => $producto)
            <div class="itemCarrito">
              {{-- foto,nombre,cantidad,precio de producto --}}
                    <div class="itemCarritoPicDesc">
                      <div class="itemCarritoPic">
                          <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=" alt="">
                      </div>
                      <div class="itemCarritoDesc">
                          <span>
                            {{$producto['nombre']}}
                          </span>
                      </div>

                      <div class="itemCarritoCantidad">
                        <input type="number" name="cantidad" id="cantidad" class="inputStock" min="1" step="1" value="{{$producto['cantidad']}}" disabled>
                        {{-- <span style="margin-left:2%; font-size:0.9rem; color:rgb(137, 137, 137)">({{$producto['cantidad']}} disponibles)</span> --}}
                      </div>
                      <div class="itemCarritoPrecio">
                        <span> ${{$producto['total']}}</span>
                      </div>
                        
                    </div>
                          {{-- opciones de producto --}}
                          <div class="itemOptions">
                          
                            <form method="POST" action="/mi-tienda/carrito/eliminar">@csrf  <input type="hidden" name="id_producto" id="id_producto" value="{{$id}}"><button>Eliminar</button></form>
                            {{-- <a href="" style="width: 13%">Comprar ahora</a> --}}
                            {{-- <a href="" style="width: 30%">Ver mas productos de la categoria</a> --}}

                          </div>
            </div>
            {{-- AQUI TEERMINA EL ITEM HARDCODEADO --}}
            @php
            $total = $total + $producto['total'];
            @endphp
            @endforeach
            <div class="sumario">
              {{-- DESTINO DE ENVIO --}}
              <div class="sumarioDestino">
                  <span>Enviar a {{$usuario->domicilio}}</span>
              </div>
              {{-- TOTAL CARRITO --}}
              <div class="sumarioPrecio">
                <div>
                  <span>Total con envío</span>
                </div>
                <div>
                  <span>${{$total}}</span>
                </div>
              </div>

              {{-- BOTON REALIZAR COMPRA --}}

              <div class="sumarioBtn">
                <a href="/mi-tienda/carrito/confirmar" class="btn">Realizar compra</a>
              </div>

            </div>
            @else
            <div class="itemCarrito">
              <h2>No tienes productos en el carrito</h2>
            </div>
            @endif

          </div>
          
      </div>      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
@include('footer')

</html>