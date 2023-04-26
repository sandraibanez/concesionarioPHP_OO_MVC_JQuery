<?php
	if (isset($_GET['page'])){
	switch($_GET['page']){
		//die('<script>console.log("hola");</script>');
		case "homepage";
			include("module/home/ctrl/ctrl_home.php");
			break;
			
		case "controller_cars";
			include("module/cars/controller/".$_GET['page'].".php");
			break;
		case "services";
			include("module/services/".$_GET['page'].".php");
			break;
		case "aboutus";
			include("module/aboutus/".$_GET['page'].".php");
			break;
		case "contactus";
			include("module/contact/".$_GET['page'].".php");
			break;
		case "404";
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "503";
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "ctrl_home";
			include("module/home/ctrl/ctrl_home.php");
			break;
		case "ctrl_shop";
			include("module/shop/ctrl/ctrl_shop.php");
			break;
		case "ctrl_login";
			include("module/login/ctrl/ctrl_login.php");
			break;
		case "controller_cart";
			include("module/cart/controller/controller_cart.php");
			break;
		default;
			include("module/home/ctrl/ctrl_home.php");
			break;
	}
}else{
	include("module/home/ctrl/ctrl_home.php");
}
?>