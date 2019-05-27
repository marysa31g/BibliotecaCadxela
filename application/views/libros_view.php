<?php
  $mysqli = new mysqli('localhost', 'root', 'admin', 'biblioteca');
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Agregar Libro</title>
    </head>
    <body>
        <center><h2>Usuarios</h2></center>
        <?php
            if($this->session->flashdata('correcto')){
                echo "<script type=\"text/javascript\">  alert(\"Libro Guardado corectamente\");  </script>";
      }
   
            if($this->session->flashdata('incorrecto'))
             {
                echo "<script type=\"text/javascript\">  alert(\"Error al guardar Libro\");  </script>";
      }
        ?>

        <form action="<?=base_url("usuarios_controller/add");?>" method="post">
  <center>
    <table border="0">
         
            <tr><td>  Título: <br><br> </td><td><input type="text" name="nombre"  placeholder="Título" required /><br><br></td></tr>
            <tr><td> ISBN: <br><br></td><td><input type="text" name="apellido" placeholder="ISBN"required/><br><br></td></tr>
            <tr><td>Número de ejemplar: <br><br></td><td><input type="number" name="numeroejemplar"  required/><br><br></td></tr>
            <tr><td>Páginas:<br><br></td><td><input type="number"  name="paginas" placeholder="Páginas" required/><br><br></td></tr>
            <tr><td>Editorial:  <br><br>   </td><td><input type="text"  name="editorial" placeholder="Editorial" required/><br><br></td></tr>
            <tr><td>Autor: <br><br></td> 
              <td>
              <select name="autor"> 
              <?php
                $query = $mysqli -> query ("SELECT * FROM autores");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[idautor].'">'.$valores[nombre].'</option>';
                
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