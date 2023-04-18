<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.3/' ;
 include($path . "module/cars/model/DAOUser.php");
 
    // $data = 'hola crtl user';
    // die('<script>console.log('.json_encode( $data ) .');</script>');
    
    //include ("module/cars/model/DAOUser.php");
    
    //session_start();
    //die('<script>console.log("hola");</script>');
    //die('<script>console.log('.json_encode(  session_start() ) .');</script>');
      
    
    switch($_GET['op']){
        case 'list';
            // $data = 'hola crtl user';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
              
            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_all_cars();
                //die('<script>console.log('.json_encode( $rdo->num_rows ) .');</script>');
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/cars/view/list_user.php");
    		}
            break;
            
        case 'create';
            // $data = 'hola crtl user create';
            // die('<script>console.log('.json_encode( $data ) .');</script>');

            include("module/cars/model/validate.php");
            
            $check = true;
            
            if ($_POST){
                //  $data = 'hola create post user';
                //  die('<script>console.log('.json_encode( $data ) .');</script>');
                // die('<script>console.log('.json_encode( $_POST ) .');</script>');

                $check=validate_create();
                //die('<script>console.log('.json_encode( $check ) .');</script>');
               
                if ($check){
                   // die('<script>console.log('.json_encode( $check ) .');</script>');
                     //die('<script>console.log('.json_encode( $_POST ) .');</script>');
                     $_SESSION['id']=$_POST;
                    try{
                        $daouser = new DAOUser();
    		            $rdo = $daouser->insert_cars($_POST);
                        // die('<script>console.log('.json_encode( $rdo ) .');</script>');
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
                        echo '<script language="javascript">setTimeout(() => {
                            toastr.success("Creado en la base de datos correctamente");
                        }, 1000);</script>';
                        echo '<script language="javascript">setTimeout(() => {
                            window.location.href="index.php?page=controller_cars&op=list";
                        }, 2000);</script>';
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }
            include("module/cars/view/create_user.php");
            break;
            
        case 'update';
            include("module/cars/model/validate.php");
            $check = true;
            
            if ($_POST){
            //if (isset($_POST)){
                // $data = 'hola update post user';
                // die('<script>console.log('.json_encode( $_POST ) .');</script>');
                $check=validate_update();
                //die('<script>console.log('.json_encode( $check ) .');</script>');
                
                if ($check){
                    $_SESSION['id']=$_POST;
                    //die('<script>console.log('.json_encode( $_POST ) .');</script>');
                    try{
                        $daouser = new DAOUser();
    		            $rdo = $daouser->update_cars($_POST);
                        //die('<script>console.log('.json_encode( $rdo ) .');</script>');
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
            			echo '<script language="javascript">setTimeout(() => {
                            toastr.success("Modificado en la base de datos correctamente");
                        }, 1000);</script>';
                        echo '<script language="javascript">setTimeout(() => {
                            window.location.href="index.php?page=controller_cars&op=list";
                        }, 2000);</script>';
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }else{
                    echo '<script language="javascript">setTimeout(() => {
                        window.location.href="index.php?page=controller_cars&op=list";
                    }, 2000);</script>';
                }
            }
            
            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_cars($_GET['id']);
            	$id=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
        	    include("module/cars/view/update_user.php");
    		}
            break;
            
        case 'read';
            // $data = 'hola crtl user read';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            // die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');

            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_cars($_GET['id']);
            	$id=get_object_vars($rdo);
                //die('<script>console.log('.json_encode( $user ) .');</script>');
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/cars/view/read_user.php");
    		}
            break;
            
        case 'delete';
            // $data = 'hola crtl user delete';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
            // die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');

            if ($_POST){
                //die('<script>console.log('.json_encode( $_GET['id'] ) .');</script>');
                try{
                    $daouser = new DAOUser();
                	$rdo = $daouser->delete_cars($_GET['id']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			    die('<script>window.location.href="'.$callback .'";</script>');
                }
            	if($rdo){
                    echo '<script language="javascript">setTimeout(() => {
                        toastr.success("Borrado en la base de datos correctamente");
                    }, 1000);</script>';
                    echo '<script language="javascript">setTimeout(() => {
                        window.location.href="index.php?page=controller_cars&op=list";
                    }, 2000);</script>';
        		}else{
        			$callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
        		}
            }
            
            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_cars($_GET['id']);
            	$license_number=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            include("module/cars/view/delete_user.php");
            break;
            
            case 'delete_all';
            //die('<script>console.log("hola");</script>');
            if ($_POST){
           // die('<script>console.log("hola");</script>');
            try{
                $daouser = new DAOUser();
                $result = $daouser -> delete_all_cars();
            }catch (Exception $e){
                $callback = 'index.php?page=errors&op=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if($result){
                echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
                $callback = 'index.php?page=controller_cars&op=list';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                $callback = 'index.php?page=errors&op=503&desc=Delete all error';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            }
        
        include("module/cars/view/delete_all_cars.php");
        break;

            case 'dummies';
            //  $data = 'hola crtl user dammies';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
           // die('<script>console.log('.json_encode( $_POST['dummies']) ) .');</script>';
            if ($_POST){
              // die('<script>console.log("hola");</script>');
                try{
                    
                    $daouser = new DAOUser();
                    $result = $daouser -> dummies_cars();
                    // die('<script>console.log("hola");</script>');
                }catch (Exception $e){
                    $callback = 'index.php?page=errors&op=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
    
                if($result){
                    echo '<script language="javascript">alert("Lista de coches creada correctamente")</script>';
                    $callback = 'index.php?page=controller_cars&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=errors&op=503&desc=Dummies error';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }
            
            include("module/cars/view/dummies_cars.php");
            break;
            case 'read_modal';
                //echo $_GET["modal"]; 
                //exit;
    
                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->select_cars($_GET['modal']);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $cars=get_object_vars($rdo);
                    echo json_encode($cars);
                    //echo json_encode("error");
                    exit;
                }
            break;
            
            default;
            include ("view/inc/error404.php");
            // $callback = 'index.php?page=errors&op=404';
            // die('<script>window.location.href="'.$callback .'";</script>');
            break;
    }

   // connect::close($conexion); 