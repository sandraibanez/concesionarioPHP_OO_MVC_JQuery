function add_cart(id_car){
    // console.log(id_car);
    console.log('cart_add_cart');
    var id_car3 = localStorage.getItem('id_car');
    var token = localStorage.getItem('token');
    var codigo_producto = id_car3 ;
    localStorage.removeItem('redirect_cart');
    // var codigo_producto2 =  id_car;
    // var id_car2 = localStorage.getItem('id');
    // $('.button').attr("id");
    // var id_car = $('.button').attr("id_car");
    console.log(codigo_producto);
    // console.log(codigo_producto2);
    console.log(token);

    const redirect_cart = [];
        redirect_cart.push();
        
    if(localStorage.getItem('token') == null){
        localStorage.setItem('redirect_cart', redirect_cart);
        toastr.warning("Debes de iniciar session");
        setTimeout("location.href = 'index.php?page=ctrl_login&op=list';", 1000);
    }else{
        localStorage.removeItem('redirect_cart');
        // ajaxPromise('module/cart/controller/controller_cart.php?op=insert_cart&id='+ id_car,'POST', 'JSON',{'token':token,'codigo_producto':codigo_producto})
        ajaxPromise("module/cart/controller/controller_cart.php?op=insert_cart",'POST', 'JSON',{'token':token,'codigo_producto':codigo_producto})
        .then(function(data) { 
            console.log(data);
            //toastr
        }).catch(function() {
            window.location.href = 'index.php?page=error503'
        });   
    }
}

function load_cart(){
    // $(document).on('click','',function () {
    console.log('cart_load_cart');
    var token = localStorage.getItem('token');
    console.log(token);
    // const redirect_cart2 = [];
    // redirect_cart2.push();
    if(localStorage.getItem('token') == null){
        // localStorage.setItem('redirect_cart2', redirect_cart2);
        // toastr.warning("Debes de iniciar session");
        // setTimeout("location.href = 'index.php?page=ctrl_login&op=list';", 1000);
        // const redirect_cart = [];
        // redirect_cart.push();
        // localStorage.setItem('redirect_cart', redirect_cart);
        // toastr.warning("Debes de iniciar session");
        // // setTimeout(' window.location.href = "index.php?page=controller_login&op=login_view"; ',1000);
        // setTimeout("location.href = 'index.php?page=ctrl_login&op=list';", 1000);
    }else{
        localStorage.removeItem('redirect_cart2');
        ajaxPromise("module/cart/controller/controller_cart.php?op=load_cart",'POST', 'JSON',{'token':token})
        .then(function(data) { 
            console.log(data);
            var total_price = 0;
            for (row in data) {
                console.log(data);
                console.log(data[row].qty_max);
                $('<div></div>').appendTo('.cart__products')
                        .html(
                // $(".cart__products").append(
                //     '<div class="basket-product" id="'+ data[row].codigo_producto +'"><div class="item"><div class="product-image">'+
                //     '<img src="'+data[row].img_car+'" alt="Placholder Image 2" class="product-frame"></div>'+
                //     '<div class="product-details"><h1 class="title__cart"><strong><span class="item-quantity">cantidad de coches disponibles de ese coche 1</span></strong> <br>'
                //    + "<table>"+
                //             '<tr>'+"brand "+
                //             '<td>'+data[row].name_brand  +'</td>'+ '<td>&nbsp;&nbsp;'+ data[row].name_model  +'</td>'+ '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+  data[row].gear_shift  +'</td>'+
                //             '</tr>'+
                //             '<tr>'+"modelo "+
                //             '</tr>'+
                //             '<tr>'+"type car"+'</tr>'+
                //      "</table>"+'</h1>'+
                //     // +'<p>brand</p>'+data[row].name_brand  +'<br>'+'<p>modelo</p>'+  data[row].name_model+'<br><p>type car</p>'+  data[row].gear_shift+'</h1>'+

                //     '<p class="par"><strong>Navy, Size 10</strong></p><p class="par">Product Code - '+ data[row].codigo_producto +'</p></div></div>'+
                //     '<div class="price">' + data[row].price + "€"+ '</div><div class="quantity"><input id="'+ data[row].codigo_producto +'" type="number" value="' + data[row].qty + '" min="1" class="quantity-field"></div>'+
                    
                //     '<div id="'+ data[row].codigo_producto +'" class="subtotal"><strong>precio total : ' + (data[row].price)*(data[row].qty) +  "€"+'</strong></div><div class="remove"><button class="button__remove" id="'+ data[row].codigo_producto +'">Remove</button>'+
                //     '<button class="checkout-cta" id="'+ data[row].codigo_producto +'">checkout</button></div></div></div><br>'
            //    ==========================================================
               
                '<table>'+
                '<tr><div class="basket-product" id="'+ data[row].codigo_producto+'"><div class="item">'+
                   ' <td class="image">'+ '<img src="'+data[row].img_car+'" alt="Placholder Image 2" class="product-frame">' +'</td>'+
                   '<td class="name">'+ "<table>"+
                   '<tr>'+"brand "+
                   '<td>'+data[row].name_brand  +'</td>'+ '<td>'+ data[row].name_model  +'</td>'+ '<td>'+  data[row].gear_shift  +'</td>'+
                   '</tr>'+
                   '<tr>'+"modelo "+
                   '</tr>'+
                   '<tr>'+"type car"+'</tr>'+
            "</table>"+'</td>'+

            '<td class="price">' + data[row].price + "€"+'</td>'+
            '<td class="amount">'+'<p>'+"cantidad"+'</p>'+'<input class="quantity-field" id="'+ data[row].codigo_producto +'" type="number" value="' + data[row].qty + '" min="1" max="' + data[row].qty_max + '">"' + data[row].qty_max + '"</td>'+
            '<td id="'+ data[row].codigo_producto +'" class="pricesubtotal">'+'<strong>precio total : ' + (data[row].price)*(data[row].qty) +  "€"+'</strong>'+'</td>'+
            '<td class="remove">'+'<button class="button__remove" id="'+ data[row].codigo_producto +'">Remove</button>'+'</td>'+
               ' </tr></div></div></div>'+
             '  </table>'+
             '<p>'+ data[row].qty_max +'</p>'+
             '<button class="checkout-cta" id="'+ data[row].codigo_producto +'">checkout</button>'
                )   
                var total_price = total_price + (data[row].precio)*(data[row].qty);
            }    
            $(".subtotal-value").append(total_price);
            $(".total-value").append(total_price);
        }).catch(function() {
            window.location.href = 'index.php?page=error503'
        });   
    }   
//  }); 
}

function remove_cart(){
    console.log('cart_remove_cart');
    $(document).on('click','.button__remove',function () {
        // var codigo_producto = this.getAttribute('id');
        var id_car3 = localStorage.getItem('id_car');
        var token = localStorage.getItem('token');
        // var codigo_producto = id_car3 ;
        var codigo_producto = this.getAttribute('id');
        console.log(codigo_producto);
        if(localStorage.getItem('token') == null){
    //         setTimeout(' window.location.href = "index.php?page=controller_login&op=login_view"; ',1000);
        }else{
            ajaxPromise("module/cart/controller/controller_cart.php?op=delete_cart",'POST', 'JSON',{'token':token,'codigo_producto':codigo_producto})
            .then(function(data) { 
                console.log(data);
                location.reload();
                // location.reload();
                $('div.basket-product#'+ codigo_producto).empty();
                // $('div.p#'+ codigo_producto).empty();

            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });   
        }
    });
}

function change_qty(){
    console.log('cart_change_qty');
    $(document).on('input','.quantity-field',function () {
        // var codigo_producto =  this.getAttribute('id');
        var id_car3 = localStorage.getItem('id_car');
        var token = localStorage.getItem('token');
        // var codigo_producto = id_car3 ;
        var codigo_producto = this.getAttribute('id') ;
        
        
        var qty = $("#"+codigo_producto+".quantity-field" ).val();
        // localStorage.setItem('qty', qty);   
        // "#" + id_car + ".fa-heart"  'div.basket-product#'+ codigo_producto  ".quantity-field"
        console.log(qty);
        // console.log(qty2);
        console.log(codigo_producto);
        if(localStorage.getItem('token') == null){
    //         setTimeout(' window.location.href = "index.php?page=controller_login&op=login_view"; ',1000);
        }else{
            ajaxPromise("module/cart/controller/controller_cart.php?op=update_qty",'POST', 'JSON',{'token':token,'codigo_producto':codigo_producto,'qty':qty})
            .then(function(data) { 
                console.log(data);
                $('div.basket-product#'+ codigo_producto).empty();
                // $('div.p#'+ codigo_producto).val();
                // console.log();
                location.reload();
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });   
        }
    });
}

function checkout(){
    console.log('cart_checkout');
    var token = localStorage.getItem('token');
    $(document).on('click','.checkout-cta',function () {
        if(localStorage.getItem('token') == null){
//     //         setTimeout(' window.location.href = "index.php?page=controller_login&op=login_view"; ',1000);
        }else{
            ajaxPromise("module/cart/controller/controller_cart.php?op=checkout",'POST', 'JSON',{'token':token})
            .then(function(data) { 
                console.log(data);
                // $('div.basket-product#'+ codigo_producto).empty();
                // window.location.href = 'index.php?page=controller_home&op=homepage'
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });   
        }
    });
}

$(document).ready(function(){
//     // console.log('hola_carrito');
    load_cart();
    remove_cart();
    change_qty();
    checkout();
});