<?php
	class connect{
		public static function con(){
			$jwt = parse_ini_file('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\db.ini');
			$host = $jwt['host'];
			$user = $jwt['user'];
			$pass = $jwt['pass'];                        
    		$db =   $jwt['db'];               
    		$port = $jwt['port'];
			// $host = '127.0.0.1';  
    		// $user = "root";                     
    		// $pass = "";                             
    		// $db = "cohes";                      
    		// $port = 3306;                           
    		// $tabla="car";
    		//die('<script>console.log("hola");</script>');
			
    		//$conexion = mysqli_connect($host, $user, $pass, $db, $port);
			return mysqli_connect($host, $user, $pass, $db, $port);
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}