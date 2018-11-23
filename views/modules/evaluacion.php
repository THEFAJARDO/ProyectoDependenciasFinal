<h1>REGISTRO DE AUTOEVALUACION</h1>



<form method="post">
	<input type="text" placeholder="Numero de Dependencia" name="numDepAuto" required>
	    
        <input type="date" name="bdayStar1" max="2050-12-31" min="1950-01-02">
        <input type="date" name="bdayEnd1" max="2050-12-31" min="1950-01-02">
       
	
	

   	<input type="submit" value="Enviar">

</form>


<?php

$proceso = new MvcController();
$proceso -> registroAutoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okkk"){

		echo "Registro Exitoso";
	
	}

}

?>
