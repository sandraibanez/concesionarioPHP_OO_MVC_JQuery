<?php
    if ((isset($_GET['page'])) && ($_GET['page']==="controller_cars") ){
		include("view/inc/top_page_cars.php");
	}elseif ((isset($_GET['page'])) && ($_GET['page']==="ctrl_shop") ){
        include("view/inc/top_page_shop.php");  
     } elseif ((isset($_GET['page'])) && ($_GET['page']==="ctrl_home") ){
		include("view/inc/top_page_home.php");
	} elseif ((isset($_GET['page'])) && ($_GET['page']==="ctrl_login") ){
		include("view/inc/top_page_login.php");
	}elseif ((isset($_GET['page'])) && ($_GET['page']==="controller_cart") ){
		include("view/inc/top_page_cart.php");
	}else{
		include("view/inc/top_page.php");
	}
	session_start();
?>
<div id="wrapper">		
    <div id="header">    	
    	<?php
    	    include("view/inc/header.php");
    	?>        
    </div>  
    <!-- <div id="menu">
   <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                </button>
                <a class="navbar-brand" href="#">COCHEECO</a>
            </div>
                   
        </div> -->
		
		<nav class="main-menu">
        <div class="scrollbar" id="style-1">
		<?php      
					 include("view/inc/menu.php");
					?> 
		</div>
		</nav>
		<!-- <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
					<--?php      
					 include("view/inc/menu.php");
					?> 
                     
                    
                </ul>
        </div> -->
        
</div>

		 <!--?php
		    include("view/inc/menu.php");
		?> -->
    </div>	
	
    <div id="">
    	<?php 
		    include("view/inc/pages.php"); 
		?>        
        <br style="clear:both;" />
    </div>
    <div id="footer">   	  
	    <?php
	        include("view/inc/footer.php");
	    ?>        
    </div>
</div>
<?php
    include("view/inc/bottom_page.php");
?>
 