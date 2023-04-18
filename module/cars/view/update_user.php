<div id="contenido">
<br>
    <br>
    <br>
    <br>
<form method="post" name="update_car" id="update_car">
        <h1>Modificar Coche</h1>
        <table border='0'>
      
        <tr>
                <td>id</td>
				<td><input type="text" id="id" name="id" placeholder="id" value="<?php echo $id['id'];?>" readonly/></td>
                <td><font color="red">
                    <span id="error_id" class="error">
                        <?php
                        $error_id = null;
                            echo "$error_id";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
            
				<td>license_number</td>
				<td><input type="text" id="license_number" name="license_number" placeholder="license_number" value="<?php echo $id['license_number'];?>" ></td>
                <td><font color="red">
                    <span id="error_license_number" class="error">
                        <?php
                        $error_license_number=null;
                            echo "$error_license_number";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>brand</td>
				<td><input type="text" id="brand" name="brand" placeholder="brand" value="<?php echo $id['brand'];?>" ></td>
                <td><font color="red">
                    <span id="error_brand" class="error">
                        <?php
                        $error_brand = null;
                            echo "$error_brand";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>model</td>
				<td><input type="text" id="model" name="model"  placeholder="model" value="<?php echo $id['model'];?>" ></td>
                <td><font color="red">
                    <span id="error_model" class="error">
                        <?php
                        $error_model=null;
                            echo "$error_model";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>car_plate</td>
				<td><input type="text" id="car_plate" name="car_plate"  placeholder="car_plate" value="<?php echo $id['car_plate'];?>" ></td>
                <td><font color="red">
                    <span id="error_car_plate" class="error">
                        <?php
                        $error_car_plate = null;
                            echo "$error_car_plate";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>km</td>
				<td><input type="text" id="km" name="km"  placeholder="km" value="<?php echo $id['km'];?>" ></td>
                <td><font color="red">
                    <span id="error_km" class="error">
                        <?php
                        $error_km = null;
                            echo "$error_km";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>category</td>
				<td><input type="text" id="category" name="category"  placeholder="category" value="<?php echo $id['category'];?>" ></td>
                <td><font color="red">
                    <span id="error_category" class="error">
                        <?php
                        $error_category = null;
                            echo "$error_category";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>type</td>
                <?php
                    $lang=explode(":", $id['type']);
                ?>
                <td><select multiple size="3" id="type[]" name="type[]" placeholder="type">
                    <?php
                        $busca_array=in_array("hibrido", $lang);
                        if($busca_array){
                    ?>
                        <option value="hibrido" selected>hibrido</option>
                    <?php
                        }else{
                    ?>
                        <option value="hibrido">hibrido</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("electrico", $lang);
                        if($busca_array){
                    ?>
                        <option value="electrico" selected>electrico</option>
                    <?php
                        }else{
                    ?>
                        <option value="electrico">electrico</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("gasolina", $lang);
                        if($busca_array){
                    ?>
                        <option value="gasolina" selected>gasolina</option>
                    <?php
                        }else{
                    ?>
                        <option value="gasolina">gasolina</option>
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("diesel", $lang);
                        if($busca_array){
                    ?>
                        <option value="diesel" selected>diesel</option>
                    <?php
                        }else{
                    ?>
                        <option value="diesel">diesel</option>
                    <?php
                        }
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_type" class="error">
                        <?php
                        $error_type = null;
                            echo "$error_type";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>comments</td>
				<td><input type="text" id="comments" name="comments"  placeholder="comments" value="<?php echo $id['comments'];?>" ></td>
                <td><font color="red">
                    <span id="error_comments" class="error">
                        <?php
                        $error_comments = null;
                            echo "$error_comments";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>discharge_date</td>
				<td><input type="text" id="discharge_date" name="discharge_date"  placeholder="discharge_date" value="<?php echo $id['discharge_date'];?>" ></td>
                <td><font color="red">
                    <span id="error_discharge_date" class="error">
                        <?php
                        $error_discharge_date = null;
                            echo "$error_discharge_date";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>color</td>
                <td><select id="color" name="color" placeholder="color">
                    <?php
                        if($id['color']==="rojo"){
                    ?>
                        <option value="rojo" selected>rojo</option>
                        <option value="blanco">blanco</option>
                        <option value="negro">negro</option>
                    <?php
                        }elseif($id['color']==="blanco"){
                    ?>
                        <option value="rojo">rojo</option>
                        <option value="blanco" selected>blanco</option>
                        <option value="negro">negro</option>
                    <?php
                        }else{
                    ?>
                        <option value="rojo">rojo</option>
                        <option value="blanco">blanco</option>
                        <option value="negro" selected>negro</option>
                    <?php
                        }
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_color" class="error">
                        <?php
                        $error_color = null;
                            echo "$error_color";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>extras</td>
                <?php
                    $afi=explode(":", $id['id']);
                ?>
                <td>
                    <?php
                        $busca_array=in_array("navegador", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="navegador" checked/>navegador
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="navegador"/>navegador
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("camara_trasera", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="camara_trasera" checked/>camara_trasera
                    <?php
                        }else{
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="camara_trasera"/>camara_trasera
                    <?php
                        }
                    ?>
                    <?php
                        $busca_array=in_array("carga_inalambrica", $afi);
                        if($busca_array){
                    ?>
                        <input type="checkbox" id= "extras[]" name="extras[]" value="carga_inalambrica" checked/>carga_inalambrica</td>
                    <?php
                        }else{
                    ?>
                    <input type="checkbox" id= "extras[]" name="extras[]" value="carga_inalambrica"/>carga_inalambrica</td>
                    <?php
                        }
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_extras" class="error">
                        <?php
                        $error_extras = null;
                            echo "$error_extras";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>car_image</td>
				<td><input type="text"id="car_image" name="car_image" placeholder="car_image" value="<?php echo $id['car_image'];?>" ></td>
                <td><font color="red">
                    <span id="error_car_image" class="error">
                        <?php
                        $error_car_image = null;
                            echo "$error_car_image";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>price</td>
				<td><input type="text" id="price" name="price" placeholder="price" value="<?php echo $id['price'];?>" ></td>
                <td><font color="red">
                    <span id="error_price" class="error">
                        <?php
                        $error_price = null;
                            echo "$error_price";
                        ?>
                    </span>
                </font></font></td>
			</tr>
           
			<tr> 
				<td>doors</td>
				<td>
                        <?php
                            if ($id['doors']==="2"){
                        ?>
                            <input type="radio" id="doors" name="doors" placeholder="doors" value="2"checked/>2
                            <input type="radio" id="doors" name="doors" placeholder="doors" value="4"/>4
                        <?php
                            }else{
                        ?>
                                <input type="radio" id="doors" name="doors" placeholder="doors" value="2"/>2
                                <input type="radio" id="doors" name="doors" placeholder="doors" value="4"checked/>4
                        <?php

                            }
                        ?>
            
                </td>
                <td><font color="red">
                    <span id="error_doors" class="error">
                        <?php
                        $error_doors = null;
                            echo "$error_doors";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>city</td>
				<td><input type="text"id="city" name="city" placeholder="city" value="<?php echo $id['city'];?>" ></td>
                <td><font color="red">
                    <span id="error_city" class="error">
                        <?php
                        $error_city = null;
                            echo "$error_city";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>lat</td>
				<td><input type="text" id="lat" name="lat" placeholder="lat" value="<?php echo $id['lat'];?>" ></td>
                <td><font color="red">
                    <span id="error_lat" class="error">
                        <?php
                        $error_lat = null;
                            echo "$error_lat";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>lng</td>
				<td><input type="text" id="lng" name="lng" placeholder="lng" value="<?php echo $id['lng'];?>" ></td>
                <td><font color="red">
                    <span id="error_lng" class="error">
                        <?php
                        $error_lng = null;
                            echo "$error_lng";
                        ?>
                    </span>
                </font></font></td>
			</tr>
            <tr>
                <!-- <td><input type="submit" name="update" id="update"/></td> -->
                <td><br><input name="Submit" type="button" class="Button_red_2" onclick="validate('update')" value="Apply"/></td>
                <td align="right"><br><a class="Button_green" href="index.php?page=controller_cars&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>