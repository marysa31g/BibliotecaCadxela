
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
			<h3>Lista de Adeudos</h3>
			<div class="form-group">
				
				
				<table class="table table-bordered" id="tablaAdeudos">
					<thead>
						<tr>
							<th scope="col">Matrícula</th>
							<th scope="col">Descripción del adeudo</th>
							<th scope="col">Fecha del Adeudo</th>
							<th scope="col">Fecha de Reposición</th>
						</tr>
					</thead>
					<?php 
					try{
						if(isset($Prestamos)){
							foreach($Prestamos as $adeudos){
								?> <tr>
									<td><?=$adeudos->matricula?></td>
									<td><?=$adeudos->descripcionadeudo?></td>
									<td><?=$adeudos->fechaadeudo?></td>
									<td><?=$adeudos->fechareposicion?></td>
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
			$.each($("#tablaAdeudos tbody tr"), function() {
				if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
					$(this).hide();
				else
					$(this).show();
			});
		});
	});
</script>
