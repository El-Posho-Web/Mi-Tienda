<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <title>Ingresar</title>
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
  <p id="registerTittle">Ingresar</p>
  <form action="/signup" method="POST">


    

    <div class="div2InputsContainer">

      <div class="divInputPlusLabel">
        <label for="">Correo Electronico</label>
        <input class="inputSignup" type="text" name="email" id="" placeholder="Tu correo" required>
      </div>


      <div class="divInputPlusLabel">
        <label for="">Contraseña</label>
        <input class="inputSignup" type="password" name="password" id="" placeholder="*****" required>
      </div>
    </div>

    

   


    

    <button id="buttonRegister" type="submit">Crear cuenta</button>

    <div class="div2InputsContainer" id="alreadyRegistered">
      ¿No tienes una cuenta?
      <a href="/registro" id="Logueate"> Registrate</a>

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
</html>