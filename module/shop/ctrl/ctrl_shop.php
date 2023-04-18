<?php
// die('<script>console.log("hola2");</script>');
// $path = $_SERVER['DOCUMENT_ROOT'] . '/CONCESIONARIO';
// include($path . "/module/shop/model/DAO_shop.php");
// include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\middleware_auth.php');
// include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\module\login\ctrl\ctrl_login.php');
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\module\shop\model\DAO_shop.php');
@session_start();
if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
}
switch ($_GET['op']) {
    case 'list';
        // die('<script>console.log("hola");</script>');
        include('module/shop/view/shop.html');
        break;

    case 'all_cars';
        try {
            $daoshop = new DAOShop();
            $Dates_Cars = $daoshop->select_all_cars();
        } catch (Exception $e) {
            echo json_encode("error");
        }

        if (!empty($Dates_Cars)) {
            echo json_encode($Dates_Cars);
        } else {
            echo json_encode("error");
        }
       
    break;

    case 'details_car':
        //   echo json_encode('hola2');
        //  exit;
        try {
            $daoshop = new DAOShop();
            $Date_car = $daoshop->select_one_car($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
        }
        try {
            $daoshop_img = new DAOShop();
            $Date_images = $daoshop_img->select_imgs_car($_GET['id']);
        } catch (Exception $e) {
            echo json_encode("error");
        }

        if (!empty($Date_car || $Date_images)) {
            $rdo = array();
            $rdo[0] = $Date_car;
            $rdo[1][] = $Date_images;
            echo json_encode($rdo);
        } else {
            echo json_encode("error");
        }
        break;

        case 'countcar':
            // echo json_encode('countcar');
            //  exit;
            $homeQuery = new DAOShop();
            $selSlide = $homeQuery -> countcar($_GET['id']);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;


    case 'filter':
        // echo json_encode($_POST['ordenar']);
        //  exit;
            $homeQuery = new DAOShop();
            $selSlide = $homeQuery -> filters($_POST['filter']);
            // $homeQuery = new DAOShop();
            // $selSlide = $homeQuery -> filters($_POST['filter']);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
        break;

    // case 'ordenar':
    //     // echo json_encode('ordenar');
    //     //  exit;
    //     if (!empty($_POST['filter']) && !empty($_POST['ordenar'])){
    //         echo json_encode($_POST['filter']);
    //         exit;
    //         // filter[0]='countcar';
    //         $homeQuery = new DAOShop();
    //         $selSlide = $homeQuery -> ordenar( $_POST['filter'],$_POST['ordenar']);
    //         // $rdo = $dao->select_only_brand($_POST['filter'], $_POST['ordenar']);
    //     }
    //         // $homeQuery = new DAOShop();
    //         // $selSlide = $homeQuery -> filters($_POST['filter'], $_POST['ordenar']);
    //         if (!empty($selSlide)) {
    //             echo json_encode($selSlide);
    //         }
    //         else {
    //             echo "error";
    //         }
    //     break;
    
    case 'home_filter':
        // echo json_encode('filter_home');
        //    exit;
        try {
            $daoFilter = new DAOShop();
            $Dates_filter_Cars = $daoFilter->select_filter_home();
        } catch (Exception $e) {
            echo json_encode("error");
        }
        if (!empty($Dates_filter_Cars)) {
            echo json_encode($Dates_filter_Cars);
            exit;
        } else {
            echo json_encode("error");
        }

        break;
        

        case 'detalle_coche':
            // echo json_encode('filter_home');
            //    exit;
            try {
                $daoFilter = new DAOShop();
                $Dates_filter_Cars = $daoFilter->detalle_coche();
            } catch (Exception $e) {
                echo json_encode("error");
            }
            if (!empty($Dates_filter_Cars)) {
                echo json_encode($Dates_filter_Cars);
                exit;
            } else {
                echo json_encode("error");
            }
    
            break;


        case 'search';
        //  echo json_encode('search');
        //    exit;
        $homeQuery = new DAOShop();
        // $selSlide = $homeQuery -> search($_POST['filters_search']);
        $selSlide = $homeQuery ->search($_POST['filters_search']);
        
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

 
        case 'count_cars_related':
            // echo json_encode('hola_count_cars_related_php');
            // exit;
            $type_car = $_POST['type_car'];
            try {
                $dao = new DAOShop();
                $rdo = $dao->count_more_cars_related($type_car);
            } catch (Exception $e) {
                echo json_encode("error");
                exit;
            }
            if (!$rdo) {
                echo json_encode("error");
                exit;
            } else {
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;

            case 'cars_related':
                // echo json_encode('hola_cars_related_php');
                // exit;
                $type_car = $_POST['type'];
                $loaded =  $_POST['loaded'];
                $items =  $_POST['items'];
                try {
                    $dao = new DAOShop();
                    $rdo = $dao->select_cars_related($type_car, $loaded, $items);
                } catch (Exception $e) {
                    echo json_encode("error");
                    exit;
                }
                if (!$rdo) {
                    echo json_encode("error");
                    exit;
                } else {
                    $dinfo = array();
                    foreach ($rdo as $row) {
                        array_push($dinfo, $row);
                    }
                    echo json_encode($dinfo);
                }
            break;
            case 'count';
            // echo json_encode('hola_count_php');
            // exit;    
            $homeQuery = new DAOShop();
            $selSlide = $homeQuery -> select_count();
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;
            case 'count_filters';  
            // echo json_encode('hola_count_filter_php');
            // exit;  
            $homeQuery = new DAOShop();
            $selSlide = $homeQuery -> select_count_filter($_POST['filter']);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;
    
            case 'count_home'; 
            // echo json_encode('hola_count_brand_filter_php');
            // exit;   
                $homeQuery = new DAOShop();
                $selSlide = $homeQuery -> count_filter_home();
                if (!empty($selSlide)) {
                    echo json_encode($selSlide);
                }
                else {
                    echo "error";
                }
            break;
        
        case 'count_search';  
        // echo json_encode('hola_count_search_php');
        //     exit;  
            $homeQuery = new DAOShop();
            $selSlide = $homeQuery -> count_search($_POST['filters_search']);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
        break;
         case 'control_likes':
            // echo json_encode('control_likes_1');
            // exit;
            $token = $_POST['token'];
            $id_car = $_POST['id_car'];
            // echo json_encode( $token);
            // exit;
            try {
                include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\middleware_auth.php');
                $json = decode_token($token);
                $dao = new DAOShop();
                $rdo = $dao->select_likes($id_car, $json['username']);
            } catch (Exception $e) {
                echo json_encode("error");
                exit;
            }
            if (!$rdo) {
                echo json_encode("error");
                exit;
            } else {
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                if (count($dinfo) === 0) {
                    $dao = new DAOShop();
                    $rdo = $dao->like($id_car, $json['username']);
                    echo json_encode("0");
                    // exit;
                } else {
                    $dao = new DAOShop();
                    $rdo = $dao->dislike($id_car, $json['username']);
                    echo json_encode("1");
                    // exit;
                }
                // echo json_encode( $rdo);
            // exit;
            }
            break;
    
        case 'load_likes_user';
        // echo json_encode('load_likes_user_php');
        // exit;
        try {
            include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\middleware_auth.php');
            $json = decode_token($_POST['token']);
            $dao = new DAOShop();
            $rdo = $dao->select_load_likes($json['username']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!$rdo) {
            echo json_encode("error");
            exit;
        } else {
            $dinfo = array();
            foreach ($rdo as $row) {
                array_push($dinfo, $row);
            }
            echo json_encode($dinfo);
            exit;
        }
            break;


    default;
        // include("module/views/pages/error404.php");
        include ("view/inc/error404.php");
        break;
}
?>