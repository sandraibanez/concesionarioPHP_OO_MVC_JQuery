<div id="contenido">
    <div class="container">
    	<div class="row">
    			<h3>LISTA DE COCHES</h3>
    	</div>
        <br>
        
    	<div class="row">
        <table>
            
                <tr>
                    <th width=800><h2 data-tr="Add">Añadir coche nuevo</h2></th>
                    <!-- <th width=9500080900><h2 data-tr="Dummies">Dummies</h2></th> -->
                </tr>
                <tr>
                    <th><p><a href="index.php?page=controller_cars&op=create"><img src="view/img/anadir.png"></a></p></th>
                </tr>
                <tr>
                    <!-- <th width=800><h2 data-tr="Add"></h2></th> -->
                    <th width=1500><h2 data-tr="Dummies">Dummies</h2></th>
                </tr>
                <tr>
                    <th><p><a href="index.php?page=controller_cars&op=dummies"><img src="view/img/anadir.png"></a></p></th>
                    <!-- <th><p><a href="index.php?page=controller_cars&op=delete_all"><img src="view/img/Papelera.png"></a></p></th> -->
                </tr>
                <tr>
                    <th width=1500><h2 data-tr="Delete all">Delete All</h2></th>
                </tr>
                <tr>
                    <th><p><a href="index.php?page=controller_cars&op=delete_all"><img src="view/img/Papelera.png"></a></p></th>
                </tr>
            </table>
           
            <!-- <table>
                <tr>
                    <th width=1500><h2 data-tr="Delete all">Delete All</h2></th>
                </tr>
                <tr>
                    <th><p><a href="index.php?page=controller_cars&op=delete_all"><img src="view/img/Papelera.png"></a></p></th>
                </tr>
            </table> -->
    		<!-- <p><a href="index.php?page=controller_cars&op=create"><img src="view/img/anadir.png"></a></p> -->

    		<table>
                <tr>
                    <td width=125><b>id</b></th>
                    <td width=125><b>license_number</b></th>
                    <td width=125><b>brand</b></th>
                    <th width=350><b>model</b></th>
                    <td width=125><b>car_plate</b></th>
                    <td width=125><b>km</b></th>
                    <td width=125><b>category</b></th>
                    <th width=350><b>type</b></th>
                    <td width=125><b>comments</b></th>
                    <td width=125><b>discharge_date</b></th>
                    <td width=125><b>color</b></th>
                    <th width=350><b>extras</b></th>
                    <td width=125><b>car_image</b></th>
                    <td width=125><b>price</b></th>
                    <td width=125><b>doors</b></th>
                    <th width=350><b>city</b></th>
                    <td width=125><b>lat</b></th>
                    <th width=350><b>lng</b></th>
                </tr>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">NO HAY NINGUN COCHE</td>';
                        echo '</tr>';
                    }else{

                        foreach ($rdo as $row) {
                       		echo '<tr>';
                               echo "<td width=125>".$row['id']."</td>";
                               echo "<td width=125>".$row['license_number']."</td>";
                               echo "<td width=125>".$row['brand']."</td>";	
                               echo "<td width=125>".$row['model']."</td>";
                               echo "<td width=125>".$row['car_plate']."</td>";
                               echo "<td width=125>".$row['km']."</td>";	
                               echo "<td width=125>".$row['category']."</td>";
                               echo "<td width=125>".$row['type']."</td>";
                               echo "<td width=125>".$row['comments']."</td>";	
                               echo "<td width=125>".$row['discharge_date']."</td>";
                               echo "<td width=125>".$row['color']."</td>";
                               echo "<td width=125>".$row['extras']."</td>";	
                               echo "<td width=125>".$row['car_image']."</td>";
                               echo "<td width=125>".$row['price']."</td>";
                               echo "<td width=125>".$row['doors']."</td>";	
                               echo "<td width=125>".$row['city']."</td>";
                               echo "<td width=125>".$row['lat']."</td>";
                               echo "<td width=125>".$row['lng']."</td>";
                    	   	echo '<td width=350>';
                            print ("<div class='cars' id='".$row['id']."'>Read</div>");  //READ
                            // echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    	   //	echo '<a class="Button_blue" href="index.php?page=controller_cars&op=read&id='.$row['id'].'">Read</a>';
                    	   	// echo '&nbsp;';
                    	   	echo '<a class="Button_green" href="index.php?page=controller_cars&op=update&id='.$row['id'].'">Update</a>';
                            // echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                               
                    	   	echo '&nbsp;';
                            echo '&nbsp;';
                    	   	echo '<a class="Button_red" href="index.php?page=controller_cars&op=delete&id='.$row['id'].'">Delete</a>';
                            // echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    	   	echo '</td>';
                    	   	echo '</tr>';
                        }
                    }
                ?>
            </table>
            
    	</div>
    </div>
</div>

<!-- modal window -->
<!-- <section id="cars_modal">
    <div id="details_cars" hidden>
        <div id="details">
            <div id="container">
                id: <div id="id"></div></br>
                license_number: <div id="license_number"></div></br>
                brand: <div id="brand"></div></br>
                model: <div id="model"></div></br>
                car_plate: <div id="car_plate"></div></br>
                km: <div id="km"></div></br>
                category: <div id="category"></div></br>
                type: <div id="type"></div></br>
                comments: <div id="comments"></div></br>
                discharge_date: <div id="discharge_date"></div></br>
              
                color: <div id="color"></div></br>
                extras: <div id="extras"></div></br>
                car_image: <div id="car_image"></div></br>
                price: <div id="price"></div></br>
                doors: <div id="doors"></div></br>
                city: <div id="city"></div></br>
                lat: <div id="lat"></div></br>
                lng: <div id="lng"></div></br>
         
            </div>
        </div>
    </div>
</section> -->

<!-- modal window -->
<section id="cars_modal">
    <!-- <div id="details_cars" hidden>
       
            <div id="container">
                <div id="car_content">
                
                </div>
            </div>
       
    </div> -->
</section>