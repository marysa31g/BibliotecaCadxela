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
<div class="container p-4">
 

  <div class="row mt-2 justify-content-center">

    <label class="col-form-label font-weight-bold">Introduce un libro:</label>
    <form class="form-inline form-100" method="POST" action="<?=base_url()?>buscarlibro/buscar">

     <div class="col-auto">
      <div class="form-group col-md-15">
        <input class="form-control input-100" type="text" name="inputLibro" placeholder="Buscar  un libro" />
      </div>
      <br>
      <div class="col-auto">
        <button id="buscar"  type="submit" class="btn btn-md btn-success">Buscar</button>
      </div>
    </div>
  </div>
</form>
<div class="row mt-5">
  <div class="col">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Titulo de libro</th>
          <th scope="col">TSBN</th>
          <th scope="col">Paginas</th>
          <th scope="col">Número de ejemplar</th>
          <th scope="col">Editorial</th>
          <th scope="col">Autor</th>
          <th scope="col">Apellido del Autor</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($Datos as $fila) {
          echo "<tr><td>".$fila->titulo."</td>".
          "<td>".$fila->ISBN."</td>".
          "<td>".$fila->paginas."</td>".
          "<td>".$fila->numeroejemplar."</td>".
          "<td>".$fila->editorial."</td>".
          "<td>".$fila->nombre."</td>".
          "<td>".$fila->apellido."</td>"."</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
