<?php
defined('WP_UNINSTALL_PLUGIN') || die('Sorry You can not access Direct to this File');

//object of db
//$srdb=$GLOBALS['wpdb'];
global $wpdb;
$srum_table= $wpdb->prefix.'user_message';
$wpdb->query("DROP TABLE IF EXISTS {$srum_table}");
