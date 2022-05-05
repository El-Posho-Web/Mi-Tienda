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
  <title>Registrarse</title>
</head>
<body>


<!-- header -->
<div class="headerSignupContainer">
      <div class="headerSignupContainerInside">
        
        <div class="headerSignupContainerInside-Left">
          <img src="/img/avatar.png" alt="" height="60px">
        </div>

      </div>
</div>
<!-- header end -->

  

<div class="divBodySignup">

<div class="divBodySignup-Left">
</div>



<div class="divBodySignup-Right">
  <p id="registerTittle">Registrate</p>

  <form method="POST" action="/mi-tienda/registro">
    @csrf
    <div class="div2InputsContainer">
      <div class="divInputPlusLabel">
        <label for="">Nombre</label>
        <input class="inputSignup" type="text" name="nombre" id="nombre" placeholder="Tu nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
      </div>


      <div class="divInputPlusLabel">
        <label for="">Apellido</label>
        <input class="inputSignup" type="text" name="apellido" id="apellido" placeholder="Tu apellido" value="{{ old('apellido') }}" required>
      </div>
      @error('apellido')
      <p>{{ $message }}</p>
  @enderror
    </div>

    <div class="div2InputsContainer">
      <div class="divInputPlusLabel">
        <label for="">Correo Electronico</label>
        <input class="inputSignup" type="email" name="email" id="email" placeholder="Tu correo" value="{{ old('correo') }}" required>
        @error('email')
        <p>{{ $message }}</p>
    @enderror
      </div>


      <div class="divInputPlusLabel">
        <label for="">DNI</label>
        <input class="inputSignup" type="number" name="dni" id="dni" placeholder="Tu DNI" value="{{ old('dni') }}" required>
        @error('dni')
        <p>{{ $message }}</p>
    @enderror
      </div>
    </div>

    <div class="div2InputsContainer">

      <div class="divInputPlusLabel">
        <label for="">Contraseña</label>
        <input class="inputSignup" type="password" name="password" id="password" placeholder="Tu contraseña" required>
        @error('password')
        <p>{{ $message }}</p>
    @enderror
      </div>


      <div class="divInputPlusLabel">
        <label for="">Domicilio</label>
        <input class="inputSignup" type="text" name="domicilio" id="domicilio" placeholder="Tu domicilio" value="{{ old('domicilio') }}" required>
        @error('domicilio')
        <p>{{ $message }}</p>
    @enderror
      </div>

    </div>

    <button id="buttonRegister" type="submit">Crear cuenta</button>

    <div class="div2InputsContainer" id="alreadyRegistered">
      ¿Ya tienes una cuenta?
      <a href="/mi-tienda/login" id="Logueate"> Logueate</a>

    </div>

  </form>
</div>

</div>


</body>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>