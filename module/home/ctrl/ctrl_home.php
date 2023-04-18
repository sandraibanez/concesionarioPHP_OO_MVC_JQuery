<?php
//  $path = $_SERVER['DOCUMENT_ROOT'] . '/CONCESIONARIO';
// $path = $_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.6/' ;
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\module\home\model\DAO_home.php');
// include($path . "module/home/model/DAO_home.php");
if (isset($_GET['op'])){
    @session_start();
    if (isset($_SESSION["tiempo"])) {  
        $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
    }
switch($_GET['op']){
        case 'list';
        // echo json_encode('hola1');
            include ('module/home/view/home.html');
        break;
        case 'homePageCategory';
            // echo json_encode('hola3');
            // exit;
            try{
                $daohome = new DAOHome();
                $SelectCategory = $daohome-> select_categories();
            } catch(Exception $e){
                echo json_encode("error");
            }
            if(!empty($SelectCategory)){
                echo json_encode($SelectCategory);
                // include("module/home/model/DAO_home.php"); 
            }
            else{
                echo json_encode("error");
            }
        break;

        case 'Carrousel_Brand';
        // echo json_encode('hola4');
        // exit;
                try{
                    $daohome = new DAOHome();
                    $SelectBrand = $daohome->select_brand();
                } catch(Exception $e){
                    echo json_encode("error");
                }
                
                if(!empty($SelectBrand)){
                    echo json_encode($SelectBrand); 
                }
                else{
                    echo json_encode("error");
                }
         break;
         case 'visitas';
        //  echo json_encode('visitas');
        // exit;
         try {
             $daohome = new DAOHome();
             $Dates_Cars = $daohome->coches_mas_visitados();
         
         } catch (Exception $e) {
             echo json_encode("error");
         }
 
         if (!empty($Dates_Cars)) {
             echo json_encode($Dates_Cars);
         } else {
             echo json_encode("error");
         }
        
     break;
         case 'homePageType';
        // echo json_encode('hola5');
        // exit;
                 try{
                     $daohome = new DAOHome();
                     $SelectType = $daohome->select_type_motor();
                 } catch(Exception $e){
                     echo json_encode("error");
                 }
                 
                 if(!empty($SelectType)){
                     echo json_encode($SelectType); 
                 }
                 else{
                     echo json_encode("error");
                 }
             break;
    //     case 'visitas';
    //     // echo json_encode('visitas');
    //     //  exit;
    //     // $prod = $_POST['total_prod'];
    //     // $items = $_POST['items_page'];
    //     try {
    //         $daohome = new DAOHome();
    //         $Dates_Cars = $daohome->coches_mas_visitados();
        
    //     } catch (Exception $e) {
    //         echo json_encode("error");
    //     }

    //     if (!empty($Dates_Cars)) {
    //         echo json_encode($Dates_Cars);
    //     } else {
    //         echo json_encode("error");
    //     }
       
    // break;
             
             default;
                //  include("module/exceptions/views/pages/error404.php");
                 include ("view/inc/error404.php");
             break;
}
}else {
    $callback = 'index.php?page=ctrl_home&op=list';
        die('<script>window.location.href="'.$callback .'";</script>');
}

?>