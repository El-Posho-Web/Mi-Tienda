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
  @include('head')
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <title>Ingresar</title>
</head>
<body>


@include('header')
  

  

<div class="divBodySignup">

<div class="divBodySignup-Left">
</div>



<div class="divBodySignup-Right">
  <p id="registerTittle">Ingresar</p>
  <form action="/mi-tienda/login" method="POST">
    @csrf

    

    <div class="div2InputsContainer">

      <div class="divInputPlusLabel">
        <label for="">Correo Electronico</label>
        <input class="inputSignup" type="email" name="email" id="email" placeholder="Tu correo" value="{{ old('correo') }}" required>
        @error('email')
        <p>{{ $message }}</p>
    @enderror
      </div>


      <div class="divInputPlusLabel">
        <label for="">Contraseña</label>
        <input class="inputSignup" type="password" name="password" id="password" placeholder="*****" required>
        @error('password')
        <p>{{ $message }}</p>
        @enderror
      </div>
    </div>

    

   


    

    <button id="buttonRegister" type="submit">Ingresar</button>

    <div class="div2InputsContainer" id="alreadyRegistered">
      ¿No tienes una cuenta?
      <a href="/mi-tienda/registro" id="Logueate"> Registrate</a>

    </div>

  </form>
</div>

</div>

</body>
@include('footer')

</html>