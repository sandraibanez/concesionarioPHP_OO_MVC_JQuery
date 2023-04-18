<?php
	// $path = $_SERVER['DOCUMENT_ROOT'] . '/CONCESIONARIO';
    // $path = $_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.6/' ;
	// include($path . "model/connect.php");

//     $path = $_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.6/' ;
// include($path . "model/connect.php");
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\connect.php');
class DAOHome{

	    function select_categories() {
        // echo json_encode('hola4');
        // exit;
        $sql= "SELECT * FROM category";
        // die('<script>console.log("hola");</script>');
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);

	        $retrArray = array();
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

	    	function select_brand() {
			$sql= "SELECT * FROM brand ORDER BY name_brand ASC LIMIT 25";
            //  die('<script>console.log("hola");</script>');
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

				$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}
        	function select_type_motor() {
                //  echo json_encode('hola10');
                // exit;
			$sql= "SELECT * FROM type_motor ORDER BY cod_tmotor DESC";

				$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

				$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}
		function coches_mas_visitados(){
			// echo json_encode('coches_mas_visitados.dao');
			// exit;
			$sql = "SELECT  * 
			FROM car c, model m
			WHERE c.model = m.id_model  
			ORDER BY c.countcar DESC
			LIMIT 0, 4";
	// echo json_encode($sql);
	// exit;
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

				$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}

	}
	
?>