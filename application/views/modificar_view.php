<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Modificar usuarios</title>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/carousel.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>rec/css/mystyle.css">
    <script type="text/javascript" src="<?php echo base_url();?>rec/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>rec/js/bootstrap.min.js"></script>
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
</head>
    </head>
    <body>
        <center>
        <h2>Modificar usuario</h2>
        <br>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
            <table border="0">
         
            <tr><td>  Nombre: <br><br> </td><td><input type="nombre" name="nombre" value="<?=$fila->nombre?>" required/><br><br></td></tr>
            <tr><td> Apellido: <br><br></td><td><input type="apellido" name="apellido" value="<?=$fila->apellido?>" required/><br><br></td></tr>
            <tr><td>Email: <br><br></td><td><input type="email" name="email" value="<?=$fila->email?>" required/><br><br></td></tr>
            <tr><td>Password:<br><br></td><td><input type="text"  name="password" value="<?=$fila->password?>" required/><br><br></td></tr>
            <tr><td>Tipo de rol:  <br><br   </td><td><input type="text"  name="tiporol" value="<?=$fila->tiporol?>" required/><br><br></td></tr>
            <tr><td></td><td><center><input class="btn btn-primary" type="submit" name="submit" value="Modificar"/></center><br><br></td></tr>
            <?php } ?> 
        </table>
        </form>
        <br>
       
       <a class="btn btn-success" href="<?=base_url()?>">Volver</a>
    </center>
    </body>
</html>
