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

            {{-- guarda todos los elementos --}}
      <div class="generalCont">
            {{-- caja contenedora del nav --}}
          <div class="carritoNav">
            {{-- items del nav(carrito,guardados) --}}
                  <div class="itemNav">
                      <span>Pendientes</span>
                  </div>
                  <div class="itemNav">
                      <a href="#" style="text-decoration: none; color:black">Realizados</a>
                  </div>
                  <div class="itemNav">
                    <a href="#" style="text-decoration: none; color:black">Cancelados</a>
                  </div>
          </div>

          {{-- caja contenedora de los items del Carrito(productos en si) --}}
          @php
              $i = 0;
          @endphp
          <div class="ItemsCont mb-5">
            @if (count($compras) != 0)
            @foreach ($compras as $compra)
            <div class="accordion" id="accordionPanelsStayOpenExample{{$i}}">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne{{$i}}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne{{$i}}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne{{$i}}">
                    Compra
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne{{$i}}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne{{$i}}">
                  <div class="accordion-body">
                    @foreach ($compra->productos as $producto)
                    <div class="itemCarritoPicDesc mb-3">
                      <div class="itemCarritoPic">
                          <img src="https://via.placeholder.com/200x100.png/CCCCCC?text=" alt="">
                      </div>
                      <div class="itemCarritoDesc">
                          <span>
                            {{$producto->nombre}}
                          </span>
                      </div>

                      <div class="itemCarritoCantidad">
                        <input type="number" name="cantidad" id="cantidad" class="inputStock" min="1" step="1" value="{{$producto->pivot->cantidad}}" disabled>
                        {{-- <span style="margin-left:2%; font-size:0.9rem; color:rgb(137, 137, 137)">({{$producto['cantidad']}} disponibles)</span> --}}
                      </div>
                      
                      <div class="itemCarritoPrecio">
                        <span>${{$producto->precio_unitario}}</span>
                      </div>
                      
                    </div>
                    
                    @endforeach
                    <div class="itemCarritoPrecio ms-auto">
                      <span>Total: ${{$compra->precio_total}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @php
                $i++;
            @endphp
            @endforeach

            @else
            <div class="itemCarrito">
              <h2>No tienes envios</h2>
            </div>
            @endif

          </div>
          
      </div>      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
@include('footer')

</html>