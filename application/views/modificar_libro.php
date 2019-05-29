<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Modificar libro</title>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/carousel.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/mystyle.css">
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
          <a class="nav-link" href="<?php echo base_url();?>welcome" >Home<span class="sr-only">(current)</span></a>
        </li>
        
        
      </ul>
    </form>
  </div>
</nav>
    <script type="text/javascript" src="<?php echo base_url();?>rec/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>rec/js/bootstrap.min.js"></script>
</head>
    </head>
    <body>
        <center>
        <h2>Modificar libro</h2>
        <br>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
            <table border="0">
         
            <tr><td>Título: <br><br> </td><td><input type="text" name="titulo" value="<?=$fila->titulo?>" required/><br><br></td></tr>
            <tr><td> ISBN: <br><br></td><td><input type="text" name="ISBN" value="<?=$fila->ISBN?>" required/><br><br></td></tr>
            <tr><td>Número ejemplar: <br><br></td><td><input type="number" name="numeroejemplar" value="<?=$fila->numeroejemplar?>" required/><br><br></td></tr>
            <tr><td>Páginas :<br><br></td><td><input type="number"  name="paginas" value="<?=$fila->paginas?>" required/><br><br></td></tr>
            <tr><td>Editorial:  <br><br>   </td><td><input type="text"  name="editorial" value="<?=$fila->editorial?>" required/><br><br></td></tr>
            <tr><td>Autor:  <br><br>   </td><td><input type="text"  name="nombre" value="<?=$fila->nombre?>" required/><br><br></td></tr>
            <tr><td>Apellido:  <br><br>   </td><td><input type="text"  name="apellido" value="<?=$fila->apellido?>" required/><br><br></td></tr>
            <tr><td></td><td><center><input class="btn btn-primary" type="submit" name="submit" value="Modificar"/></center><br><br></td></tr>
            <?php } ?> 
        </table>
        </form>
        <br>
       
    </center>
    </body>
</html>
