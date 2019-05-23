 <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Cadxela</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  </nav>
</header>
<div class="container p-4">
 

  <div class="row mt-2 justify-content-center">

    <label class="col-form-label font-weight-bold">Introduce un libro:</label>
    <form class="form-inline form-100" method="POST" action="<?php echo base_url("libros/buscarlibro") ?>">
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
            <th scope="col">Número</th>
            <th scope="col">Título</th>
            <th scope="col">ISB</th>
            <th scope="col">Número de ejemplar</th>
            <th scope="col">Páginas</th>
            <th scope="col">Editorial</th>
            <th scope="col">Opciones </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <?php 
        foreach($consulta->result() as $fila){ ?>
         <tr>
          <th scope="col"><?= $fila->idlibro;?></th>
          <th scope="col"><?= $fila->titulo;?></th>
          <th scope="col"><?= $fila->ISBN;?></th>
          <th scope="col"><?= $fila->numeroejemplar?></th>
          <th scope="col"><?= $fila->paginas;?></th>
          <th scope="col"><?= $fila->editorial;?></th>
          <td>
            <div>
             <a class="icon-views"></a>
           </div>
         </td>
       </tr>
     <?php }
     ?>
   </table>
 </div>
</div>
</div>

