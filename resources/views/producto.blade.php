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
                <li>
                <form method="POST" action="/mi-tienda/logout" >
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
      <div class="container vh-100 mt-3">
        <div class="container w-75 h-100 bg-light rounded">
            <div class="flex">
                <ul>
                    <li>
                        <h6>Categoria {{$producto->categoria->nombre}}</h6>
                    </li>
                    <li>
                        <h5>Nombre {{$producto->nombre}}</h5>
                    </li>
                    <li>
                        Descripcion {{$producto->descripcion}}
                    </li>
                    <li>
                        Stock {{$producto->stock}}
                    </li>
                    <li>
                        Precio ${{$producto->precio_unitario}}
                    </li>
                </ul>
                  @if ($producto->stock === 0)
                      <h2>No hay stock del producto</h2>
                  @else
                      
                  <form method="POST" action="/mi-tienda/carrito/agregar/{{$producto->id_producto}}" >
                      @csrf
                      <input type="number" id="cantidad" name="cantidad" min="1" max="{{$producto->stock}}" value="1" onkeydown="return false">
                      <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                  </form>
                  @endif
            </div>
          </div>
      </div>


      <div class="container bottom-0 end-0">
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