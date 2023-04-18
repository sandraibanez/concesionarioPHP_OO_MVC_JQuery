<div id="contenido">
    <br>
    <br>
    <br>
    <br>
    <form  method="post" name="delete_all_cars" id="delete_all_cars">
    <table border='0'>
            <tr>
            <th width=1500><h3>Do you want to delete the whole list of cars?</h3></th>
            <input id="id_car" name="id_car" type="hidden" value="hola"/>
            </tr>
            
        </table>
        <table border='0'>
            <tr>
                <td width=680 align="right"><button type="button" class="Button_green" name="delete_all_cars" id="delete_all_cars" onclick="operaciones_cars('delete_all')" value="Send">Accept</button></td>
                <td><a class="Button_red" href="index.php?page=controller_cars&op=list">Cancel</a></td>
            </tr>
        </table>
        <br>
        <br>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>