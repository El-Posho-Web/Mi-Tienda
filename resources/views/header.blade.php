 {{-- arriba del header --}}
 <header>
        @auth
        @else
        <div class="aboveHeader">
            <div class="insideAboveHeader">
                    <div class="loginRegister"> 
                        <a href="/mi-tienda/registro" style="font-size: 0.65rem">¡Registrate para empezar a comprar!</a>
                    </div>
            </div>
        </div> 
        @endauth


        {{-- header --}}
        <div class="header">
                <div class="insideHeader" 
                    @auth
                    @else
                    style="justify-content: start"
                    @endauth>

                <div class=" logoFull">
                    <div class="logoImg">
                        <a href="/mi-tienda"><img src="/img/logo.png" alt="" height="45px" >  </a>     
                </div>

                <div class="logoLetras">
                    <span>miTienda</span>      
                </div>
                </div>

                <div class="searchContainer"
                @auth
                @else
                style="margin-left: 10%"
                @endauth>
              
                <a href="" class="insideInput">
                    <span class="material-symbols-outlined insideInput">
                        search
                        </span>
                </a>
                
                    <input type="search" class="inputSearch" placeholder="Buscá aquí tus productos">
                </div>

                @auth

                <div class="logoutIcon">
                    <form action="/mi-tienda/logout" method="POST">
                        @csrf
                        <button type="submit" style="background-color:transparent; border:none; outline:none; color:#fff">
                            <span class="material-symbols-outlined">
                            logout
                            </span>
                        </button>
                    </form>
                   
                </div>
                @endauth
            </div>
        </div>

            {{-- debajo del header --}}
        <div class="underHeader">
            <div class="insideUnderHeader">
                <div class="insideUHitem" style="width:16%">
                <span class="material-symbols-outlined">
                    list
                    </span>
                    <a href="#" role="button" id="dropdownMenuCategorias" data-bs-toggle="dropdown" aria-expanded="false">Todas las categorías</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      @foreach ($categorias as $categoria)
                      <li><a class="dropdown-item" href="/mi-tienda/categoria/{{$categoria->nombre}}">{{$categoria->nombre}}</a></li>                     
                      @endforeach
    
                    </ul>
                    <span class="material-symbols-outlined">
                    expand_more
                    </span>
                </div>

                @auth
                <div class="insideUHitemsGroup">

                  
                        
                    {{-- item USUARIO --}}
                <div class="insideUHitem" style="width:35% !important">
                    <span class="material-symbols-outlined">
                    account_circle
                    </span>
                    <a href="#">{{$usuario->nombre}}</a>
                    <span class="material-symbols-outlined">
                    expand_more
                    </span>
                  </div>
                  

                 {{-- item PEDIDOS --}}
              
                <div class="insideUHitem" style="width:35% !important">
                    {{--  <span class="material-symbols-outlined" >
                    local_shipping
                    </span> --}}
                    <a href="/mi-tienda/mis-pedidos">Mis pedidos</a>
                </div>
            
                 


    


                <a href="/mi-tienda/carrito" class="insideUHitem" style="text-decoration: none; width:30%; color:rgb(100, 100, 100)">
                <div class="insideUHitem" style="width:100% !important; border:none !important;" >
                <span class="material-symbols-outlined" >
                    shopping_cart
                    </span>
                   @if (session()->has('carrito'))
                   {{count(session()->get('carrito'))}}

                   @else
                       0
                   @endif
                 </div>
                </a>
                </div>
                
                @else
                <div class="insideUHitemsGroup" style="width:20% ">
                <div class="insideUHitem" style="width:60% !important">
                    {{--  <span class="material-symbols-outlined" >
                    local_shipping
                    </span> --}}
                    <a href="/mi-tienda/registro">Creá una cuenta</a>
                </div>

                <div class="insideUHitem" style="width:40% !important">
                    {{--  <span class="material-symbols-outlined" >
                    local_shipping
                    </span> --}}
                    <a href="/mi-tienda/login">Ingresá</a>
                  </div>
                 </div>

                @endauth

            </div>
        </div>
</header>