 {{-- arriba del header --}}
 <header>
        @auth

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
                <div class="insideHeader">
                <div class=" logoFull">
                    <div class="logoImg">
                        <a href="/mi-tienda"><img src="/img/logo.png" alt="" height="45px" >  </a>
                    
                </div>

                <div class="logoLetras">
                    <span>miTienda</span>      
                </div>
                </div>

                <div class="logoutIcon">
                    <a href=""><span class="material-symbols-outlined">
                    logout
                    </span></a>
                </div>
            
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
                <div class="insideUHitemsGroup">
                <div class="insideUHitem" style="width:35% !important">
                    <span class="material-symbols-outlined">
                    account_circle
                    </span>
                    <a href="#">Hernan</a>
                    <span class="material-symbols-outlined">
                    expand_more
                    </span>
                </div>
                <div class="insideUHitem" style="width:35% !important">
                    {{--  <span class="material-symbols-outlined" >
                    local_shipping
                    </span> --}}
                    <a href="#">Mis pedidos</a>
                </div>
                <div class="insideUHitem" style="width:30% !important">
                <span class="material-symbols-outlined" >
                    shopping_cart
                    </span>
                <a href="#">2</a>
            </div>
                </div>
                
            </div>
        </div>
</header>