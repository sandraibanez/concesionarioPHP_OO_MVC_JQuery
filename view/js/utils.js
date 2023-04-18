function ajaxPromise(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        }); 
    });
}
// ===================================================================================

//================LOAD-HEADER================
function load_menu() {
    // console.log('php');
    $('#logout').empty();
    var token = localStorage.getItem('token');
    if (token) {
        ajaxPromise('module/login/ctrl/ctrl_login.php?op=data_user', 'POST', 'JSON', { 'token': token })
            .then(function(data) {
                console.log(data);
                if (data.type_user == "client") {
                    console.log("Client loged");
                    $('.opc_CRUD').empty();
                    $('.opc_exceptions').empty();
                } else {
                    console.log("Admin loged");
                    $('.opc_CRUD').show();
                    $('.opc_exceptions').show();
                }
                $('.log_icon').empty();
                $('#user_info').empty();
                // $('<img src="' + data.avatar + '"alt="Robot">').appendTo('.log-icon');
                $('<img src="' + data.avatar + '" alt="Robot">').css({'width': '50px', 'height': '50px', 'border-radius':'25px'}).appendTo('.log_icon');

                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('#des_inf_user')
                    .html(
                        '<a id="logout"><i id="icon-logout" class="fa-solid fa-right-from-bracket"></i></a>' +
                        '<a>' + data.username + '<a/>'

                    )

            }).catch(function() {
                console.log("Error al cargar los datos del user");
            });
    } else {
        console.log("No hay token disponible");
        document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        $('#logout').hide();
        $('.opc_CRUD').empty();
        $('.opc_exceptions').empty();
        $('#user_info').hide();
        $('.log_icon').empty();
        $('<a href="index.php?module=ctrl_login&op=login-register_view"></a>').appendTo('.log_icon');
        // $('<a href="index.php?page=ctrl_login&op=list"><i id="col-ico" class="fa-solid fa-user fa-2xl"></i></a>').appendTo('.log-icon');
    }
}


//================CLICK-LOGIUT================
function click_logout() {
    $(document).on('click', '#logout', function() {
        document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        localStorage.removeItem('total_prod');
        toastr.success("Logout succesfully");
        setTimeout('logout(); ', 1000);
    });
}

//================LOG-OUT================
function logout() {
    ajaxPromise('module/login/ctrl/ctrl_login.php?op=logout', 'POST', 'JSON')
        .then(function(data) {
            localStorage.removeItem('token');
            // document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.href = "index.php?page=ctrl_home&op=list";
            window.location.reload();
        }).catch(function() {
            console.log('Something has occured');
        });
}

// Remove localstorage('page') with click in shop
function click_shop() {
    $(document).on('click', '#opc_shop', function() {
        localStorage.removeItem('page');
        localStorage.removeItem('total_prod');
    });
}

$(document).ready(function() {
    load_menu();
    click_logout();
    click_shop();
});