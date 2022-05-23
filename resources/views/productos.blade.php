<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @include('head')
  <link rel="stylesheet" href="/css/ListaProd.css">

  {{-- PONER EL NOMBRE DE LA CATEGORIA --}}
  <title>Productos de Categoria</title>
</head>

<body>
  @include('header')
   
  
  {{-- <div class="bannerCategoria bannerCategoria{{ $categorias->nombre }}" style="margin-top:3%">            
  </div> --}}
  <div class="base">
    <div class="filtersContainer">
        <div class="filtersItems">

          <H2>Sub Categorias</H2>
            <a href="">Subcategoria 1</a>
            <a href="">Subcategoria 1</a>
            <a href="">Subcategoria 1</a>
            
        </div>
    </div>
          <div class="allElementsContainer">
            
            @foreach ($productos as $producto)
            <a href="/mi-tienda/producto/{{ $producto->id_producto }}">
              <div class="ItemCont">
                <div class="ItemContPic">
                  <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=" alt="">
                </div>
                <div class="ItemContDesc">  
                  <div class="itemDescNombre">
                    <h1>{{$producto->nombre}}
                    </h1>
                  </div>
                  <div class="itemDescPrecio">
                    <span>$ {{$producto->precio_unitario}}</span>
                  </div>
  
                </div>
  
        </div>
        @endforeach
            </a>
             
          {{$productos->links()}}
  
          </div>
  </div>
  

  

     
        
            
        
       
      
      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
@include('footer')

</html>