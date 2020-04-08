<?php 
/* Plugin Name:User Message PM
*Author:Saeed Rahgooy
*Plugin URI:https://webkasb.com
*Author URI:https://rahgooy.ir
*Description:This is a Plugin for Send Message form user to another User
*Version:1.0.0
*Licence:GPL V2 or Later
*/
//SRUM => Saeed Rahgooy User Message
defined('ABSPATH') || exit;
define('SRUM_DIR',plugin_dir_path(__FILE__));
define('SRUM_ADMIN_DIR',plugin_dir_path(__FILE__).'admin/');
define('SRUM_ADMIN_INC',plugin_dir_path(__FILE__).'admin/includes/');
define('SRUM_ADMIN_VIEW',plugin_dir_path(__FILE__).'admin/view/');
define('SRUM_ADMIN_CSS',plugins_url('admin/css/', __FILE__));
define('SRUM_ADMIN_JS',plugins_url('admin/js/', __FILE__));
define('SRUM_ADMIN_IMG',plugins_url('admin/images/', __FILE__));


require_once(SRUM_DIR.'base-functions.php');
register_activation_hook(__FILE__,'srum_activate_plugin');
register_deactivation_hook(__FILE__,'srum_deactivate_plugin');

if(is_admin()){
    require_once(SRUM_ADMIN_INC.'admin_functions.php');
}
//add default user for send message
add_action('srum_before_send', function(){
    echo 'مدیرسایت : admin';
});


