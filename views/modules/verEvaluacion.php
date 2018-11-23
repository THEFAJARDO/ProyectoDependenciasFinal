<h1>LISTA DE AUTOEVALUACIONES </h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>id Dependencia</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaAutoController();
			

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambioss"){

		echo "Cambio Exitoso";
	
	}

}

?>