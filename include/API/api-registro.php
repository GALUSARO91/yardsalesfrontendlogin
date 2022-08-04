<?php

function plz_api_registro(){

    register_rest_route(
        "plz",
        "registro",
        [
            'methods'   => 'POST',
            'callback'  => 'plz_registro_callback'
        ]
    );

}

function plz_registro_callback($request){
    $user_exist = get_user_by('login',$request['name']);
    $email_exist = get_user_by('email',$request['email']);

    if($user_exist){
        return ['msg' => 'Ese usuario ya existe'];
    } elseif($email_exist){
        return ['msg' => 'Correo ya registrado'];
    }

    $args = [
        'user_login' => $request['name'],
        'user_email' => $request['email'],
        'user_pass'  => $request['password'],
        'role'       => 'cliente'
    ];

    $user = wp_insert_user($args);

    return array("msg" => "Usuaro Registrado correctamente");
}

add_action('rest_api_init','plz_api_registro');