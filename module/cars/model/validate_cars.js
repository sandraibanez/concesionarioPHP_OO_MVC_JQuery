
function validate_id(texto){
    if (texto.length > 0){
       // var reg=/^[0-9]{1,2}$/;
        var reg=/^[0-9]{1,10}$/;
        return reg.test(texto);
    }
    return false;
}
function validate_km(texto){
    //console.log("check");
    if (texto.length > 0){
       // var reg=/^[0-9]{1,2}$/;
        var reg=/^[0-9]{1,10}$/;
        return reg.test(texto);
    }
    return false;
}
function validate_doors(texto){
    
        var i;
        var ok=0;
        for(i=0; i<texto.length;i++){
            if(texto[i].checked){
                ok=1
            }
        }
     
        if(ok==1){
            return true;
        }
        if(ok==0){
            return false;
        }
}
//-------------------------------------------------------------------
function validate_numeros_letras(texto){
    if (texto.length > 0){
        //var reg=/^[a-zA-Z0-9]*$/;
        var reg=/^[0-9a-zA-Z]{1,}$/;
        return reg.test(texto);
    }
    return false;
}
function validate_car_plate(texto){
    if (texto.length > 0){
        //var reg=/^[a-zA-Z0-9]*$/;
        var reg=/^[0-9a-zA-Z]{1,}$/;
        return reg.test(texto);
    }
    return false;
}
function validate_category(texto){
    if (texto.length > 0){
        //var reg=/^[a-zA-Z0-9]*$/;
        var reg=/^[0-9a-zA-Z]{1,}$/;
        return reg.test(texto);
    }
    return false;
}
//------------------------------------------------------------
function validate_brand(texto){
    if (texto.length > 0){
        var reg=/^[a-zA-Z]*$/;
        return reg.test(texto);
    }
    return false;
}
function validate_model(texto){
    if (texto.length > 0){
        var reg=/^[a-zA-Z]*$/;
        return reg.test(texto);
    }
    return false;
}
function validate_type(array){
    var check=false;
    for ( var i = 0, l = array.options.length, o; i < l; i++ ){
        o = array.options[i];
        if ( o.selected ){
            check= true;
        }
    }
    return check;
}
function validate_comments(texto){
    if (texto.length > 0){
        var reg=/^[a-zA-Z]|([a-zA-Z]+( [a-zA-Z]){1,})/;
        return reg.test(texto);
    }
    return false;
}
function validate_color(texto){
    if (texto.length > 0){
        return true;
    }
    return false;
}
function validate_extras(array){
    var i;
    var ok=0;
    for(i=0; i<array.length;i++){
        if(array[i].checked){
            ok=1
        }
    }
 
    if(ok==1){
        return true;
    }
    if(ok==0){
        return false;
    }
}
function validate_city(texto){
    if (texto.length > 0){
        var reg=/^[a-zA-Z]*$/;
        return reg.test(texto);
    }
    return false;
}
//---------------------------------------------------------------
function validate_string_2(texto){
    if (texto.length > 0){
        var reg=/^[a-z]+(\_[0-9a-z]{1,})+((\_[a-z]{1,})|())+(\.[a-z]{1,})?/;
        return reg.test(texto);
    }
    return false;
}
//---------------------------------------------------------------
function validate_precio(texto){
    if (texto.length > 0){
        //var reg=/^[0-9](?=.*\W+)*$/;
        var reg=/^[0-9]+(\.[0-9]{1,})?€/;
        //var reg=/(?=^.[0-9]$)((?=.*\d)|(?=.*\W+)).*$/;
        return reg.test(texto);
    }
    return false;
}
//---------------------------------------------------------------
function validate_numero_2(texto){
    if (texto.length > 0){
        // var reg=/^[a-zA-Z]*$/;
        var reg=/^[0-9]+(\.[0-9]{1,})?$/;
              
       // var reg=/^[0-9]*$/;
        return reg.test(texto);
    }
    return false;
}
function validate_decimal(texto){
    if (texto.length > 0){
        // var reg=/^[a-zA-Z]*$/;
        //var reg=/^[0-9]+(\.[0-9]{1,})?$/;
        var reg=/^[-+]?[0-9]+(\.[0-9]{1,})?$/;
       // var reg=/^[0-9]*$/;
        return reg.test(texto);
    }
    return false;
}
//---------------------------------------------------------------
function validate_fecha(texto){
    if (texto.length > 0){
        var reg=/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/;
        return reg.test(texto);
    }
    return false;
}
//---------------------------------------------------------------

function validate(op){
    
   // die('<script>console.log("hola");</script>');
   
    // return true;

    var check=true;
    var v_id=document.getElementById('id').value;
    // console.log('hola validate js');
    var v_km=document.getElementById('km').value;
    var v_doors=document.getElementsByName('doors');
//-------------------------------------------------------------
    var v_numeros_letras=document.getElementById('license_number').value;
    var v_car_plate=document.getElementById('car_plate').value;
    var v_category=document.getElementById('category').value;
//---------------------------------------------------------------
    var v_brand=document.getElementById('brand').value;
    var v_model=document.getElementById('model').value;
    var v_type=document.getElementById('type[]');
    var v_comments=document.getElementById('comments').value;
    var v_color=document.getElementById('color').value;
    var v_extras=document.getElementsByName('extras[]');
    var v_city=document.getElementById('city').value;
//---------------------------------------------------------------
    var v_fecha=document.getElementById('discharge_date').value;
//---------------------------------------------------------------
    var v_string_2=document.getElementById('car_image').value;
//---------------------------------------------------------------
    var v_precio=document.getElementById('price').value;
//---------------------------------------------------------------
    var v_numero_2=document.getElementById('lat').value;
    var v_decimal=document.getElementById('lng').value;
//---------------------------------------------------------------
    

    var r_id=validate_id(v_id);
    var r_km=validate_km(v_km);
    var r_doors=validate_doors(v_doors);
    //--------------------------------------
    var r_numeros_letras=validate_numeros_letras(v_numeros_letras);
    var r_car_plate=validate_car_plate(v_car_plate);
    var r_category=validate_category(v_category);
    //--------------------------------------
    var r_model= validate_model(v_model);
    var r_brand= validate_brand(v_brand);
    var r_type= validate_type(v_type);
    var r_comments=validate_comments(v_comments);
    var r_color=validate_color(v_color);
    var r_extras=validate_extras(v_extras);
    var r_city=validate_city(v_city);
    //--------------------------------------
    var r_fecha=validate_fecha(v_fecha);
    var r_string2=validate_string_2(v_string_2);
    var r_precio=validate_precio(v_precio);
    var r_numero2=validate_numero_2(v_numero_2);
    var r_decimal=validate_decimal(v_decimal);
    
    if(!r_id){
        //console.log(v_id);
        document.getElementById('error_id').innerHTML=" * El numero introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_id').innerHTML="";
        
    }
    if(!r_km){
        //console.log(v_id);
        document.getElementById('error_km').innerHTML=" * El numero introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_km').innerHTML="";
        
    }
    if(!r_doors){
       
        document.getElementById('error_doors').innerHTML=" * no has seleccionado ningun valor";
        check=false;
    }else{
        document.getElementById('error_doors').innerHTML="";
        
    }
    if(!r_numeros_letras){
        document.getElementById('error_license_number').innerHTML=" * Los numeros y letras introducidos no son validos";
        check=false;
    }else{
        document.getElementById('error_license_number').innerHTML="";
    }
    if(!r_car_plate){
        document.getElementById('error_car_plate').innerHTML=" * Los numeros y letras introducidos no son validos";
        check=false;
    }else{
        document.getElementById('error_car_plate').innerHTML="";
    }
    if(!r_category){
        document.getElementById('error_category').innerHTML=" * Los numeros y letras introducidos no son validos";
        check=false;
    }else{
        document.getElementById('error_category').innerHTML="";
    }
    if(!r_brand){
        document.getElementById('error_brand').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_brand').innerHTML="";
    }
    if(!r_model){
        document.getElementById('error_model').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_model').innerHTML="";
    }
    if(!r_type){
        document.getElementById('error_type').innerHTML=" * no has seleccionado ningun tipo";
        check=false;
    }else{
        document.getElementById('error_type').innerHTML="";
    }
    if(!r_comments){
        document.getElementById('error_comments').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_comments').innerHTML="";
    }
    if(!r_color){
        document.getElementById('error_color').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_color').innerHTML="";
    }
    if(!r_extras){
        document.getElementById('error_extras').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_extras').innerHTML="";
    }
    if(!r_city){
        document.getElementById('error_city').innerHTML=" * la palabra introducida no es valida";
        check=false;
    }else{
        document.getElementById('error_city').innerHTML="";
    }
    if(!r_fecha){
        document.getElementById('error_discharge_date').innerHTML=" * no has introducido ninguna fecha";
        check=false;
    }else{
        document.getElementById('error_discharge_date').innerHTML="";
    }
   
    if(!r_string2){
        document.getElementById('error_car_image').innerHTML=" * no has introducido ningun enlace de la imagen del coche";
        check=false;
    }else{
        document.getElementById('error_car_image').innerHTML="";
    }
    if(!r_precio){
        document.getElementById('error_price').innerHTML=" * no has introducido ningun precio del coche";
        check=false;
    }else{
        document.getElementById('error_price').innerHTML="";
    }
    if(!r_numero2){
        document.getElementById('error_lat').innerHTML=" * no has introducido ningun numero decimal";
        check=false;
    }else{
        document.getElementById('error_lat').innerHTML="";
    }
    if(!r_decimal){
        document.getElementById('error_lng').innerHTML=" * no has introducido ningun numero decimal";
        check=false;
    }else{
        document.getElementById('error_lng').innerHTML="";
    }
    if (check){
        if (op === 'create'){
            document.alta_car.submit();
            document.alta_car.action = "index.php?page=controller_cars&op=create";
        }
        if (op === 'update'){
            document.update_car.submit();
            document.update_car.action = "index.php?page=controller_cars&op=update";
        }
    }
    
    }
    function operaciones_cars (operacion){
        if(operacion==='delete'){
            document.delete_user.submit();
            document.delete_user.action = "index.php?page=controller_cars&op=delete&id=<?php echo $_GET['id']; ?>";
        }
    
        if(operacion==='delete_all'){
            document.delete_all_cars.submit();
            document.delete_all_cars.action = "index.php?page=controller_cars&op=delete_all"; 
        }
        if(operacion==='dummies'){
             console.log('hola validate js');
            document.dummies_cars.submit();
            document.dummies_cars.action ="index.php?page=controller_cars&op=dummies";
        }
    }
    // $(document).ready(function () {
        
    //         $('.cars').click(function () {
                
    //             var id = this.getAttribute('id');
    //             console.log(id);
    //             //alert(id);
    
    //           ajaxPromise('module/cars/controller/controller_cars.php?op=read_modal&id=' + id, 'GET', 'JSON')
    // .then(function(data) {
    //                 //
    //                 var json = JSON.parse(data);
    //                 console.log(json);
                    
    //                 if(json === 'error') {
    //                     //console.log(json);
    //                     //pintar 503
    //                     window.location.href='index.php?page=503';
    //                 }else{
                    
    //                     $("#id").html(json.id);
    //                     $("#license_number").html(json.license_number);
    //                     $("#brand").html(json.brand);
    //                     $("#model").html(json.model);
    //                     $("#car_plate").html(json.car_plate);
    //                     $("#km").html(json.km);
    //                     $("#category").html(json.category);
    //                     $("#type").html(json.type);
    //                     $("#comments").html(json.comments);
    //                     $("#discharge_date").html(json.discharge_date);
    //                     $("#color").html(json.color);
    //                     $("#extras").html(json.extras);
    //                     $("#car_image").html(json.car_image);
    //                     $("#price").html(json.price);
    //                     $("#doors").html(json.doors);
    //                     $("#city").html(json.city);
    //                     $("#lat").html(json.lat);
    //                     $("#lng").html(json.lng);
             
    //                      $("#details_cars").show();
    //                     $("#cars_modal").dialog({
    //                         width: 850, //<!-- ------------- ancho de la ventana -->
    //                         height: 500, //<!--  ------------- altura de la ventana -->
    //                         //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
    //                         //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
    //                         resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
    //                         //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
    //                         modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
    //                         buttons: {
    //                             Ok: function () {
    //                                 $(this).dialog("close");
    //                             }
    //                         },
    //                         show: {
    //                             effect: "blind",
    //                             duration: 1000
    //                         },
    //                         hide: {
    //                             effect: "explode",
    //                             duration: 1000
    //                         }
    //                     });
    //                 }//end-else
    //             });
    //         });
    //     });

        function showModal(title_Car, id) {
            $("#details_cars").show();
            $("#cars_modal").dialog({
                title: title_Car,
                width : 850,
                height: 500,
                resizable: "false",
                modal: "true",
                hide: "fold",
                show: "fold",
                buttons : {
                    Update: function() {
                                window.location.href = 'index.php?page=controller_cars&op=update&id=' + id;
                            },
                    Delete: function() {
                                window.location.href = 'index.php?page=controller_cars&op=delete&id=' + id;
                            }
                }
            });
        }
        
        function loadContentModal() {
            
            $('.cars').click(function () {
                
                var id = this.getAttribute('id');
                console.log (id);
                ajaxPromise('module/cars/controller/controller_cars.php?op=read_modal&modal=' + id, 'GET', 'JSON')
                .then(function(data) {
                    // console.log ('hola');
                    //var data = JSON.parse(data);
                    $('<div></div>').attr('id', 'details_car', 'type', 'hidden').appendTo('#cars_modal');
                    $('<div></div>').attr('id', 'container').appendTo('#details_car');
                    $('#container').empty();
                    $('<div></div>').attr('id', 'car_content').appendTo('#container');
                    $('#car_content').html(function() {
                        var content = "";
                        for (row in data) {
                            content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                        }
                        return content;
                        });
                        showModal(title_car = data.brand + " " + data.model, data.id);
                })
                .catch(function() {
                    //window.location.href = 'index.php?page=errors&op=503&desc=List error';
                });
            });
         }
        
         $(document).ready(function() {
            loadContentModal();
        });