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
<center><h2>Libros</h2></center>
<?php
if($this->session->flashdata('correcto')){
  echo "<script type=\"text/javascript\">  alert(\"Tarea ejecutada corectamente\");  </script>";
}

if($this->session->flashdata('incorrecto'))
{
  echo "<script type=\"text/javascript\">  alert(\"Tarea erronea\");  </script>";
}
?>
  <center>
    <table border="1" class="table table-striped">
     <thead>
       <tr>
        <th scope="col">
          Título
        </th>
        <th scope="col">
         ISBN
       </th>
       <th scope="col">
        Número ejemplar
      </th>
      <th scope="col">
        Páginas
      </th>
      <th scope="col">
       Editorial
     </th>
     <th scope="col">
       Autor
     </th>
     <th scope="col">
       Apellido
     </th>
     <th scope="col">
       Configuración
     </th>
   </tr>
 </thead>

 <?php foreach($ver as $fila){?>
  <tr>
    <td>
      <?=$fila->titulo;?>
    </td>
    <td>
      <?=$fila->ISBN;?>
    </td>
    <td>
      <?=$fila->numeroejemplar;?>
    </td>
    
    <td>
      <?=$fila->paginas;?>
    </td>
    <td>
      <?=$fila->editorial;?>
    </td>
    <td>
      <?=$fila->nombre;?>
    </td>
    <td>
      <?=$fila->apellido;?>
    </td>
    <td>
      <a class="btn btn-success" href="<?=base_url("libros_controller/mod/$fila->idlibro")?>">Modificar</a>
      <a class="btn btn-danger" href="<?=base_url("libros_controller/eliminar/$fila->idlibro")?>">Eliminar</a>
    </td>
  </tr>
  <?php
  
}
?>
</table>
</center>
</body>
</html>
