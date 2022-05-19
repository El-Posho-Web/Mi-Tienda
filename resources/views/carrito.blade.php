<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="dropdown text-end ms-auto">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <img src="..." alt="mdo" width="32" height="32" class="rounded-circle"> --}}
                Mi Cuenta
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><h6 class="dropdown-item">U: {{$usuario->nombre}}</h6></li>
                <li><h6 class="dropdown-item">R: </h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><form method="POST" action="/mi-tienda/logout" >
                  @csrf
                  <button type="submit" class="dropdown-item">Cerrar Sesion</button></li>
                </form>
              </ul>
            </div>
            @else
            <a href="/mi-tienda/login" class="nav-link px-2 link-dark ms-auto">Ingresar</a>
            @endauth  
          </div>
        </div>
      </header>
      <nav class="bg-light py-3 border-bottom">
        <div class="container d-flex flex-wrap">
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
      @php
          $total = 0;
      @endphp
      @if (session()->has('carrito'))
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($carrito as $producto => $valor)
                <tr>
                  <td>{{ $valor['nombre'] }}</td>
                  <td>{{ $valor['descripcion'] }}</td>
                  <td>{{ $valor['cantidad'] }}</td>
                  <td>{{ $valor['total'] }}</td>
                  <td><form method="POST" action="/mi-tienda/carrito/eliminar">@csrf  <input type="hidden" name="id_producto" id="id_producto" value="{{$producto}}"><button class="btn">Eliminar</button></form></td>
                </tr>
                @php
                    $total = $total + $valor['total'];
                @endphp
                @endforeach
                <td colspan="4">Total: ${{ $total }}</td>
                <td><a href="/mi-tienda/carrito/confirmar" class="btn">Finalizar compra</a></td>
              </tbody>
            </table>
          </div>
      @else
          <h1>No tienes productos en el carrito</h1>
      @endif

      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>