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

  <label class="col-form-label font-weight-bold">Libros Prestados</label>
  
  <br>
  
</div>
</div>


<div class="row mt-5">
  <h2></h2>
  <div class="col">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Matrícula</th>
          <th scope="col">Fecha Prestamo</th>
          <th scope="col">Fecha Límite</th>
          <th scope="col">Fecha Devolucion</th>
          
        </tr>
      </thead>
      <tbody>
      </tbody>
      <?php 
      foreach($consulta->result() as $fila){ ?>
       <tr>
        <th scope="col"><?= $fila->matricula;?></th>
        <th scope="col"><?= $fila->fechaprestamo;?></th>
        <th scope="col"><?= $fila->fechalimite;?></th>
        <th scope="col"><?= $fila->fechadevolucion?></th>
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

