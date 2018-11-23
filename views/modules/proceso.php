<h1>REGISTRO DE PROCESOS</h1>



<form method="post">
	<input type="text" placeholder="Numero de Dependencia" name="numDepRegistroCalificado" required>
	    <input type="text" placeholder="Resolucion" name="MenRegistroCalificado" required>
        <input type="text" placeholder="Vigencia" name="YearsRegistroCalificado" required>
        <input type="date" name="bdayStar" max="2050-12-31" min="1950-01-02">
        <input type="date" name="bdayEnd" max="2050-12-31" min="1950-01-02">
       
	<input type="text" placeholder="Tipo proceso" name="tipoProcesoCalificado" required>
	

   	<input type="submit" value="Enviar">

</form>


<?php

$proceso = new MvcController();
$proceso -> registroProcesoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okk"){

		echo "Registro Exitoso";
	
	}

}

?>
