<div id="contenido">
<br>
    <br>
    <br>
    <br>
    <h1>Informacion del coches</h1>
    <p>
    
    <table border='2'>
        <tr>
            <td>id: </td>
            <td>
                <?php
                    echo $id['id'];
                ?>
            </td>
        </tr>
    
        <tr>
            <td>license_number: </td>
            <td>
                <?php
                    echo $id['license_number'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>brand: </td>
            <td>
                <?php
                    echo $id['brand'];
                ?>
            </td>
        </tr>
       
        <tr>
            <td>model: </td>
            <td>
                <?php
                    echo $id['model'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>car_plate: </td>
            <td>
                <?php
                    echo $id['car_plate'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>km </td>
            <td>
                <?php
                    echo $id['km'];
                ?>
            </td>
        </tr>
       
        <tr>
            <td>category: </td>
            <td>
                <?php
                    echo $id['category'];
                ?>
            </td>
            
        </tr>
        
        <tr>
            <td>type: </td>
            <td>
                <?php
                    echo $id['type'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>comments: </td>
            <td>
                <?php
                    echo $id['comments'];
                ?>
            </td>
        </tr>
       
        <tr>
            <td>discharge_date: </td>
            <td>
                <?php
                    echo $id['discharge_date'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>color: </td>
            <td>
                <?php
                    echo $id['color'];
                ?>
            </td>
        </tr>
        <tr>
            <td>extras: </td>
            <td>
                <?php
                    echo $id['extras'];
                ?>
            </td>
        </tr>

        <tr>
            <td>car_image: </td>
            <td>
                <?php
                    echo $id['car_image'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>price: </td>
            <td>
                <?php
                    echo $id['price'];
                ?>
            </td>
        </tr>
        <tr>
            <td>doors: </td>
            <td>
                <?php
                    echo $id['doors'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>city: </td>
            <td>
                <?php
                    echo $id['city'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>lat: </td>
            <td>
                <?php
                    echo $id['lat'];
                ?>
            </td>
        </tr>
        <tr>
            <td>lng: </td>
            <td>
                <?php
                    echo $id['lng'];
                ?>
            </td>
        </tr>
    </table>
    </p>
    <p><a href="index.php?page=controller_cars&op=list">Volver</a></p>
</div>