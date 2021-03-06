<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('head')

    
  {{-- poner el nombre de producto real --}}
    <title>Producto</title>
</head>


<body>

    @include('header')

    {{-- Contenedor de producto y compra --}}
    <div class="AllItemsContainer">


      {{-- Contenedor de producto y su informacion --}}
      <div class="prodContainer">

            {{-- contenedor de foto --}}
              <div class="prodContainerPic">
                <img src="https://via.placeholder.com/1920x1080.png"  alt="">
              </div>

              {{-- contenedor de info --}}
              <div class="prodContainerInfo">
                <div class="prodContainerInfo-Title">
                     <p style="margin: 0px; color:rgb(160, 160, 160); font-size:0.8rem">1000 vendidos</p>
                      <h1>          
                        {{$producto->nombre}}
                      </h1>
                </div>
               <div class="prodContainerInfo-Price">
                 <span>${{$producto->precio_unitario}}</span>
                 <p class="text-muted" style="font-size: 0.7rem; margin:0;">Todos los precios están expresados en pesos argentinos.</p>
                <a href="">Ver los medios de pago</a>
               </div>
               <div class="prodContainerInfo-Desc">
                 <h3>Lo que tenés que saber de este producto</h3>
                 
                 <br><p>
                  {{$producto->descripcion}}
      
                 </p>
               </div>

              </div>
      </div>

            {{-- Contenedor de detalles de compra --}}

      <div class="compraYcarrito">

          <div class="carrito">

           
              
        <div class="carritoShipping">

          <div class="carritoShippingDate">
             
            <span class="material-symbols-outlined">
              local_shipping
              </span><p>Llega entre el</p> <p style="margin-left:1%; color: black; font-weight:bold"> 30 y 31 de mayo </p> 
               
            </div>

            <div class="carritoShippingLugar">
              @auth  
                <span>{{$usuario->domicilio}}</span>
              @else
                <span>Tu direccion</span>
              @endauth
            </div>

        </div>
        @if ($producto->stock === 0)
        <div class="carritoStockYcompra">

          {{-- HACER UN IF dentro de la clase, LA CLASE "disponible" pone la letra en verde, la clase NO disponible la pone en rojo. --}}
          <p class="disponible">Lo sentimos, no hay stock disponible</p>
          <div class="carritostock">

            <form action="/mi-tienda/carrito/agregar/{{$producto->id_producto}}" method="POST">
              @csrf
            <span>Cantidad:</span> <input type="number" name="cantidad" id="cantidad" class="input" min="1" step="1" max="{{$producto->stock}}" value="0" disabled>
            <span style="margin-left:2%; font-size:0.75rem; color:rgb(137, 137, 137)">({{$producto->stock}} disponibles)</span>
          </div>
          <div class="carritocompra">
            <button disabled>
                Comprar
            </button>

            <button type="submit" disabled>
                  Agregar al carrito
            </button>
          </div>

          </form>
        </div>
        @else
        <div class="carritoStockYcompra">

          {{-- HACER UN IF dentro de la clase, LA CLASE "disponible" pone la letra en verde, la clase NO disponible la pone en rojo. --}}
          <p class="disponible">¡Stock Disponible!</p>
          <div class="carritostock">

            <form action="/mi-tienda/carrito/agregar/{{$producto->id_producto}}" method="POST">
              @csrf
            <span>Cantidad:</span> <input type="number" name="cantidad" id="cantidad" class="input" min="1" step="1" max="{{$producto->stock}}" value="1">
            <span style="margin-left:2%; font-size:0.75rem; color:rgb(137, 137, 137)">({{$producto->stock}} disponibles)</span>
          </div>
          <div class="carritocompra">
            @auth
            <button>
                Comprar
            </button>

            <button type="submit">
                  Agregar al carrito
            </button>
            @else
              <h2>Tienes que estar logueado para poder realizar una compra</h2>
            @endauth
          </div>

          </form>
        </div>
        @endif
          


          </div>

      </div>

    </div>

    <div class="separador">
        <span>
          Mas articulos de la misma categoría
        </span>
    </div>
   
    <div class="containerAllProductos">
      <div id="carruselProductos" class="carousel slide" data-bs-ride="carousel">
        <div id="innerCarruselProd" class="carousel-inner">
          @foreach ($productos->chunk(4) as $chunk)
              @if ($loop->first)
                <div class="carousel-item active">
                  {{-- productos de la pagina del carrusel --}}
                  <div class="container4productos">
                    @foreach ($chunk as $producto)
                    <a href="/mi-tienda/producto/{{ $producto->id_producto }}" class="container1producto">
                      <div class="container1producto">
                        <div class="container1productoPic">
                          <img src="https://via.placeholder.com/640x480.png/CCCCCC?text={{$producto->nombre}}" alt="">
                        </div>
                        <div class="container1productoPrice">
                           ${{ $producto->precio_unitario }}
                           <span class="productName">{{ $producto->nombre }}</span>
                           
                        </div>
                    </div>
                    </a>
                        
                    @endforeach
                  </div>
                </div>
              @else
                <div class="carousel-item">
                  {{-- productos de la pagina del carrusel --}}
                  <div class="container4productos">
                    @foreach ($chunk as $producto)
                    <a href="/mi-tienda/producto/{{ $producto->id_producto }}" class="container1producto">
                      <div class="container1producto">
                        <div class="container1productoPic">
                          <img src="https://via.placeholder.com/640x480.png/CCCCCC?text={{$producto->nombre}}" alt="">
                        </div>
                        <div class="container1productoPrice">
                           ${{ $producto->precio_unitario }}
                           <span class="productName">{{ $producto->nombre }}</span>
                           
                        </div>
                    </div>
                    </a>
                    @endforeach
                  </div>
                </div>
              @endif
          @endforeach
        </div>
  
  
        <button class="carousel-control-prev botonCarrusel-left" type="button" data-bs-target="#carruselProductos" data-bs-slide="prev">
  
          {{-- ICONO Y MEDIOCIRCULO --}}
          <span class="material-symbols-outlined botonCarrusel" >
            arrow_back_ios
            </span>  
            <div class="half-circle left">
            </div>
  
           {{-- FIN ICONO Y MEDIOCIRCULO --}}
  
      <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next botonCarrusel-right" type="button" data-bs-target="#carruselProductos" data-bs-slide="next">
  
  
          {{-- ICONO Y MEDIOCIRCULO --}}
          <span class="material-symbols-outlined botonCarrusel">
            arrow_forward_ios
            </span>
            <div class="half-circle right">      
            </div>
           {{-- FIN ICONO Y MEDIOCIRCULO --}}
  
  
                              <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  
    @include('footer')

      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>