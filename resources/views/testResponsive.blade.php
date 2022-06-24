<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   



    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/columnas.css">
    <link rel="stylesheet" href="/css/responsiveIndex.css">

     {{-- ICONS --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">



    <title>Document</title>


<body>
{{-- header --}}

    <header>

                <div class="header">
                    
                       <div class="fila">

                        <div class="col-lg-2 col-md-1 col-sm-1 col-xs-1 logoFull" >
                        
                           
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 logoImg flex center">
                                        <a href="/mi-tienda"><img src="/img/logo.png" alt="" height="45px" >  </a>     
                                    </div>
                                
                                    <div class="col-lg-8 col-md-0 col-sm-0 col-xs-0 logoLetras">
                                        <span>miTienda</span>      
                                    </div>
    
                       </div>



                       <div class="col-lg-8 col-md-10 col-sm-10 col-xs-8  flex-r-center">   
                                <div class="col-lg-10 col-md-12 col-sm-12  col-xs-10">
                                    <input id="inputSearch" type="search" class="inputSearch" placeholder="Buscá aquí tus productos">

                                </div>
                       </div>

                       <div class="col-lg-2 col-md-1 col-sm-1 col-xs-3 flex-r-center sbt">
                                <div class="categorias col-lg-0 col-md-0 col-sm-0 col-xs-6 ">
                                    <span class="material-symbols-outlined">
                                        list
                                        </span>
                                    </div>
                               

                
                                   <div class="logoutIcon col-lg-12 col-md-6 col-sm-12 col-xs-6 ">
                                                
                                                <button  style="background-color:transparent; border:none; outline:none; color:#fff">
                                                            <span class="material-symbols-outlined">
                                                            logout
                                                            </span>    
                                                </button>      

                                    </div>
                       </div>

                </div>
            </div>

            <div class="underHeader col-xs-0">
                <div class="fila ">
                    <div class="col-lg-12 col-md-12 col-sm-12 " id="underHeaderRow">

                        <div class="col-lg-2 col-md-3 col-sm-3 ">
                            <a href="" class="flex-r-center uhItem" id="UHcategorias">Todas las categorias <span class="material-symbols-outlined">
                                expand_more
                                </span></a>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-5 flex">
                            <a href="" class="flex-r-center uhItem">Crea una cuenta </a>
                            <a href="" class="flex-r-center uhItem">Ingresa </a>
                        </div>
                       

                    </div>
                </div>
            </div>
    
        </header>

            {{-- header END--}}

            <div class="promos">
                <div class="fila">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="bordering">
                                  <div class="carousel-item active" >
                                    <img src="/img/promos/offer1.jpg" class="d-block carruselitem" " alt="..." >
                                  </div>
                                  <div class="carousel-item" >
                                    <img src="/img/promos/offer1.jpg" class="d-block carruselitem" " alt="...">
                                  </div>
                                  <div class="carousel-item" >
                                    <img src="/img/promos/offer1.jpg" class="d-block carruselitem"  "  alt="..." >
                                  </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                        
                    </div>
                </div>
            </div>

            <div class="productos">
                        <div class="fila">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 70vh">
                                    
                                                        
                                            <div id="carouselprod" class="carousel slide col-lg-12 col-md-12 col-sm-12 col-xs-12 flex center" data-bs-ride="carousel">

                                                <div class=" col-lg-11 col-md-11 col-sm-11 col-xs-12 " >
                                                    
                                                        <div class="carousel-item active col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-interval="100000">

                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                                                                        <div class="container1producto ">
                                                                            
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ xd1
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 " >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ xd2
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 " >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ aa
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12 " >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ 1dd
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                            
                                                        </div>

                                                        <div class="carousel-item  col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-interval="100000">

                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                <div class="container1producto">
                                                                    
                                                                    <div class="container1productoPic">
                                                                        <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                      </div>
                                                                      <div class="container1productoPrice">
                                                                         $ 1xd
                                                                         <span class="productName">Producto</span>
                                                                         
                                                                      </div>

                                                                </div>
                                                            </div>
                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                <div class="container1producto">
                                                                    <div class="container1productoPic">
                                                                        <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                      </div>
                                                                      <div class="container1productoPrice">
                                                                         $ 10d
                                                                         <span class="productName">Producto</span>
                                                                         
                                                                      </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                <div class="container1producto">
                                                                    <div class="container1productoPic">
                                                                        <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                      </div>
                                                                      <div class="container1productoPrice">
                                                                         $ 1000
                                                                         <span class="productName">Producto</span>
                                                                         
                                                                      </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                <div class="container1producto">
                                                                    <div class="container1productoPic">
                                                                        <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                      </div>
                                                                      <div class="container1productoPrice">
                                                                         $ 1000
                                                                         <span class="productName">Producto</span>
                                                                         
                                                                      </div>
                                                                </div>
                                                            </div>
                                                    
                                                </div> <div class="carousel-item  col-lg-12 col-md-12 col-sm-12 col-xs-12" data-bs-interval="100000">

                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                                        <div class="container1producto">
                                                                            
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ 1000
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ 1000
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ 1000
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                                                        <div class="container1producto">
                                                                            <div class="container1productoPic">
                                                                                <img src="https://via.placeholder.com/640x480.png/CCCCCC?text=imagen" alt="">
                                                                              </div>
                                                                              <div class="container1productoPrice">
                                                                                 $ 1000
                                                                                 <span class="productName">Producto</span>
                                                                                 
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                            
                                                        </div>

                                                </div>
                                                </div>


                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselprod" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselprod" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                </div>
                        </div>
            </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>