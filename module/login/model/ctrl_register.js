function register() {
    $('.header').empty();
    if (validate_register() != 0) {
        var data = $('#register__form').serialize();
       
        console.log(data);
       
        ajaxPromise('module/login/ctrl/ctrl_login.php?op=register', 'POST', 'JSON', data)
        
            .then(function(result) {
                console.log(result);
                // console.log(data);
                if (result == "error_email") {
                    document.getElementById('error_email_reg').innerHTML = "El email ya esta en uso, asegurate de no tener ya una cuenta"
                } else if (result == "error_user") {
                    document.getElementById('error_username_reg').innerHTML = "El usuario ya esta en uso, intentalo con otro"
                } else {
                    console.log("se ha registrado correctamente");
                    toastr.success("Registery succesfully");
                    setTimeout(' window.location.href = "index.php?page=ctrl_login&op=list"; ', 1000);
                }
            }).catch(function(textStatus) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus);
                }
            });
    }
}
function login() {
    // console.log('login');
    $('.header').empty();
    if (validate_login() != 0) {
        var data = $('#login__form').serialize();
        console.log(data);
        ajaxPromise('module/login/ctrl/ctrl_login.php?op=login', 'POST', 'JSON', data)
        
            .then(function(result) {
                console.log(result);
                console.log(data);
                if (result == "error_user") {
                    document.getElementById('error_username_log').innerHTML = "El usario no existe,asegurase de que lo a escrito correctamente"
                } 
                else if (result == "error_passwd") {
                    document.getElementById('error_passwd_log').innerHTML = "La contraseña es incorrecta"
                } 
                else {
                    localStorage.setItem("token", result);
                    // toastr.success("Loged succesfully");

                    if (localStorage.getItem('redirect_like')) {
                        console.log('usuario1');
                        setTimeout(' window.location.href = "index.php?page=ctrl_shop&op=list"; ', 1000);
                    } else if (localStorage.getItem('redirect_cart')){
                        console.log('cart');
                        setTimeout(' window.location.href = "index.php?page=ctrl_shop&op=list"; ', 1000);
                    }else{
                        console.log('usuario2');
                        setTimeout(' window.location.href = "index.php?page=ctrl_shop&op=list"; ', 1000);

                        // setTimeout(' window.location.href = "index.php?page=ctrl_home&op=list"; ', 1000);
                    }
                    
                }
            })
            .catch(function(textStatus) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus);
                }
            });
    }
}





function key_register() {
    $('.header').empty();
    $("#register").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            console.log("enter");
            e.preventDefault();
            register();
        }
    });
}
function key_login() {
    $('.header').empty();
    console.log('key');
    $("#login").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();
            login();
        }
    });
}

function button_register() {
    $('.header').empty();
    $('#register').on('click', function(e) {
        // parar js
        e.preventDefault();
        register();
    });
}
function button_login() {
    $('.header').empty();
    console.log('button');
    $('#login').on('click', function(e) {
        e.preventDefault();
        login();
    });
}
function validate_register() {
    $('.header').empty();
    var username_exp = /^(?=.{5,}$)(?=.*[a-zA-Z0-9]).*$/;
    var mail_exp = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var pssswd_exp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
    var error = false;

    if (document.getElementById('username_reg').value.length === 0) {
        document.getElementById('error_username_reg').innerHTML = "Tienes que escribir el usuario";
        error = true;
    } else {
        if (document.getElementById('username_reg').value.length < 5) {
            document.getElementById('error_username_reg').innerHTML = "El username tiene que tener 5 caracteres como minimo";
            error = true;
        } else {
            if (!username_exp.test(document.getElementById('username_reg').value)) {
                document.getElementById('error_username_reg').innerHTML = "No se pueden poner caracteres especiales";
                error = true;
            } else {
                document.getElementById('error_username_reg').innerHTML = "";
                // cont=cont+1;
                // console.log('cont');
            }
        }
    }

    if (document.getElementById('email_reg').value.length === 0) {
        document.getElementById('error_email_reg').innerHTML = "Tienes que escribir un correo";
        error = true;
    } else {
        if (!mail_exp.test(document.getElementById('email_reg').value)) {
            document.getElementById('error_email_reg').innerHTML = "El formato del mail es invalido";
            error = true;
        } else {
            document.getElementById('error_email_reg').innerHTML = "";
        }
    }

    if (document.getElementById('passwd1_reg').value.length === 0) {
        document.getElementById('error_passwd1_reg').innerHTML = "Tienes que escribir la contraseña";
        error = true;
    } else {
        if (document.getElementById('passwd1_reg').value.length < 8) {
            document.getElementById('error_passwd1_reg').innerHTML = "La password tiene que tener 8 caracteres como minimo";
            error = true;
        } else {
            if (!pssswd_exp.test(document.getElementById('passwd1_reg').value)) {
                document.getElementById('error_passwd1_reg').innerHTML = "Debe de contener minimo 8 caracteres, mayusculas, minusculas y simbolos especiales";
                error = true;
            } else {
                document.getElementById('error_passwd1_reg').innerHTML = "";
            }
        }
    }

    if (document.getElementById('passwd2_reg').value.length === 0) {
        document.getElementById('error_passwd2_reg').innerHTML = "Tienes que repetir la contraseña";
        error = true;
    } else {
        if (document.getElementById('passwd2_reg').value.length < 8) {
            document.getElementById('error_passwd2_reg').innerHTML = "La password tiene que tener 8 caracteres como minimo";
            error = true;
        } else {
            if (document.getElementById('passwd2_reg').value === document.getElementById('passwd1_reg').value) {
                document.getElementById('error_passwd2_reg').innerHTML = "";
            } else {
                document.getElementById('error_passwd2_reg').innerHTML = "La password's no coinciden";
                error = true;
            }


        }
    }

    // if (error == true) {
    //     return 0;
    // }
    if (error == true) {
        return 0;
    }else{
        return 1;
        
    }
 
        
 }
 function validate_login() {
    $('.header').empty();
    var error = false;
console.log('validate');
    if (document.getElementById('username_log').value.length === 0) {
        document.getElementById('error_username_log').innerHTML = "Tienes que escribir el usuario";
        error = true;
    } else {
        if (document.getElementById('username_log').value.length < 5) {
            document.getElementById('error_username_log').innerHTML = "El usuario tiene que tener 5 caracteres como minimo";
            error = true;
        } else {
            document.getElementById('error_username_log').innerHTML = "";
        }
    }

    if (document.getElementById('passwd_log').value.length === 0) {
        document.getElementById('error_passwd_log').innerHTML = "Tienes que escribir la contraseña";
        error = true;
    } else {
        document.getElementById('error_passwd_log').innerHTML = "";
    }

    // if (error == true) {
    //     return 0;
    // }

    if (error == true) {
        return 0;
    }else{
        return 1;
        
    }
}

$(document).ready(function() {
    // console.log('registro');
    key_register();
    button_register();
    key_login();
    button_login();
});