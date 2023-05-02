<?php
    include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD3.12_1(mejora de los procedures)\module\cart\model\DAOcart.php');
    include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\middleware_auth.php');
    // include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\JWT.php');
    //     // $path = $_SERVER['DOCUMENT_ROOT'] . "/PHP_OO_MVC_JQUERY/";
    //     // include ($path . "module/cart/model/DAOcart.php");
    //     // include ($path . "view/inc/JWT.php");
    @session_start();
    if (isset($_SESSION["tiempo"])) {  
        $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
    }
        switch($_GET['op']){
            case 'view';
                // die('<script>console.log("carrito");</script>');
                include("module/cart/view/cart.html");
                break;
            
            case 'insert_cart':
                $id_car = $_POST['codigo_producto'];
                $dinfo = array();
               
                try {
                    $json = decode_token($_POST['token']);  
                    $dao = new DAOCart();
                    $rdo = $dao->select_product($json['username'], $id_car);
                    // $dinfo = array();
                     
                    foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                    }
                    // echo json_encode($dinfo);
                    // exit;
                    // si un usuario inserta un coche ya no deja insertar mas coches
                if (!$dinfo) {
                    $dao = new DAOCart();
                    $rdo = $dao->insert_product($json['username'], $id_car);
                    echo json_encode("insert");
                    exit;
                } else {
                    $dao = new DAOCart();
                    $rdo = $dao->update_product($json['username'], $id_car);
                    echo json_encode("update");
                    exit;
                }
                } catch (Exception $e) {
                    echo json_encode("error");
                    exit;
                }
                // echo json_encode($dinfo);
                // exit;
                break;
            
        
            case 'delete_cart';    
            // echo json_encode('delete_cart');
            //     exit; 
            $id_car = $_POST['codigo_producto'];
                try{  
                    $json = decode_token($_POST['token']);
                    $dao = new DAOCart();
                    $rdo = $dao->delete_cart($json['username'], $id_car);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    echo json_encode("delete");
                    exit;
                }
               break;         

            case 'load_cart';   
            // echo json_encode('load_cart');
            //     exit; 
                   try{
                    $json = decode_token($_POST['token']); 
                //     echo json_encode($json);
                // exit; 
                    $dao = new DAOCart();
                    $rdo = $dao->select_user_cart($json['username']);
                //         echo json_encode($rdo);
                // exit; 
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $dinfo = array();
                    foreach ($rdo as $row) {
                        array_push($dinfo, $row);
                    }
                    echo json_encode($dinfo);
                }
                break; 

            case 'update_qty'; 
            // echo json_encode('update_qty');
            //     exit; 
            $id_car = $_POST['codigo_producto']; 
            $qty = $_POST['qty'] ;
            //  echo json_encode($id_car);
            //     exit; 
                try{
                    $json = decode_token($_POST['token']); 
                    $dao = new DAOCart();
                    $rdo = $dao->update_qty($json['username'], $id_car,$qty);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    echo json_encode("update");
                    exit;
                }
                break; 

            case 'checkout';  
            // echo json_encode('checkout_php');
            //     exit;   
            try{
                $json = decode_token($_POST['token']); 
            //     echo json_encode($json);
            // exit; 
                $dao = new DAOCart();
                $rdo = $dao->select_user_cart($json['username']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                // echo json_encode($dinfo);
                    $dao = new DAOCart();
                    $res = $dao->checkout($dinfo,$json['username']);
                    // echo json_encode($res);
                    // exit; 
                    echo json_encode("checkout");
                    exit;
            }
                // if(!$rdo){
                //     echo json_encode("error");
                //     exit;
                // }else{
                //     $dao = new DAOCart();
                //     $res = $dao->checkout($rdo,$json['username']);
                //     // echo json_encode($res);
                //     // exit; 
                //     echo json_encode("checkout");
                //     exit;
                // }
                break; 
                    
            default;
                include("view/inc/error404.php");
                break;
                
         }
    
?>
