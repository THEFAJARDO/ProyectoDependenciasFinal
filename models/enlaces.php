<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

		if($enlaces == "ingresar" || $enlaces == "usuarios"|| $enlaces == "proceso"|| $enlaces == "evaluacion"|| $enlaces == "verProcesos" || $enlaces == "verEvaluacion"|| $enlaces == "editar" || $enlaces == "salir"){
			$module =  "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/registro.php";
		}
		else if($enlaces == "ok"){
			$module =  "views/modules/registro.php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/proceso.php";
		}
		else if($enlaces == "okk"){
			$module =  "views/modules/proceso.php";
		}
		else if($enlaces == "okkk"){
			$module =  "views/modules/evaluacion.php";
		}
		else if($enlaces == "fallo"){
			$module =  "views/modules/ingresar.php";
		}
		else if($enlaces == "cambio"){
			$module =  "views/modules/usuarios.php";
		}
		else if($enlaces == "cambios"){
			$module =  "views/modules/verProcesos.php";
		}
		else if($enlaces == "cambioss"){
			$module =  "views/modules/verEvaluacion.php";
		}
		else{
			$module =  "views/modules/registro.php";
		}
		return $module;
	}

}

?>