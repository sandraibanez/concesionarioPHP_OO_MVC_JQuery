<div id="contenido">
<br>
    <br>
    <br>
    <br>
    <form  method="post" name="delete_user" id="delete_user" >
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>¿Desea seguro borrar el coche <?php echo $_GET['id']; ?> 
                y con <?php echo $license_number['license_number']; ?>
                ?</h3></td>
                <input id="id_car" name="id_car" type="hidden" value="hola"/>
            </tr>
            <tr>
                <td align="center"><button type="button" class="Button_green"name="delete" id="delete" onclick="operaciones_cars('delete')" value="Send">Aceptar</button></td>
                <td align="center"><a class="Button_red" href="index.php?page=controller_cars&op=list">Cancelar</a></td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>