<?php
// echo json_encode('holadao');
// exit;
// $path = $_SERVER['DOCUMENT_ROOT'] . '/framework_php_GitHub';
// include($path . "/model/connect.php");
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\connect.php');
class DAO_search {
    // echo json_encode('holadao');
    // exit;
    function search_brand(){
    //     echo json_encode('hola_crtl_search_brand.dao');
    // exit;
        $select="SELECT name_brand FROM brand";

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

    function search_category_null(){
    //     echo json_encode('search_category_null.dao');
    // exit;
        $select="SELECT DISTINCT name_cat FROM category";
        
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

    function search_category($brand){
    //     echo json_encode($brand);
    // exit;
        $select=  "SELECT ca.name_cat 
        FROM car c, category ca, model m1 
        WHERE ca.id_cat = c.category AND m1.id_model=c.model and m1.id_brand ='$brand'";
// echo json_encode($brand);
// exit;
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

    function select_only_brand($complete, $brand){
    //     echo json_encode('brand');
    // exit;
        $select="SELECT * 
        FROM car c INNER JOIN model m1 on c.model=m1.id_model 
        WHERE m1.id_brand = '$brand' AND city LIKE '$complete%'";
    
        //  echo json_encode($select);
        //     exit;
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

    function select_only_category($category, $complete){
        // echo json_encode('select_only_category.php');
        // exit;
       
       $select="SELECT * 
       FROM car c INNER JOIN category c1 on c.category=c1.id_cat 
       WHERE c1.name_cat = '$category' AND city LIKE '$complete%'";
        // echo json_encode($select);
        // exit;
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


    function select_brand_category($complete, $brand, $category){
        // echo json_encode('select_brand_category.php');
        // exit;
        
        $select="SELECT * 
        FROM car c INNER JOIN category c1 INNER JOIN model m1 on c.category=c1.id_cat and c.model=m1.id_model 
        WHERE m1.id_brand = '$brand' AND c1.name_cat = '$category' AND c.city LIKE '$complete%'";
        // echo json_encode( $select);
        // exit;
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

    function select_city($complete){
        // echo json_encode('select_city.php');
        // exit;
        $select="SELECT *
        FROM car c
        WHERE c.city LIKE '$complete%'";
        // echo json_encode( $select);
        // exit;
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
}
?>