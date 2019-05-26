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
          <a class="nav-link" href="<?php echo base_url();?>welcome" >Home<span class="sr-only">(current)</span></a>
        </li>
        
        
      </ul>
    </form>
  </div>
</nav>
</header>
<br><br>
<center><h2>Usuarios</h2></center>
<?php
if($this->session->flashdata('correcto')){
  echo "<script type=\"text/javascript\">  alert(\"Usuario Guardado corectamente\");  </script>";
}

if($this->session->flashdata('incorrecto'))
{
  echo "<script type=\"text/javascript\">  alert(\"Error al guardar Usuario\");  </script>";
}
?>

<form action="<?=base_url("usuarios_controller/add");?>" method="post">
  <center>
    <table border="0">
     
      <tr><td>  Nombre: <br><br> </td><td><input type="nombre" name="nombre"  placeholder="Nombre" required /><br><br></td></tr>
      <tr><td> Apellido: <br><br></td><td><input type="apellido" name="apellido" placeholder="Apellido"required/><br><br></td></tr>
      <tr><td>Email: <br><br></td><td><input type="email" name="email" placeholder="name@example.com" required/><br><br></td></tr>
      <tr><td>Password:<br><br></td><td><input type="text"  name="password" placeholder="Password" required/><br><br></td></tr>
      <tr><td>Tipo de rol:  <br><br   </td><td><input type="text"  name="tiporol" placeholder="Tipo de rol" for="inputPassword2"required/><br><br></td></tr>
      <tr><td></td><td><center><input class="btn btn-primary" type="submit" name="submit" value="Insertar Usuario"/></center><br><br></td></tr>
      
    </table>
  </center>
  <br><br>
  <center>
    <table border="1" class="table table-striped">
     <thead>
       <tr>
        <th scope="col">
          ID
        </th>
        <th scope="col">
         Nombre
       </th>
       <th scope="col">
        Apellido
      </th>
      
      <th scope="col">
        Email
      </th>
      <th scope="col">
        Password
      </th>
      <th scope="col">
       Tipo de Rol
     </th>
     <th scope="col">
       configuracion
     </th>
   </tr>
 </thead>

 <?php foreach($ver as $fila){?>
  <tr>
    <td>
      <?=$fila->idusuario;?>
    </td>
    <td>
      <?=$fila->nombre;?>
    </td>
    <td>
      <?=$fila->apellido;?>
    </td>
    
    <td>
      <?=$fila->email;?>
    </td>
    <td>
      <?=$fila->password;?>
    </td>
    <td>
      <?=$fila->tiporol;?>
    </td>
    <td>
      <a class="btn btn-success" href="<?=base_url("usuarios_controller/mod/$fila->idusuario")?>">Modificar</a>
      <a class="btn btn-danger" href="<?=base_url("usuarios_controller/eliminar/$fila->idusuario")?>">Eliminar</a>
    </td>
  </tr>
  <?php
  
}
?>
</table>
</center>
</body>
</html>
