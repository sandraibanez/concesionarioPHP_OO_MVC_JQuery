<?php
// $path = $_SERVER['DOCUMENT_ROOT'] . '/CONCESIONARIO';
// include($path . "/module/login/model/DAO_login.php");
// include($path . "/model/middleware_auth.php");
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\middleware_auth.php');
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\module\login\model\DAO_login.php');
@session_start();
if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
}
switch ($_GET['op']) {
    case 'list';
    // die('<script>console.log("logingphp2");</script>');
        include("module/login/view/login-register.html");
        // include('view/inc/footer.php');
    break;

    case 'register':
        // echo json_encode('registro2');
        // exit;
        // Comprobar que la email no exista
        try {
            $daoLog = new DAOLogin();
            $check = $daoLog->select_email($_POST['email_reg']);
            $usuario = $daoLog ->select_name($_POST['username_reg']);
        } catch (Exception $e) {
            echo json_encode("error");
            exit;
        }

        if ($check) {
            $check_email = false;
        } else {
            $check_email = true;
        }

        if($usuario){
            $check_name =false;
        }else{
            $check_name =true;
        }

        // Si no exite el email creara el usuario
        if ($check_email & $check_name) {
            try {
                $daoLog = new DAOLogin();
                $rdo = $daoLog->insert_user($_POST['username_reg'], $_POST['email_reg'], $_POST['passwd1_reg']);
            } catch (Exception $e) {
                echo json_encode("error");
                exit;
            }
            if (!$rdo) {
                echo json_encode("error_user");
                exit;
            } else {
                echo json_encode("ok");
                exit;
               
               
            }
        } else if(!$check_email) {
            echo json_encode("error_email");
            exit;
        } else {
            echo json_encode("error_user");
            exit;
        }
       
    break;
   

    case 'login':
        try {
            $daoLog = new DAOLogin();
            $rdo = $daoLog->select_user($_POST['username_log']);
            // echo json_encode($rdo);
            // exit;
       }
        catch (Exception $e) {
            echo json_encode("error");
            exit;
        }
        if (!empty($rdo)) {
          
       
            if ($rdo == "error_user") {
                echo json_encode("error_user");
                exit;
            //}
            // echo json_encode('error');
            // exit;
           
            }else {
                $contraseyna=$_POST['passwd_log'];
              
                if (password_verify($contraseyna,$rdo["password"])) {
                    // if (true){
                    $token= create_token($rdo["username"]);
                    $_SESSION['username'] = $rdo['username']; //Guardamos el usario 
                    $_SESSION['tiempo'] = time(); //Guardamos el tiempo que se logea
                    echo json_encode($token);
                    exit;
                }
                 else {
                    echo json_encode("error_passwd");
                    exit;
                }
            }
        }
   
    break;

    case 'logout':
        // header('Content-Type: application/json, charset=UTF-8');
        // setcookie('PHPSESSID', "", time() - 0, '/');
        // isset($_COOKIE['PHPSESSID']);
        
        // include("module/login/view/login-register.html");
        unset($_SESSION['username']);
        unset($_SESSION['tiempo']);
        session_destroy();
        
        // setcookie('PHPSESSID', '', time() - 0);
        // include("module/login/view/login-register.html");
        echo json_encode('Done');
        exit;
     break;

    case 'data_user':
        $json = decode_token($_POST['token']);
        $daoLog = new DAOLogin();
        $rdo = $daoLog->select_data_user($json['username']);
        echo json_encode($rdo);
        exit;
    break;

    case 'actividad':
        if (!isset($_SESSION["tiempo"])) {
            echo json_encode("inactivo");
            exit();
        } else {
            if ((time() - $_SESSION["tiempo"]) >= 1800) { //1800s=30min
            // if ((time() - $_SESSION["tiempo"]) >= 0) { //1800s=30min
                echo json_encode("inactivo");
                exit();
            } else {
                echo json_encode("activo");
                exit();
            }
        }
    break;

    case 'controluser':
        $token_dec = decode_token($_POST['token']);

        if ($token_dec['exp'] < time()) {
            echo json_encode("Wrong_User");
            exit();
        }

        if (isset($_SESSION['username']) && ($_SESSION['username']) == $token_dec['username']) {
            echo json_encode("Correct_User");
            exit();
        } else {
            echo json_encode("Wrong_User");
            exit();
        }
    break;

    case 'refresh_token':
        $old_token = decode_token($_POST['token']);
        $new_token = create_token($old_token['username']);
        echo json_encode($new_token);
        exit;
    break;

    case 'refresh_cookie':
        session_regenerate_id();
        echo json_encode("Done");
        exit;
    break;

    default;
        // include("module/exceptions/views/pages/error404.php");
        include ("view/inc/error404.php");
        break;
}
?>