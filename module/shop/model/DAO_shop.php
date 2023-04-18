<?php
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\connect.php');

class DAOShop{
	function select_all_cars(){
		$prod = $_POST['total_prod'];
        $items2 = $_POST['items_page'];
		// echo json_encode($_POST['items_page']);
		// exit;
		$sql = "SELECT DISTINCT * 
		FROM car c, model m
		WHERE c.model = m.id_model  
		ORDER BY c.countcar DESC
		LIMIT $items2 OFFSET $prod";
		//LIMIT 0, 4";
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
	
	 function select_one_car($id){
		// echo json_encode('hola5');
		//  exit;
		$sql = "SELECT *
		FROM car c, model m, type_motor t, category ca
		WHERE c.id_car = '$id'
		AND  c.model = m.id_model 
		AND c.category = ca.id_cat
		AND c.motor = t.cod_tmotor";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);

		return $res;
	 }
	 
	 function select_imgs_car($id){
		// echo json_encode('hola9');
		//  exit;
		$sql = "SELECT i.id_car, i.img_cars
			    FROM img_cars i
			    WHERE i.id_car = '$id'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$imgArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				array_push($imgArray, $row);
			}
		}
		return $imgArray;
	 }

	

    function filters($filter){
		// echo json_encode($filter);
		//  exit;
		$total_prod =  $_POST['total_prod'];
		$items_page =  $_POST['items_page'];
        $consulta = "SELECT DISTINCT c.*
		FROM car c INNER JOIN img_cars i INNER JOIN category ca INNER JOIN type_motor t INNER JOIN model m 
		ON c.id_car = i.id_car AND  i.img_cars LIKE ('%1%') AND c.category = ca.id_cat AND c.motor = t.cod_tmotor
		AND c.model= m.id_model";
		
		// echo json_encode($consulta);
		//  exit;
		
            for ($i=0; $i < count($filter); $i++){
				// echo json_encode( $filter);
				// echo json_encode( $filter[$i][0]);
				// exit;
                if ($i==0){
					if ($filter[$i][0] == 'car'){
						$consulta.=" ORDER BY " . $filter[$i][1] .  " DESC";
		
					} else {
						$consulta.= " WHERE c." . $filter[$i][0] . "='" . $filter[$i][1]."'";
					}
				}
				else{
					if ($filter[$i][0] == 'car'){
						$consulta.=" ORDER BY " . $filter[$i][1] . " DESC";
					
					}else{
						$consulta.= " AND c." . $filter[$i][0] . "='" . $filter[$i][1]."'";
					}
                }     
				
            }   
			$consulta.="LIMIT $total_prod,$items_page ";
			// echo json_encode( $consulta);
			// exit;   
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;

      }


	  function ordenar($filter,$ordenar){
		// echo json_encode('ordenar');
		//  exit;
	
        $consulta = "SELECT DISTINCT c.*
		FROM car c INNER JOIN img_cars i INNER JOIN category ca INNER JOIN type_motor t INNER JOIN model m 
		ON c.id_car = i.id_car AND  i.img_cars LIKE ('%1%') AND c.category = ca.id_cat AND c.motor = t.cod_tmotor
		AND c.model= m.id_model";
		
		// echo json_encode($consulta);
		//  exit;
		
            for ($i=0; $i < count($filter); $i++){
				// echo json_encode( $filter);
				// echo json_encode( $filter);
				// exit;
                if ($i==0){
					if ($filter[$i][0] == 'car'){
						$consulta= $consulta." ORDER BY " . $filter[$i][1] .  $ordenar[$i][1];
		
					}else {
						$consulta.= " WHERE c." . $filter[$i][0] . "='" . $filter[$i][1]."'";
					}
				}else{
					if ($filter[$i][0] == 'car'){
						$consulta.= $consulta." ORDER BY " . $filter[$i][1] . $ordenar[$i][1];
					
					}else{
						$consulta.= " AND c." . $filter[$i][0] . "='" . $filter[$i][1]."'";
					}
                }     
				
            }   
			// echo json_encode( $consulta);
			// exit;   
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;

      }

	  function select_car_order ($filter){
		// echo json_encode('select_car_order');
		// exit;
		$sql = "SELECT DISTINCT * 
		FROM car c, model m
		WHERE c.model = m.id_model  
		ORDER BY c.$filter DESC";
		//LIMIT 0, 4";
		
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

function select_filter_home(){
	$total_prod =  $_POST['total_prod'];
	$items_page =  $_POST['items_page'];
		// echo json_encode('DAO_filter_home');
		//    exit;
		$opc_filter = $_GET['opc'];
		$filter = "";

		if ($opc_filter == "brand") {
			$brand = $_GET['brand'];
			$filter = "m.id_brand = '" . $brand . "'";
		} else if ($opc_filter == "cate") {
			$category = $_GET['category'];
			$filter = "ca.name_cat = '" . $category . "'";
		} else {
			$type_motor = $_GET['motor'];
			$filter = "t.name_tmotor = '" . $type_motor . "'";
		}
		// echo json_encode($filter);
		//    exit;
		$sql = "SELECT c.*,m.id_brand, m.name_model, t.name_tmotor, ca.name_cat
    	FROM car c, model m, type_motor t, category ca
    	WHERE  c.model = m.id_model 
    	AND c.category = ca.id_cat
    	AND c.motor = t.cod_tmotor
    	AND $filter";
		$sql.="LIMIT $total_prod, $items_page";
		// echo json_encode($sql);
		// exit;
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$carArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				array_push($carArray, $row);
			}
		}
		return $carArray;
	}

	function detalle_coche(){
		$opc_filter = $_GET['opc'];
		$filter = "";
		if ($opc_filter == "coche") {
			$coche = $_GET['coche'];
			$filter = "m.id_brand = '" . $coche . "'";
		}

		$sql="SELECT * 
		FROM car c, model m, type_motor t, category ca, img_cars i1 
		WHERE c.id_car = 1 AND c.model = m.id_model AND c.category = ca.id_cat 
		AND c.motor = t.cod_tmotor and c.id_car=i1.id_car
		and $filter";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$carArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				array_push($carArray, $row);
			}
		}
		return $carArray;

	}

	function search($filters_search){
			
		// echo json_encode($filters_search);
		//    exit;
		$prod = $_POST['total_prod'];
		$items_page =  $_POST['items_page'];
        $count = 1;
        $consulta = "SELECT c.*, ca.name_cat, t.name_tmotor, b1.name_brand, c.city
		FROM car c INNER JOIN category ca INNER JOIN type_motor t INNER JOIN model m1 INNER JOIN brand b1 
		ON c.category=ca.id_cat and c.img_car LIKE ('%1%') AND c.model = m1.id_model 
		AND m1.id_brand=b1.name_brand and c.motor=t.cod_tmotor";
	
	
        for ($i=0; $i < $count; $i++){
            if ($count==1){
                if ($filters_search[0]['brand'][0]){
                    $consulta .= " WHERE b1.name_brand  = '" . ($filters_search[0]['brand'][0]."'");
                    $count = 2;
                }
                else if ($filters_search[0]['category'][0]){
                    $consulta .= " WHERE ca.name_cat = '" . ($filters_search[0]['category'][0])."'";
                    $count = 3;
                }
                else if ($filters_search[0]['city'][0]){
                    $consulta .= " WHERE c.city = '" . ($filters_search[0]['city'][0])."'";
                    $count = 4;
                }
             }else  {
                if ($filters_search[1]['category'][0]){
                    $consulta .= " AND ca.name_cat = '" . ($filters_search[1]['category'][0])."'";
					
                }
                if ($filters_search[2]['city'][0]){
                    $consulta .= " AND c.city = '" .($filters_search[2]['city'][0])."'";
					
                }
			}
        }

		$consulta.="LIMIT $prod,$items_page ";
		
		// echo json_encode($filters_search);
		// 			exit;
		// echo json_encode($consulta);
		// exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

	function countcar($id){
		// echo json_encode('dao');
		//    exit;
		// para crear una columna nueva:
		//    ALTER TABLE car ADD COLUMN countcar integer
		// consulta para sumar las visitas
		// UPDATE car c1 SET c1.countcar= c1.countcar+1 WHERE c1.id_car=1;
		$sql = "UPDATE car c1 
		SET c1.countcar= c1.countcar+1 
		WHERE c1.id_car=$id";
// echo json_encode($sql);
// exit;
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		return $res;
	 }

	 function count_more_cars_related($type_car){
		// echo json_encode('hola_count_more_cars_related_dao');
		// exit;
		$sql = "SELECT COUNT(*) AS n_prod
				FROM car c INNER JOIN type_motor t1 on c.motor=t1.cod_tmotor
				WHERE t1.name_tmotor = '$type_car'";
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

	function select_cars_related($type, $loaded, $items){
		// echo json_encode('hola_select_cars_related_dao');
		// exit;
		$sql = "SELECT * 
				FROM car c, model m, type_motor t 
				WHERE c.model = m.id_model and t.cod_tmotor=c.motor 
				AND t.name_tmotor = '$type' 
				LIMIT $loaded, $items";
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




	function select_count(){
		// echo json_encode('select_count_dao');
		// exit;
        $select = "SELECT COUNT(*) contador
        FROM car";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
	function select_count_filter($filter){
		// echo json_encode('select_count_filter_dao');
		// exit;
        $consulta = "SELECT COUNT(DISTINCT c.id_car) contador
		FROM car c INNER JOIN img_cars i INNER JOIN category ca INNER JOIN type_motor t INNER JOIN model m 
		ON c.id_car = i.id_car AND  i.img_cars LIKE ('%1%') AND c.category = ca.id_cat AND c.motor = t.cod_tmotor
		AND c.model= m.id_model";
               
            for ($i=0; $i < count($filter); $i++){
                if ($i==0){
                    if ($filter[$i][0] == 'car'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }
                    else{
                    $consulta.= " WHERE c." . $filter[$i][0] . "= '" . $filter[$i][1]."'";
                    }
                }
                else {
                    if ($filter[$i][0] == 'car'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " ASC";

                    }
                    else{$consulta.= " AND c." . $filter[$i][0] . "= '" . $filter[$i][1]."'";}
                }        
            }   
       	// echo json_encode($consulta);
		// exit;
        $conexion = connect::con();
         $res = mysqli_query($conexion, $consulta);
         connect::close($conexion);

         $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
	function count_search($filters_search){
			
		// echo json_encode($filters_search);
		//    exit;
        $count = 1;
        $consulta = "SELECT COUNT(*) contador
		FROM car c INNER JOIN category ca INNER JOIN type_motor t INNER JOIN model m1 INNER JOIN brand b1 
		ON c.category=ca.id_cat and c.img_car LIKE ('%1%') AND c.model = m1.id_model 
		AND m1.id_brand=b1.name_brand and c.motor=t.cod_tmotor";
	
	
        for ($i=0; $i < $count; $i++){
            if ($count==1){
                if ($filters_search[0]['brand'][0]){
                    $consulta .= " WHERE b1.name_brand  = '" . ($filters_search[0]['brand'][0]."'");
                    $count = 2;
                }
                else if ($filters_search[0]['category'][0]){
                    $consulta .= " WHERE ca.name_cat = '" . ($filters_search[0]['category'][0])."'";
                    $count = 3;
                }
                else if ($filters_search[0]['city'][0]){
                    $consulta .= " WHERE c.city = '" . ($filters_search[0]['city'][0])."'";
                    $count = 4;
                }
             }else  {
                if ($filters_search[1]['category'][0]){
                    $consulta .= " AND ca.name_cat = '" . ($filters_search[1]['category'][0])."'";
					
                }
                if ($filters_search[2]['city'][0]){
                    $consulta .= " AND c.city = '" .($filters_search[2]['city'][0])."'";
					
                }
			}
        }


		
		// echo json_encode($filters_search);
		// 			exit;
		// echo json_encode($consulta);
		// exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $consulta);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

	function count_filter_home(){
		// echo json_encode('DAO_count_filter_home');
		//    exit;
		$opc_filter = $_GET['opc'];
		$filter = "";

		if ($opc_filter == "brand") {
			$brand = $_GET['brand'];
			$filter = "m.id_brand = '" . $brand . "'";
		} else if ($opc_filter == "cate") {
			$category = $_GET['category'];
			$filter = "ca.name_cat = '" . $category . "'";
		} else {
			$type_motor = $_GET['motor'];
			$filter = "t.name_tmotor = '" . $type_motor . "'";
		}
		// echo json_encode($filter);
		//    exit;
		   $sql = "SELECT COUNT(*) contador
		   FROM car c, model m, type_motor t, category ca
		   WHERE  c.model = m.id_model 
		   AND c.category = ca.id_cat
		   AND c.motor = t.cod_tmotor
		   AND $filter";
		// echo json_encode($sql);
		// exit;
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$carArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				array_push($carArray, $row);
			}
		}
		return $carArray;
	}
	function select_load_likes($username){
		// $username= 'usuario3';
        $sql = "SELECT l.id_car FROM likes l WHERE l.id_user = (SELECT u.id_user FROM users u WHERE u.username = '$username')";
        // $conexion = connect::con();
        // $res = mysqli_query($conexion, $sql);
        // connect::close($conexion);
        // return $res;
		$conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
		$retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_likes($id_car, $username){
        $sql = "call likes3 ('select_likes','$username','$id_car',@car1)";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function like($id_car, $username){
        $sql = "call likes3 ('like','$username','$id_car',@car);";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function dislike($id_car, $username){
        $sql = "call likes3 ('dislike','$username','$id_car',@car);";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

}



?>