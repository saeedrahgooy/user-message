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
    $hook_sent=add_submenu_page(
        'srum_inbox',
        'پیام های ارسالی',
        'پیام های ارسالی',
        'read',
        'srum_sent',
        function(){include_once(SRUM_ADMIN_VIEW.'inbox.php');}
    );

    add_action( "admin_head-{$hook_inbox}", "srum_add_Styles" );
    add_action( "admin_head-{$hook_sent}", "srum_add_Styles" );
    
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
function srum_add_Styles(){
    echo <<<CSS
    <style type="text/css">
.srum-message-status{
    border-radius:3px;
    padding:10px 15px;
    margin:10px;
    border:1px solid #cac1c1;
    background-color:#e8e8e8e;
}
    </style>
CSS;
}