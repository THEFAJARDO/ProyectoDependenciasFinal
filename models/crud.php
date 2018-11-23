<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,nombre,sigla,superior,tipo) VALUES (:codigo,:nombre,:sigla,:superior,:tipo)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":sigla", $datosModel["sigla"], PDO::PARAM_STR);
		$stmt->bindParam(":superior", $datosModel["superior"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#REGISTRO DE Procesos
	#-------------------------------------
	public function registroProcesoModel($datosModel, $tabla){

		
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (dependencia_id,num,vigencia,fecha_inicio,fecha_fin,tipoproceso) VALUES (:dependencia_id,:num,:vigencia,:fecha_inicio,:fecha_fin,:tipoproceso)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":dependencia_id", $datosModel["dependencia_id"], PDO::PARAM_STR);
		$stmt->bindParam(":num", $datosModel["num"], PDO::PARAM_STR);
		$stmt->bindParam(":vigencia", $datosModel["vigencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datosModel["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datosModel["fecha_fin"], PDO::PARAM_STR);
       $stmt->bindParam(":tipoproceso", $datosModel["tipoproceso"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	#REGISTRO DE AUTOEVALUACION
	#-------------------------------------
	public function registroAutoModel($datosModel, $tabla){

		
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (dependencia_id,fecha_inicio,fecha_fin) VALUES (:dependencia_id,:fecha_inicio,:fecha_fin)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":dependencia_id", $datosModel["dependencia_id"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datosModel["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datosModel["fecha_fin"], PDO::PARAM_STR);
     
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA dependencias
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT codigo,nombre,sigla,superior,tipo FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR DEPENDENCIA
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT codigo,nombre,sigla,superior,tipo FROM $tabla WHERE codigo = :codigo");
		$stmt->bindParam(":codigo", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR DEPENDENCIA
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, nombre = :nombre, sigla = :sigla, superior = :superior, tipo = :tipo WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":sigla", $datosModel["sigla"], PDO::PARAM_STR);
		$stmt->bindParam(":superior", $datosModel["superior"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
#VISTA Proceso
	#-------------------------------------

	public function vistaProcesoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT dependencia_id,num,vigencia,fecha_inicio,fecha_fin,tipoproceso FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


#EDITAR PROCESO
	#-------------------------------------

	public function editarProcesoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT dependencia_id,num,vigencia,fecha_inicio,fecha_fin,tipoproceso FROM $tabla WHERE dependencia_id = :dependencia_id");
		$stmt->bindParam(":dependencia_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR PROCESO
	#-------------------------------------

	public function actualizarProcesoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dependencia_id = :dependencia_id, num = :num, vigencia = :vigencia, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin,tipoproceso = :tipoproceso WHERE dependencia_id = :dependencia_id");

		$stmt->bindParam(":dependencia_id", $datosModel["dependencia_id"], PDO::PARAM_STR);
		$stmt->bindParam(":num", $datosModel["num"], PDO::PARAM_STR);
		$stmt->bindParam(":vigencia", $datosModel["vigencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datosModel["fecha_inicio"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_fin", $datosModel["fecha_fin"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoproceso", $datosModel["tipoproceso"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	} 

	#VISTA AUTOEVALUACION
	#-------------------------------------

	public function vistaAutoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT dependencia_id,fecha_inicio,fecha_fin FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


#EDITAR Autoevaluacion
	#-------------------------------------

	public function editarAutoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT dependencia_id,fecha_inicio,fecha_fin FROM $tabla WHERE dependencia_id = :dependencia_id");
		$stmt->bindParam(":dependencia_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR autoevaluacion
	#-------------------------------------

	public function actualizarAutoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dependencia_id = :dependencia_id, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin WHERE dependencia_id = :dependencia_id");

		
		$stmt->bindParam(":dependencia_id", $datosModel["dependencia_id"], PDO::PARAM_STR);
		
		$stmt->bindParam(":fecha_inicio", $datosModel["fecha_inicio"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_fin", $datosModel["fecha_fin"], PDO::PARAM_INT);
        

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}

?>