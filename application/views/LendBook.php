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
<?php echo($data);?>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Título</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Páginas</th>
                <th>Editorial</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Título</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Páginas</th>
                <th>Editorial</th>
            </tr>
        </tfoot>
    </table>

</div>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {

    	 $.ajax({
	        url: "LendBook/getList",
	        success : function(data) {
	        	
	            var o = JSON.parse(data);//A la variable le asigno el json decodificado
	            $('#example').dataTable( {
	                data : o,
	                columns: [
	                    { "data": "titulo" },
                      { "data": "ISBN" },
                      { "data": "numeroejemplar" },
                      { "data": "paginas" },
                      { "data": "editorial" }       
	                ],
	            });
	        }       
	    });

    	
	} );

</script>