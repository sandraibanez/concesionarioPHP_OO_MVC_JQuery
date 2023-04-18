  <?php
    function validate_numeros($id){
        $sql = "SELECT * FROM coches WHERE id='$id'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql)->fetch_object();
        connect::close($conexion);
        return $res;
    }

    // function validate_dni($dni){
    //     $sql = "SELECT * FROM coches WHERE dni='$dni'";

    //     $conexion = connect::con();
    //     $res = mysqli_query($conexion, $sql);
    //     $res = $res->num_rows;
    //     connect::close($conexion);
    //     return $res;
    // } 
 
    
    function validate_create() {
        // $data = 'hola validate php';
        // die('<script>console.log('.json_encode( $data ) .');</script>');

        $check = true;

        $id =  $_POST['id'];
	    $license_number =  $_POST['license_number'];
	    $brand = $_POST['brand'];
	    $model = $_POST['model'];
	    $car_plate =  $_POST['car_plate'];
	    $km =  $_POST['km'];
	    $category =  $_POST['category'];
    	//$type = $_POST['type'];
	    $comments =  $_POST['comments'];
	    $discharge_date =  $_POST['discharge_date'];
	    $color = $_POST['color'];
	   // $extras =  $_POST['extras'];
    	$car_image = $_POST['car_image'];
    	$price =  $_POST['price'];
    	//$doors =  $_POST['doors'];
    	$city = $_POST['city'];
	    $lat =  $_POST['lat'];
    	$lng =  $_POST['lng'];
      $id = validate_numeros($id);
        // if($nombre !== null){
        //     echo '<script language="javascript">setTimeout(() => {
        //         toastr.error("El nombre no puede estar repetido");
        //     }, 1000);</script>';
        //     $check = false;
        // }

            if($id !== null){
            echo '<script language="javascript">setTimeout(() => {
                toastr.error("El id no puede estar repetido");
            }, 1000);</script>';
            $check = false;
        }

        // if($dni !== 0){;
        //     echo '<script language="javascript">setTimeout(() => {
        //         toastr.error("El DNI no puede estar repetido");
        //     }, 1000);</script>';
        //     $check = false;
        // }

        return $check;
    } 
    function validate_update() {
      // $data = 'hola validate php';
      // die('<script>console.log('.json_encode( $data ) .');</script>');

      $check = true;

      $id =  $_POST['id'];
    $license_number =  $_POST['license_number'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $car_plate =  $_POST['car_plate'];
    $km =  $_POST['km'];
    $category =  $_POST['category'];
    //$type = $_POST['type'];
    $comments =  $_POST['comments'];
    $discharge_date =  $_POST['discharge_date'];
    $color = $_POST['color'];
    //$extras =  $_POST['extras'];
    $car_image = $_POST['car_image'];
    $price =  $_POST['price'];
    $doors =  $_POST['doors'];
    $city = $_POST['city'];
    $lat =  $_POST['lat'];
    $lng =  $_POST['lng'];
      // if($nombre !== null){
      //     echo '<script language="javascript">setTimeout(() => {
      //         toastr.error("El nombre no puede estar repetido");
      //     }, 1000);</script>';
      //     $check = false;
      // }

         
      // if($dni !== 0){;
      //     echo '<script language="javascript">setTimeout(() => {
      //         toastr.error("El DNI no puede estar repetido");
      //     }, 1000);</script>';
      //     $check = false;
      // }

      return $check;
  } 
