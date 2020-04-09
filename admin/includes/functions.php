<?php

function srum_Get_User_Id($username_or_email){
    if(is_email( $username_or_email )){
        return email_exists($username_or_email);
    }else{
        if($user=get_user_by('login',$username_or_email)){
            return $user->id;
        }
    }
    return false;
}
function srum_show_notice($message,$type){
    echo <<<NOTICE
    <div class="notice notice-{$type} is-dismissible"><p>{$message}</p></div>
    NOTICE;
}
function srum_send_message($from,$to,$subject,$type,$message){
    global $wpdb;
    $table=$wpdb->prefix.'user_message';
    return $wpdb->insert(
        $table,
        array(
            'from_user' 	=> $from,//user_id
			'to_user' 		=> $to,//user_id
			'subject'		=> $subject,
			'message'		=> $message,
			'type'			=> $type,
			'send_at'		=> current_time('mysql')
        ),
        array('%d', '%d', '%s', '%s', '%d', '%s')
    );
}