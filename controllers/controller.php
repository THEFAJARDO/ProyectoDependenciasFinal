<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	#REGISTRO DE Dependencias
	#------------------------------------
	public function registroUsuarioController(){

		
		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "codigo"=>$_POST["codigoRegistro"], 
								      "nombre"=>$_POST["nombreRegistro"],
								      "sigla"=>$_POST["siglaRegistro"],
                                      "superior"=>$_POST["superiorRegistro"],
								      "tipo"=>$_POST["tipoRegistro"]
								  );
			
			$respuesta = Datos::registroUsuarioModel($datosController, "dependencia");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}


	}

	#REGISTRO DE Procesos
	#------------------------------------
	public function registroProcesoController(){

		
		if(isset($_POST["numDepRegistroCalificado"])){

			$datosController = array( "dependencia_id"=>$_POST["numDepRegistroCalificado"], 
								      "num"=>$_POST["MenRegistroCalificado"],
								      "vigencia"=>$_POST["YearsRegistroCalificado"],
                                      "fecha_inicio"=>$_POST["bdayStar"],
								      "fecha_fin"=>$_POST["bdayEnd"],
								      "tipoproceso"=>$_POST["tipoProcesoCalificado"],
								  );
			
			$respuesta = Datos::registroProcesoModel($datosController, "proceso");

			if($respuesta == "success"){

				header("location:index.php?action=okk");

			}

			else{

				header("location:index.php");
			}

		}


	}

		#REGISTRO DE AUTOEVALUACION
	#------------------------------------
	public function registroAutoController(){

		
		if(isset($_POST["numDepAuto"])){

			$datosController = array( "dependencia_id"=>$_POST["numDepAuto"],
                                      "fecha_inicio"=>$_POST["bdayStar1"],
								      "fecha_fin"=>$_POST["bdayEnd1"]
								      
								  );
			
			$respuesta = Datos::registroAutoModel($datosController, "autoevaluacion");

			if($respuesta == "success"){

				header("location:index.php?action=okkk");

			}

			else{

				header("location:index.php");
			}

		}


	}

	#VISTA DE Dependencias
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("dependencia");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["codigo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["sigla"].'</td>
				<td>'.$item["superior"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editar&codigo='.$item["codigo"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&codigoBorrar='.$item["codigo"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR DEPENDENCIA
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["codigo"];
		$respuesta = Datos::editarUsuarioModel($datosController, "dependencia");

		echo'<input type="text" value="'.$respuesta["codigo"].'" name="codigoEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="text" value="'.$respuesta["sigla"].'" name="siglaEditar" required>

			 

              
              <input type="text" value="'.$respuesta["superior"].'" name="superiorEditar" required >

              <input type="text" value="'.$respuesta["tipo"].'" name="tipo" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR DEPENDENCIAS
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "codigo"=>$_POST["codigoEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                      "sigla"=>$_POST["siglaEditar"],
				                      "superior"=>$_POST["superiorEditar"],
				                      "tipo"=>$_POST["tipo"]
				                  );
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "dependencia");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}


	#VISTA DE PROCESOS
	#------------------------------------

	public function vistaProcesosController(){

		$respuesta = Datos::vistaProcesoModel("proceso");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["dependencia_id"].'</td>
				<td>'.$item["num"].'</td>
				<td>'.$item["vigencia"].'</td>
				<td>'.$item["fecha_inicio"].'</td>
				<td>'.$item["fecha_fin"].'</td>
				<td>'.$item["tipoproceso"].'</td>
				<td><a href="index.php?action=editar&dependencia_id='.$item["dependencia_id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&codigoBorrar='.$item["dependencia_id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR PROCESO
	#------------------------------------

	public function editarProcesoController(){

		$datosController = $_GET["dependencia_id"];
		$respuesta = Datos::editarProcesoModel($datosController, "proceso");

		echo'<input type="text" value="'.$respuesta["dependencia_id"].'" name="dependencia_idEditar">

			 <input type="text" value="'.$respuesta["num"].'" name="numEditar" required>

			 <input type="text" value="'.$respuesta["vigencia"].'" name="vigenciaEditar" required>

			 

              
              <input type="text" value="'.$respuesta["fecha_inicio"].'" name="fecha_inicioEditar" required >

              <input type="text" value="'.$respuesta["fecha_fin"].'" name="fecha_finEditar" required>
              <input type="text" value="'.$respuesta["tipoproceso"].'" name="tipoprocesoEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR PROCESO
	#------------------------------------
	public function actualizarProcesoController(){

		if(isset($_POST["dependencia_idEditar"])){

			$datosController = array(
				                      "dependencia_id"=>$_POST["dependencia_idEditar"], 
								      "num"=>$_POST["numEditar"],
								      "vigencia"=>$_POST["vigenciaEditar"],
                                      "fecha_inicio"=>$_POST["fecha_inicioEditar"],
								      "fecha_fin"=>$_POST["fecha_finEditar"],
								      "tipoproceso"=>$_POST["tipoprocesoEditar"],
				                  );
			
			$respuesta = Datos::actualizarProcesoModel($datosController, "proceso");

			if($respuesta == "success"){

				header("location:index.php?action=cambios");

			}

			else{

				echo "error";

			}

		}
	
	}
 	#VISTA DE Autoevaluacion
	#------------------------------------

	public function vistaAutoController(){

		$respuesta = Datos::vistaAutoModel("autoevaluacion");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["dependencia_id"].'</td>
				<td>'.$item["fecha_inicio"].'</td>
				<td>'.$item["fecha_fin"].'</td>
				<td><a href="index.php?action=editar&dependencia_id='.$item["dependencia_id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&codigoBorrar='.$item["dependencia_id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR EVALUACIONES
	#------------------------------------

	public function editarAutoController(){

		$datosController = $_GET["dependencia_id"];
		$respuesta = Datos::editarAutoModel($datosController, "autoevaluacion");

		echo'<input type="text" value="'.$respuesta["dependencia_id"].'" name="dependencia_idEditar">

			

              
              <input type="text" value="'.$respuesta["fecha_inicio"].'" name="fecha_inicioEditar" required >

              <input type="text" value="'.$respuesta["fecha_fin"].'" name="fecha_finEditar" required>
              

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR EVALUACIONES
	#------------------------------------
	public function actualizarAutoController(){

		if(isset($_POST["dependencia_idEditar"])){

			$datosController = array(
				                      "dependencia_id"=>$_POST["dependencia_idEditar"], 
								     
                                      "fecha_inicio"=>$_POST["fecha_inicioEditar"],
								      "fecha_fin"=>$_POST["fecha_finEditar"],
								     
				                  );
			
			$respuesta = Datos::actualizarAutoModel($datosController, "autoevaluacion");

			if($respuesta == "success"){

				header("location:index.php?action=cambioss");

			}

			else{

				echo "error";

			}

		}
	
	}



	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

}

?>