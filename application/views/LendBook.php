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
          <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link " href="#">Login</a>
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="matricula" class="col-form-label">Matrícula:</label>
            <input type="text" class="typeahead form-control" id="matricula" placeholder="Matricula del Estudiante">
           
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewlends" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Lista de prestamos</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
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

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Libro: ' + title)
        
      });

      $('#viewlends').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var title = button.data('titlebook') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Libro: ' + title)
        
      });
          
      $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get('LendBook/autocomplete/', { query: query }, function (data) {
                console.log(data);
                data = $.parseJSON(data);
                return process(data);
            });
        }
    });


	} );

</script>