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
            @if (session()->has('carrito'))
            @foreach ($carrito as $producto)
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
                        Cantidad <input type="number" name="cantidad" id="cantidad" class="inputStock" min="1" step="1" value="{{$producto['cantidad']}}" disabled>
                        {{-- <span style="margin-left:2%; font-size:0.9rem; color:rgb(137, 137, 137)">({{$producto['cantidad']}} disponibles)</span> --}}
                      </div>
                      <div class="itemCarritoPrecio">
                        Precio por unidad
                        <span> ${{$producto['precio_unitario']}}</span>
                      </div>
                      <div class="itemCarritoPrecio">
                        Total
                        <span> ${{$producto['precio_unitario']*$producto['cantidad']}}</span>
                      </div>
                        
                    </div>
                          {{-- opciones de producto --}}
                          <div class="itemOptions">
                          
                            <form method="POST" action="/mi-tienda/carrito/eliminar">@csrf  <input type="hidden" name="id_producto" id="id_producto" value="{{$producto['id_producto']}}"><button>Eliminar</button></form>
                            {{-- <a href="" style="width: 13%">Comprar ahora</a> --}}
                            {{-- <a href="" style="width: 30%">Ver mas productos de la categoria</a> --}}

                          </div>
            </div>
            {{-- AQUI TEERMINA EL ITEM HARDCODEADO --}}
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
                <a class="btn" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Realizar compra</a>
              </div>

            </div>
            @else
            <div class="itemCarrito">
              <h2>No tienes productos en el carrito</h2>
            </div>
            @endif

          </div>
          
      </div>  
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Ingresar datos de pago</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Aqui comienza el form -->
                <br>

                <div class="div-payment-left-body">
                  <p>INGRESA LOS DATOS DE LA TARJETA </p>

                  <div class="div-payment-inside-divisor">

                      <div class="div-payment-inside-divisor-half">
                          <label for="name" class="left-text">Nombre</label>
                          <input id="name" name="nombre" type="text" class="form-control"
                              required="">
                      </div>
                      <div class="div-payment-inside-divisor-half">
                          <label for="lastName" class="left-text">Apellido</label>
                          <input id="lastName" name="apellido" type="text" class="form-control"
                              required="">
                      </div>
                      
                  </div>

                  <label for="cardnumber" class="left-text">Numero de tarjeta</label>
                  <div class="div-payment-inside-divisor position-relative">
                      
                       <input id="cardnumber" name="tarjeta" type="text" class="form-control">
                  </div>
                  
                 
                  <div class="div-payment-inside-divisor">

                      <div class="div-payment-inside-divisor-half">
                          <label for="expirationdate" class="left-text">Fecha de vencimiento (MM/AA)</label>
                          <input id="expirationdate" name="fechaVto" type="text" class="form-control">
                      </div>
                      <div class="div-payment-inside-divisor-half">
                          <label for="securitycode" class="left-text">Codigo de seguridad</label>
                          <input id="securitycode" name="codigo" type="text" class="form-control">
                      </div>
                      
                  </div>


                </div>
                <div class="form-check">
                  <input class="float-start flex-row w-auto mt-2" type="checkbox" value="1" name="chkTarjeta">
                  <label class="m-lg-2 form-check-label" for="flexCheckDefault">
                    ¿Desea almacenar los datos de su tarjeta?
                  </label>
                </div>
                <a href="/mi-tienda/carrito/confirmar" class="btn float-end" >Confirmar</a>

            </div>
          </div>
        </div>
      </div>   
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
@include('footer')

</html>