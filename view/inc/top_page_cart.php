<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Concesionario CocheEco</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    	<script type="text/javascript">
        	$(function() {
        		$('#fecha').datepicker({
        			dateFormat: 'dd/mm/yy', 
        			changeMonth: true, 
        			changeYear: true, 
        			yearRange: '1900:2016',
        			onSelect: function(selectedDate) {
        			}
        		});
        	});
	    </script>
	    <link href="view/assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="view/assets/css/style4.css" rel="stylesheet" type="text/css" />
		<link href="view/assets/css/cart.css" rel="stylesheet" type="text/css"/>
		<link href="view/assets/css/bootstrap.css" rel="bootstrapsheet" type="text/css" />
	    <script src="module/cars/model/validate_cars.js"></script> 
		<script src="module/cart/model/cart.js"></script> 
		<!-- <script src="module/shop/model/ctrl_shop.js"></script> -->
		             <!-- module\cars\model\validate_cars.js -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script type="text/javascript" src="view/js/utils.js"></script>
		<script type="text/javascript" src="view/js/activity_user.js"></script>
		<!-- <script src="view/assets/plugins/jquery-1.10.2.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS  -->
    	<script src="view/assets/plugins/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
    	<script src="view/assets/js/utils.js"></script>
		
		
    </head>
    <body>