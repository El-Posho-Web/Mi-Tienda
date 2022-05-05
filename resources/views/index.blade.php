<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <title>Mi Tienda</title>
</head>
<body>
      <!-- header -->
      <div class="headerSignupContainer">
            <div class="headerSignupContainerInside">
              
              <div class="headerSignupContainerInside-Left align-items-center"">
                <img src="/img/avatar.png" alt="" height="60px">
              </div>
            </div>
            @auth
              <div class="d-flex align-items-center justify-content-end">
                <div class="p-2 bd-highlight"><form method="POST" action="/mi-tienda/logout" >
                  @csrf
                  <button type="submit" class="btn btn-outline-primary">Cerrar Sesion</button>
              </div>
              @else
              <div class="d-flex align-items-center justify-content-end">
                <div class="p-2 bd-highlight"><a href="/mi-tienda/login" type="button" class="btn btn-outline-primary">Ingresar</a></div>
              </div>
            @endauth
            
      </div>
      <!-- header end -->
      @if (session()->has('correcto'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('correcto') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>