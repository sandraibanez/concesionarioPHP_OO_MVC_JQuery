<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.3/' ;
include($path . "model/connect.php");
    //include("model/connect.php");
	class DAOUser{
		function insert_cars($datos){
			// die('<script>console.log('.json_encode( $datos ) .');</script>');
			$id = $datos['id'];
			$license_number = $datos['license_number'];
			$brand = $datos['brand'];
			$model = $datos['model'];
			$car_plate = $datos['car_plate'];
			$km = $datos['km'];
			$category = $datos['category'];
			$type = '';
			$comments = $datos['comments'];
			$discharge_date = $datos['discharge_date'];
			$color = $datos['color'];
			$extras = '';
			$car_image = $datos['car_image'];
			$price = $datos['price'];
			$doors = $datos['doors'];
			$city = $datos['city'];
			$lat = $datos['lat'];
			$lng = $datos['lng'];
			foreach ($datos['type'] as $indice) {
        	    $type=$type."$indice:";
        	}
			foreach ($datos['extras'] as $indice) {
        	    $extras=$extras."$indice:";
        	}
        	// foreach ($datos['id'] as $indice) {
        	//     $id=$id."$indice:";
        	// }
        	// $price=$datos['price'];
        	// foreach ($datos['lat'] as $indice) {
        	//     $hobby=$lat."$indice:";
        	// }
        	$sql = "INSERT INTO coches (id, license_number, brand, model, 
			car_plate, km, category, type, comments, discharge_date, color,
			 extras, car_image, price, doors, city, lat, lng)VALUES ('$id', '$license_number', '$brand','$model', 
				'$car_plate', '$km', '$category', '$type', '$comments', '$discharge_date', '$color',
				 '$extras', '$car_image', '$price', '$doors', '$city', '$lat', '$lng')";
            
			// die('<script>console.log('.json_encode( $sql ) .');</script>');
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function select_all_cars(){
			// $data = 'hola DAO select_all_user';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
			$sql = "SELECT * FROM coches ORDER BY id ASC";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
			connect::close($conexion);
            return $res;
		}
		
		function select_cars($id){
			// $data = 'hola DAO select_user';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
			$sql = "SELECT * FROM coches WHERE id='$id'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		
		function update_cars($datos){
			//die('<script>console.log('.json_encode( $datos ) .');</script>');
			$id = $datos['id'];
			$license_number = $datos['license_number'];
			$brand = $datos['brand'];
			$model = $datos['model'];
			$car_plate = $datos['car_plate'];
			$km = $datos['km'];
			$category = $datos['category'];
			$type = '';
			$comments = $datos['comments'];
			$discharge_date = $datos['discharge_date'];
			$color = $datos['color'];
		    $extras = '';
			$car_image = $datos['car_image'];
			$price = $datos['price'];
			$doors = $datos['doors'];
			$city = $datos['city'];
			$lat = $datos['lat'];
			$lng = $datos['lng'];
			foreach ($datos['type'] as $indice) {
        	    $type=$type."$indice:";
        	}
			foreach ($datos['extras'] as $indice) {
        	    $extras=$extras."$indice:";
        	}
        	// foreach ($datos['idioma'] as $indice) {
        	//     $language=$language."$indice:";
        	// }
        	// $comment=$datos['observaciones'];
        	// foreach ($datos['aficion'] as $indice) {
        	//     $hobby=$hobby."$indice:";
        	// }
        	
        	$sql = " UPDATE coches SET  
			license_number='$license_number',
			brand='$brand',
			model='$model',
			car_plate='$car_plate',
			km='$km',
			category='$category',
			type='$type', 
			comments='$comments',
			discharge_date='$discharge_date', 
			color='$color', 
			extras='$extras', 
			car_image='$car_image',
			price='$price', 
			doors='$doors',
			city='$city',
			lat='$lat',
			lng='$lng'
		    WHERE id='$id'";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function delete_cars($id){
			$sql = "DELETE FROM coches WHERE id='$id'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		function delete_all_cars(){
			//die('<script>console.log("hola");</script>');
			$sql = "DELETE FROM coches";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		function dummies_cars(){
			//die('<script>console.log("hola");</script>');
			$sql = "DELETE FROM coches;";

			$sql.= "INSERT INTO coches (id, license_number, brand, model, car_plate, km,category,type, comments, discharge_date, color, extras, car_image, price, doors, city, lat, lng)" 
			." VALUES ('12','6k41L9JIL04J3LKP0', 'Hyundai', 'Kona', '4621LPL', '900', 'km0', 'hibrido', 'Coche nuevo y automático', '22/02/2022',	'rojo',	'navegador:',	'audi_q5_hibrido.jpg',	'100000€', '4', 'Granada', '40.4167047', '-2.12054921251206');";
			$sql.= "INSERT INTO coches (id, license_number, brand, model, car_plate, km,category,type, comments, discharge_date, color, extras, car_image, price, doors, city, lat, lng)" 
			." VALUES ('13','6k41L9JIL04J3LKP0', 'Hyundai', 'Kona', '4621LPL', '900', 'km0', 'hibrido', 'Coche nuevo y automático', '22/02/2022',	'rojo',	'navegador:',	'audi_q5_hibrido.jpg',	'100000€', '4', 'Granada', '40.4167047', '-2.12054921251206');";
			// $sql.= "INSERT INTO coches (license_number, brand, model, car_plate, km, type, comments, discharge_date, color, extras, car_image, price, doors)" 
			// ." VALUES ('2OUD50JIL04J3L5G6', 'CP', 'Formentor', '7645JDH', '10000', 'GS', 'Coche nuevo y automático', '26/07/2019', 'Mate Blue', 'Navegador', view/images/img_cars/mercedes_glc_coupe.jpg, '32000€', 5);";

			// $sql.= "INSERT INTO coches (license_number, brand, model, car_plate, km, type, comments, discharge_date, color, extras, car_image, price, doors)" 
			// ." VALUES ('8P9D50JIL04J3L1H7', 'FRD', 'Mustang', '6547LGM', '2000', 'ET', 'Coche nuevo y automático', '30/03/2019', 'Blue', 'Navegador', view/images/img_cars/mercedes_glc_coupe.jpg, '39000€', 5);";

			// $sql.= "INSERT INTO coches (license_number, brand, model, car_plate, km, type, comments, discharge_date, color, extras, car_image, price, doors)" 
			// ." VALUES ('44GD50JIL04J3LH58', 'MCD', 'GLC Coupé', '9745DFM', '0', 'OT', 'Coche nuevo y automático', '26/07/2019', 'Mate grey', 'Navegador',  view/images/img_cars/mercedes_glc_coupe.jpg,'60000€', 5);";

			// $sql.= "INSERT INTO coches (license_number, brand, model, car_plate, km, type, comments, discharge_date, color, car_image, extras, price, doors)" 
			// ." VALUES ('3J4750JIL04J3LKP4', 'AUD', 'A6', '2641FKL', '50000', 'HB', 'Coche nuevo y automático', '20/06/2017', 'White', 'Navegador', view/images/img_cars/mercedes_glc_coupe.jpg, '28000€', 4)";
			
			$conexion = connect::con();
            $res = mysqli_multi_query($conexion, $sql);
            connect::close($conexion);

            return $res;
		}
	} 