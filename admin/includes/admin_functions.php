<?php
add_action('admin_menu','srum_add_Admin_Menu');
function srum_add_Admin_Menu(){
    $hook_inbox=add_menu_page(
        'پیام کاربران',
        'پیام کاربران',
        'read',
        'srum_inbox',
        function(){include_once(SRUM_ADMIN_VIEW.'inbox.php');},
        SRUM_ADMIN_IMG.'email_icon.png',
        '15.69'
    );
    $hook_send=add_submenu_page(
        'srum_inbox',
        'پیام های ارسالی',
        'پیام های ارسالی',
        'read',
        'srum_sent',
        function(){include_once(SRUM_ADMIN_VIEW.'inbox.php');}
    );
    $hook_new=add_submenu_page(
        'srum_inbox',
        'ایجاد پیام جدید',
        'ایجاد پیام جدید',
        'read',
        'srum_new',
        function(){include_once(SRUM_ADMIN_VIEW.'new.php');}        
    );
    $hook_setting=add_submenu_page(
        'srum_inbox',
        'تنظیمات',
        'تنظیمات',
        'administrator',
        'srum_setting',
        function(){include_once(SRUM_ADMIN_VIEW.'setting.php');}        
    );


}