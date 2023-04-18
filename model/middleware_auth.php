<?php
// include($_SERVER['DOCUMENT_ROOT'] . "/CONCESIONARIO/model/JWT.php");
include('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\JWT.php');
// include( $_SERVER['DOCUMENT_ROOT'].'/8_MVC_CRUD2.7/model/JWT.php') ;
// include($path . "model/JWT.php");
function decode_token($token){
    $jwt = parse_ini_file('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\jwt.ini');
    // $jwt = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.7/model/jwt.ini');
    $secret = $jwt['secret'];
//    echo json_encode($jwt);
//    exit;
    // $secret = 'maytheforcebewithyou';
    $JWT = new JWT;
    $token_dec = $JWT->decode($token, $secret);
    $rt_token = json_decode($token_dec, TRUE);
    return $rt_token;
}

function create_token($username){
    $jwt = parse_ini_file('C:\xampp\htdocs\MVC_CRUD_concesionario2\8_MVC_CRUD2.7\model\jwt.ini');
    // $jwt = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/MVC_CRUD_concesionario2/8_MVC_CRUD2.7/model/jwt.ini');
    $header = $jwt['header'];
    $secret = $jwt['secret'];
    // $header = '{"typ":"JWT", "alg":"HS256"}';
    // $secret = 'maytheforcebewithyou';
    $payload = '{"iat":"' . time() . '","exp":"' . time() + (600) . '","username":"' . $username . '"}';

    $JWT = new JWT;
    $token = $JWT->encode($header, $payload, $secret);
    return $token;
}
