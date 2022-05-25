<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     {{-- owncss --}}
     <link rel="stylesheet" href="/css/test.css">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
   


    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- ICONS --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <title>Inicio</title>
</head>
<body>

  @include('header')

    {{-- CARRUSEL PROMOS --}}
    <div class="carrusel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" id="bordering">
              <div class="carousel-item active">
                <img src="/img/promos/offer1.jpg" class="d-block w-100 carruselitem" style="object-fit:cover;" alt="..." >
              </div>
              <div class="carousel-item">
                <img src="/img/promos/offer2.jpg" class="d-block w-100 carruselitem" style="object-fit:cover;" alt="...">
              </div>
              <div class="carousel-item">
                <img src="/img/promos/offer3.jpg" class="d-block w-100 carruselitem"  style="object-fit:cover;" alt="..." >
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    {{-- END CARRUSEL PROMOS --}}
    


    
    {{-- carrusel de items  --}}
    @php
        $i = 0;
    @endphp
    @foreach ($categorias as $categoria)
      <a href="/mi-tienda/categoria/{{ $categoria->nombre }}"><div class="bannerCategoria bannerCategoria{{ $categoria->nombre }}" style="margin-top:3%">            
      </div></a>
      <div class="containerAllProductos">
            <div id="carruselProductos{{$i}}" class="carousel slide" data-bs-ride="carousel">
              <div id="innerCarruselProd" class="carousel-inner">
                @foreach ($categoria->productos->chunk(4) as $chunk)
                    @if ($loop->first)
                      <div class="carousel-item active">
                        {{-- productos de la pagina del carrusel --}}
                        <div class="container4productos">
                          @foreach ($chunk as $producto)
                          <a href="/mi-tienda/producto/{{ $producto->id_producto }}" class="container1producto">
                            <div class="container1producto">
                              <div class="container1productoPic">
                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text={{$categoria->nombre}}" alt="">
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
                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text={{$categoria->nombre}}" alt="">
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


              <button class="carousel-control-prev botonCarrusel-left" type="button" data-bs-target="#carruselProductos{{$i}}" data-bs-slide="prev">

                {{-- ICONO Y MEDIOCIRCULO --}}
                <span class="material-symbols-outlined botonCarrusel" >
                  arrow_back_ios
                  </span>  
                  <div class="half-circle left">
                  </div>

                 {{-- FIN ICONO Y MEDIOCIRCULO --}}

            <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next botonCarrusel-right" type="button" data-bs-target="#carruselProductos{{$i}}" data-bs-slide="next">
   
   
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
      @php
        $i++;
      @endphp
    @endforeach       
    {{-- end carrusel de items --}}



</body>
@include('footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>