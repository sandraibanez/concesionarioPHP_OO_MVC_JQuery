<div id="contenido">
<br>
    <br>
    <br>
    <br>
<form method="post" name="alta_car" id="alta_car">
        <h1>coche nuevo</h1>
        <table border='0' >
        
        <tr> 
			<tr>
                <td>id</td>
				<td><input type="text" id="id" name="id" placeholder="id" value=""></td>
                  
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
				<td><input type="text" id="license_number" name="license_number" placeholder="license_number" value=""></td>
                <td><font color="red">
                    <span id="error_license_number" class="error">
                        <?php
                         $error_license_number = null;
                            echo "$error_license_number";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>brand</td>
				<td><input type="text" id="brand" name="brand" placeholder="brand" value=""></td>
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
				<td><input type="text" id="model" name="model"  placeholder="model" value=""></td>
                <td><font color="red">
                    <span id="error_model" class="error">
                        <?php
                        $error_model = null;
                            echo "$error_model";
                        ?>
                    </span>
                </font></font></td>
			</tr>
			<tr> 
				<td>car_plate</td>
				<td><input type="text" id="car_plate" name="car_plate"  placeholder="car_plate" value=""></td>
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
				<td><input type="text" id="km" name="km"  placeholder="km" value=""></td>
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
				<td><input type="text" id="category" name="category"  placeholder="category" value=""></td>
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
                <td><select multiple size="3" id="type[]" name="type[]" placeholder="type">
                    <option value="hibrido">hibrido</option>
                    <option value="electrico">electrico</option>
                    <option value="gasolina">gasolina</option>
                    <option value="diesel">diesel</option>
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
				<td><input type="text" id="comments" name="comments"  placeholder="comments" value=""></td>
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
				<td><input type="text" id="discharge_date" name="discharge_date"  placeholder="discharge_date" value=""></td>
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
                    <option value="rojo">rojo</option>
                    <option value="blanco">blonco</option>
                    <option value="negro">negro</option>
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
                <td><input type="checkbox" id= "extras[]" name="extras[]" placeholder= "extras" value="navegador"/>navegador
                    <input type="checkbox" id= "extras[]" name="extras[]" placeholder= "extras" value="camara_trasera"/>camara_trasera
                    <input type="checkbox" id= "extras[]" name="extras[]" placeholder= "extras" value="carga_inalambrica"/>carga_inalambrica</td>
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
				<td><input type="text" id="car_image" name="car_image" placeholder="car_image" value=""></td>
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
				<td><input type="text" id="price" name="price" placeholder="price" value=""></td>
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
				<td><input type="radio" id="doors" name="doors" placeholder="doors" value="2"/>2
                    <input type="radio" id="doors" name="doors" placeholder="doors" value="4"/>4</td>
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
				<td><input type="text" id="city" name="city" placeholder="city" value=""></td>
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
				<td><input type="text" id="lat" name="lat" placeholder="lat" value=""></td>
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
				<td><input type="text" id="lng" name="lng" placeholder="lng" value=""></td>
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
                <!-- <td><input type="submit" name="create" id="create"/></td> -->
                <td><br><input name="Submit" type="button" class="Button_red_2" onclick="validate('create')" value="Send"/></td>
                <td align="right"><br><a class="Button_green_2" href="index.php?page=controller_cars&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>