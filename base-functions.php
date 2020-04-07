<?php
function srum_activate_plugin(){
    //global $table_prefix;
    //$table=$_GLOBALS['wpdb']->prefix.'user_message';
    //create table name with prefix db
    global $wpdb;
    $table=$wpdb->prefix.'user_message';
    //create query 
    $createquery="CREATE TABLE `{$table}` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `from_user` int(11) NOT NULL,
        `to_user` int(11) NOT NULL,
        `subject` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
        `message` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
        `type` int(1) NOT NULL,
        `is_read` int(1) NOT NULL DEFAULT '0',
        `send_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        KEY `id` (`id`)
       ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        //dbdelta function includes into project
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($createquery);


}
function srum_deactivate_plugin(){
    //Do Not Work !
}