

<h1>Lista Dependencias</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Sigla</th>
				<th>Codigo de dependencia Superior</th>
				<th>Tipo</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




