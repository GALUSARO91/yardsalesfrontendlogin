<?php

function plz_add_access_form_script(){
    wp_register_script('plz-acceso',plugins_url("../assets/js/acceso.js",__FILE__));
    wp_localize_script('plz-acceso','plz',[
        'rest_url' => rest_url('plz'),
        'home_url' => home_url()
    ]);
}

add_action('wp_enqueue_scripts','plz_add_access_form_script');

function plz_add_signin_form(){
    wp_enqueue_script('plz-acceso');
    $response = '<div class="signin">
    <div class="signin__container">
        <form class="signin__form" id="signin">
            <div class="signin__email name--campo">
                <label for="email">Email address</label>
                <input name="email" type="email" id="email">
            </div>
            <div class="signin__pass name--campo">
                <label for="password">Password</label>
                <input name="password" type="password" id="password">
            </div>
            <div class="signin__submit">
                <input type="submit" value="Acceder">
            </div>
            <div class="signin_create-link">
                <a href="'.esc_url( get_permalink( get_page_by_title('Sign Up'))).'">Registrarse</a>
            </div>
        </form>
        <div class="msg"></div>
    </div>
</div>';

    return $response;

}

add_shortcode('plz_ingreso','plz_add_signin_form');