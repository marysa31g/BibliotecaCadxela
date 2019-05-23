
<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="#">Cadxela</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	</nav>
</header>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8">
			<h3>Lista de Libros en Prestámo</h3>
			<div class="form-group">
				

				<table class="table table-bordered" id="tablaPrestamos">
					<thead>
						<tr>
							<th scope="col">Matrícula</th>
							<th scope="col">Fecha de Préstamos</th>
							<th scope="col">Fecha Limite</th>
							<th scope="col">Fecha Devolución</th>
						</tr>
					</thead>
					<?php 
					try{
						if(isset($Prestamos)){
							foreach($Prestamos as $prestamos){
								?> <tr>
									<td><?=$prestamos->matricula?></td>
									<td><?=$prestamos->fechaprestamo?></td>
									<td><?=$prestamos->limite?></td>
									<td><?=$prestamos->fechadevolucion?></td>
								</tr>
								<?php
							}
						}
					}catch(Exception $e){
						var_dump($e->getMessage());
					}
					?>
				</table>
			</div>		
		</div>
	</div>
</body>

<?php $this->load->view('headerfoop/foop'); ?>
<script>
	$(document).ready(function(){
		$("#InputBuscar").keyup(function(){
			_this = this;
			$.each($("#tablaPrestamos tbody tr"), function() {
				if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
					$(this).hide();
				else
					$(this).show();
			});
		});
	});
</script>