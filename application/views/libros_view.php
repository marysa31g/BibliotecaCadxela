<?php
  $mysqli = new mysqli('localhost', 'root', '', 'biblioteca');
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Agregar Libro</title>
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
    </head>
    <body>
        <center><h2>Agregar Libro</h2></center>
        <?php
            if($this->session->flashdata('correcto')){
                echo "<script type=\"text/javascript\">  alert(\"Libro agregado corectamente\");  </script>";
      }
   
            if($this->session->flashdata('incorrecto'))
             {
                echo "<script type=\"text/javascript\">  alert(\"Error al guardar libro\");  </script>";
      }
        ?>

        <form action="<?=base_url("Libros_controller/add");?>" method="post">
  <center>
    <table border="0">
         
            <tr><td>  Título: <br><br> </td><td><input type="text" name="titulo"  placeholder="Título" required /><br><br></td></tr>
            <tr><td> ISBN: <br><br></td><td><input type="text" name="ISBN" placeholder="ISBN" required/><br><br></td></tr>
            <tr><td>Número de ejemplar: <br><br></td><td><input type="number" name="numeroejemplar"  required/><br><br></td></tr>
            <tr><td>Páginas:<br><br></td><td><input type="number"  name="paginas" placeholder="Páginas" required/><br><br></td></tr>
            <tr><td>Editorial:  <br><br>   </td><td><input type="text"  name="editorial" placeholder="Editorial" required/><br><br></td></tr>
            <tr><td>Autor: <br><br></td> 
              <td>
              <select name="autor"> 
              <?php
                $query = $mysqli -> query ("SELECT * FROM autores");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[idautor].'">'.$valores[nombre].' '. $valores[apellido].'  </option>';
                
                }
              ?>
            
              </select>
            </td></tr>

            <tr><td></td><td><center><input class="btn btn-primary" type="submit" name="submit" value="Insertar Libro"/></center><br><br></td></tr>
           
      </table>
    </center>
<br><br>
<center>

    </body>
</html>