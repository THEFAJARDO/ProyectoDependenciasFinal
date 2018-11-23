

<h1>Lista Procesos</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>id Dependencia</th>
				<th>Numero de Resolucion</th>
				<th>Vigencia</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Tipo Proceso</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaProcesos = new MvcController();
			$vistaProcesos -> vistaProcesosController();
			

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambios"){

		echo "Cambio Exitoso";
	
	}

}

?>