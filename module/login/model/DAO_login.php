<?php
    // $path = $_SERVER['DOCUMENT_ROOT'] . '/CONCESIONARIO';
    // include($path . "/model/connect.php");
    // include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\module\login\ctrl\ctrl_login.php');
    include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\connect.php');
    class DAOLogin{

        function select_email($email){
			$sql = "SELECT email FROM users WHERE email='$email'";
            //   echo json_encode($sql);
            // exit;
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
        function select_name($name){
			$sql = "SELECT username FROM users WHERE username='$name'";
            //   echo json_encode($sql);
            // exit;
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
        function insert_user($username, $email, $password){
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
            $hashavatar = md5(strtolower(trim($email))); 
            $avatar = "https://i.pravatar.cc/500?u=$hashavatar";
            // $sql="call usuarios('$username','$hashed_pass','$email','client',' $avatar')";
            $sql ="   INSERT INTO `users`(`username`, `password`, `email`, `type_user`, `avatar`) 
            VALUES ('$username','$hashed_pass','$email','client',' $avatar')";
            // echo json_encode($sql);
            // exit;
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        

        function select_user($username){
            // echo json_encode($username);
            // exit;
            $sql = "SELECT 	username,password,email,type_user,avatar FROM users WHERE  username='$username'";
            // $sql = "SELECT 	username FROM users WHERE  username='$username'";
            //   echo json_encode($sql);
            // exit;
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            // return $res;
            if ($res) {
                $value = get_object_vars($res);
                return $value;
            }else {
                return "error_user";
            }
        }

        function select_data_user($username){
          
			$sql = "SELECT * FROM users WHERE username='$username'";
            // echo json_decode($sql);
            // exit;
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);

            return $res;
            
        }

    }
?>