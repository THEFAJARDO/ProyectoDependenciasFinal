<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=dbdepen","root","");
		return $link;

	}

}

?>