 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 	
 <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Cadxela Admin</a>
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
<p></p>

<div class="container">

	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Título</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Páginas</th>
                <th>Editorial</th>
                <th>Préstamos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Título</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Páginas</th>
                <th>Editorial</th>
                <th>Préstamos</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>

</div>

<div class="modal fade" id="lend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form id="formlend" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
          <datalist id="autocompletado" >

          </datalist>
            <label for="matricula" class="col-form-label">Matrícula del Estudiante:</label>
            <input type="text" list="autocompletado" class="form-control" name="matricula" id="matricula" autocomplete="off" placeholder="Matrícula">
           
            <input type="hidden" name="idbook" id="idbook" value="">
            <br>
            <div class="alert alert-danger" id="userfail" role="alert">
                Usuario no Encontrado
            </div>
           
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="savelend" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade bd-modal-lg" id="viewlends" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
          <table id="lista_prestamos" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>Matricula</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha Préstamo</th>
                      <th>Fecha Límite</th>
                      
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Matricula</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha Préstamo</th>
                      <th>Fecha Límite</th>
                  </tr>
              </tfoot>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
      
      $('#example').dataTable({
        "ajax": {
            "type" : "GET",
            "url" : "LendBook/getList",
            "dataSrc": function ( json ) {
                return json.data;
            }       
            },
            "columns": [
	                { "data": "titulo" },
                  { "data": "ISBN" },
                  { "data": "numeroejemplar" },
                  { "data": "paginas" },
                  { "data": "editorial" },
                  { "data": "prestamos" },
                  { "data": "actions" }       
	            ]
        
      });

      //Modal
      $('#lend').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var title = button.data('titlebook') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-title').text('Libro: ' + title)
        modal.find('#idbook').val(id)
        $("#userfail").hide();

        $("#autocompletado").html("");
        $("#matricula").val("");
        $("#savelend").attr("disabled",true);
      });

      $('#viewlends').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var title = button.data('titlebook') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-title').text('Préstamos de:  ' + title)
        
        //Reiniciar los datos del datatable
        var table = $('#lista_prestamos').DataTable();
        table.destroy();

        $.ajax({
          url:"LendBook/get_lends/",
          type:"POST",
          dataType:"JSON",
          data:{idb:id},
          beforeSend: function(){
            console.log("Beforesend: "+id);
          },
          success:function(response){
            console.log(response.data);

            $('#lista_prestamos').dataTable({
                  data:response.data,
                  "columns": [
                        { "data": "matricula" },
                        { "data": "nombre" },
                        { "data": "apellido" },
                        { "data": "inicio" },
                        { "data": "fin" }         
                    ]
            });

          }
        })
        
      });
       
      //Generar el datalist de sugerencias de usuarios
     $("#matricula").keyup(function(){
        var value=$("#matricula").val();
        if(value!=""){
          $.ajax({
            url:"LendBook/autocomplete/",
            data:{query:value},
            type:"POST",
            
            success:function(response){
              console.log("response: "+response);
              if(response=="1"){
                $("#userfail").hide();
                //success
                $("#savelend").attr("disabled",false);
              }else{
                $("#savelend").attr("disabled",true);
                $("#userfail").show();
                $("#autocompletado").html(response);
              }
                
            }

          });
        }
      });
      //Capturar el evento en caso de seleccionar una opcion del datalist
      $("#matricula").change('input', function () {
        $("#savelend").attr("disabled",false);
       
      });

      //submit form save lend
      $("#formlend").submit(function(e){
        var idu=$('#matricula').val();
        var idb=$("#idbook").val();
        $.ajax({
            url:"LendBook/saveLend/",
            type:"POST",
            data:{idbook:idb,matricula:idu},
            success:function(response){
                console.log(response);
            }
        })
      })

	} );

</script>