<?php
function plz_api_acceso(){

register_rest_route(
    "plz",
    "acceso",
    [
        'methods'   => 'POST',
        'callback'  => 'plz_acceso_callback'
    ]
);

}

function plz_acceso_callback($request){
    $cred= [
        "user_login"    => $request['email'],
        "user_password" => $request['password'],
        "remember"      => true

    ];
   $user = wp_signon($cred);
   return $user->get_error_message();
}

add_action('rest_api_init','plz_api_acceso');