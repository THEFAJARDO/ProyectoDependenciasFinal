<h1>DEPENDENCIA</h1>

<form method="post">
	
	
	<input type="text" placeholder="Codigo de dependencia" name="codigoRegistro" required>
	<input type="text" placeholder="Nombre de dependencia" name="nombreRegistro" required>
	<input type="text" placeholder="Sigla de dependencia" name="siglaRegistro" required>
    <input type="text" placeholder="Num de dependencia superior" name="superiorRegistro" >
   	<input type="text" placeholder="tipo de dependencia" name="tipoRegistro" required>

   	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
