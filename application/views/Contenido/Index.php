<!DOCTYPE html>
<html>
<head>
	<title>Cadxela</title>
	<meta charset="utf-8">
</head>
<body>
 <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Cadxela</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
       
      </ul>
      <form class="form-inline mt-2 mt-md-0">
         <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
          <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="#">Registro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Login</a>
        </li>
      </ul>
      </form>
    </div>
  </nav>
</header>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%"  role="img"> <rect width="100%" height="100%" fill="#899"/></svg>
        <img src="<?php echo base_url();?>rec/images/banner-biblioteca.png">
        <div class="container">
          <div class="carousel-caption text-left">
           <!-- <h1>Biblioteca Escolar</h1>-->
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%"  focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
         <img src="<?php echo base_url();?>rec/images/x2.jpg">
        <div class="container">
          <div class="carousel-caption">
            <h1>Atrevete a leer</h1>
            <p>La lectura no da al hombre sabiduría; le da conocimientos</p>
           
          </div>
        </div>
      </div>

    </div>
  </div>

</main>