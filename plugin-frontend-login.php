<?php
/* 
    * Plugin Name: FrontEnd Login
    * Plugin URI:        https://example.com/plugins/the-basics/
    * Description:       Handle the basics with this plugin.
    * Version:           1.10.3
    * Requires at least: 5.2
    * Requires PHP:      7.2
    * Author:            John Smith
    * Author URI:        https://author.example.com/
    * License:           GPL v2 or later
    * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    * Update URI:        https://example.com/my-plugin/
*/

define("PLZ_PATH", plugin_dir_path(__FILE__));

require_once PLZ_PATH.'/public/shortcode/form-registro.php';

require_once PLZ_PATH.'/public/shortcode/form-ingreso.php';

require_once PLZ_PATH.'/include/API/api-registro.php';

require_once PLZ_PATH.'/include/API/api-acceso.php';

function plz_activate_plugin(){
    add_role('cliente','Cliente','read_post');

}

function plz_desactivar_plugin(){

    remove_role('cliente');
}

register_activation_hook(__FILE__,'plz_activate_plugin');

register_deactivation_hook(__FILE__, 'plz_desactivar_plugin');
