<?php

// $path = $_SERVER['DOCUMENT_ROOT'] . '/PHP_OO_MVC_JQUERY/';
// include($path . "model/connect.php");
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\connect.php');

class DAOCart{

    function select_product($user, $id){
        // $sql = "SELECT * FROM cart WHERE user=(SELECT  u.id_user FROM users u WHERE u.username= '$user' ) AND codigo_producto='$id'";
        $sql = "call cart_product ('select_product','$user', '$id',@hist_carts )";
        // call likes3 ('select_likes','$username','$id_car',@car1)
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
     }

    function insert_product($user, $id){
        // $sql = "INSERT INTO cart (user, codigo_producto, qty) VALUES ((SELECT  u.id_user FROM users u WHERE u.username= '$user' ),'$id', '1')";
        $sql ="call cart_product ('insert_product','$user', '$id',@hist_carts )";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
     }

    function update_product($user, $id){
        // $sql = "UPDATE cart SET qty = qty+1 WHERE user=(SELECT  u.id_user FROM users u WHERE u.username= '$user' ) AND codigo_producto='$id'";
        $sql ="call cart_product ('update_product','$user', '$id',@hist_carts )";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
     }

    function select_user_cart($user){
        // $sql = "SELECT c1.user, c1.codigo_producto, c1.qty, c2.img_car, m.name_model, c2.price, b.name_brand,c2.gear_shift, c.qty_max
        // FROM  cart c INNER JOIN cart_hist c1 INNER JOIN car c2 INNER JOIN model m INNER JOIN brand b
        // ON c.cod_cart=c1.cod_cart  and c.codigo_producto= c2.id_car and c2.model=m.id_model and m.id_brand=b.name_brand 
        // WHERE c.codigo_producto AND c.user=(SELECT u.id_user FROM users u WHERE u.username= '$user' ) ";
        $sql ="call user_cart ('select_user_cart','$user',@hist_carts2 )";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function update_qty($user, $id, $qty){
        // echo json_encode($qty);
        // exit;
        // $sql = "UPDATE cart SET qty = '$qty' WHERE user=(SELECT  u.id_user FROM users u WHERE u.username= '$user' ) AND codigo_producto='$id'";
        $sql ="call cart_cantidad ('update_qty','$user','$id','$qty',@hist_carts3 )";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }
    
    function delete_cart($user, $id){
        // $sql = "DELETE  FROM cart_hist WHERE user=(SELECT  u.id_user FROM users u WHERE u.username= '$user' ) AND codigo_producto='$id'";
        // $sql = "DELETE  FROM cart_hist WHERE codigo_producto='$id'";
        $sql ="call cart_product ('delete_cart','$user', '$id',@hist_carts )";
        // echo json_encode($sql);
        //     exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
     }

    function checkout($data, $user){
        $date = date("Ymd");

        foreach($data as $fila){
            // $cod_ped = '3';
            $cod_prod = $fila["codigo_producto"];
            // $talla = $fila["talla"];
            $cantidad = $fila["qty"];
            $precio = $fila["precio"];
            $total_precio = $fila["precio"]*$fila["qty"];
            // $sql = "INSERT INTO `producto2`( `user`, `cod_prod`, `cantidad`, `precio`, `total_precio`, `fecha`) 
            //         VALUES ((SELECT  u.id_user FROM users u WHERE u.username= '$user' ),'$cod_prod','$cantidad',(SELECT  c.price FROM car c WHERE c.id_car='$cod_prod'),'$total_precio','$date')";
           $sql ="call cart_checkout ('checkout','$user', '$cod_prod',' $cantidad',' $total_precio','$date',@hist_carts4 )";
           $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion); 
        }
        // echo json_encode($sql);
        //     exit;
        return $res;
    }

}

?>