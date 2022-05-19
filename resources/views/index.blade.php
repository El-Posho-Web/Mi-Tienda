<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <title>Mi Tienda</title>
</head>
<body>
      <!-- header -->
      
      <header class="p-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <img src="/img/avatar.png" alt="" height="60px">
            </a> 
            @auth
            <!-- <div class="dropdown text-end ms-auto">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <img src="..." alt="mdo" width="32" height="32" class="rounded-circle"> --}}
              </a> -->
              

              <div class="dropdown text-end ms-auto">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            {{$usuario->nombre}}
          </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
              <li><h6 class="dropdown-item">U: {{$usuario->nombre}}</h6></li>
                    <li><h6 class="dropdown-item">R: </h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><form method="POST" action="/mi-tienda/logout" >
                      @csrf
                      <button type="submit" class="dropdown-item">Cerrar Sesion</button></li>
                  
                </ul>
              </div>

             <!--  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><h6 class="dropdown-item">U: {{$usuario->nombre}}</h6></li>
                <li><h6 class="dropdown-item">R: </h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><form method="POST" action="/mi-tienda/logout" >
                  @csrf

                  <button type="submit" class="dropdown-item">Cerrar Sesion</button></li>
              </ul> -->

            </div>
            @else
            <a href="/mi-tienda/login" class="nav-link px-2 link-dark ms-auto">Ingresar</a>
            @endauth  
          </div>
        </div>
      </header>
      <nav class="bg-light py-3 border-bottom">
        <div class="container d-flex flex-wrap">
          <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              @foreach ($categorias as $categoria)
              <li><a class="dropdown-item" href="/mi-tienda/categoria/{{$categoria->nombre}}">{{$categoria->nombre}}</a></li>
              @endforeach
            </ul>
          </div>
          @auth
            <ul class="nav ms-auto">
              <li class="nav-item"><a href="#" class="nav-link link-dark px-2 ms-auto">Mis pedidos</a></li>
              <li class="nav-item"><a href="/mi-tienda/carrito" class="nav-link link-dark px-2">Mi carrito de compras</a></li>
            </ul>     
          @endauth  
{{--           <a href="#" class="nav-link link-dark px-2 ms-auto">Mis pedidos</a>
          <a href="#" class="nav-link link-dark px-2 ms-auto">Mis pedidos</a> --}}
        </div>
      </nav>
      <!-- header end -->

      @if (session()->has('correcto'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('correcto') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('productoexiste'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('productoexiste') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('compracancelada'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('compracancelada') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('comprarealizada'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('comprarealizada') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('sinstock'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sinstock') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="container">
        <div class="row row-cols-4">
          @foreach ($productos as $producto)       
          <div class="col mt-5">
            <div class="card" style="width: 18rem;">
              <img src="/img/Redsquare.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $producto->categoria->nombre }}</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/mi-tienda/producto/{{ $producto->id_producto }}" class="btn btn-light">Detalles</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

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

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>