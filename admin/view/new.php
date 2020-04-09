<div class="wrap">
    <h2>ارسال پیام جدید</h2>
    <?php 
        if(isset($_POST['srum_new_user_send_button'])){
            require_once(SRUM_ADMIN_INC.'functions.php');
            //get current user login to wordpress
            $srum_from_user=get_current_user_id();
            if($srum_to_user= srum_Get_User_Id($_POST['srum_new_user_address'])){
                if($srum_from_user == $srum_to_user){
                    srum_show_notice('شما نمی توانید به خودتان پیام ارسال کنید','error');
                }else{
                    $srum_message_data=array(
                        'from'=>$srum_from_user,
                        'to'=>$srum_to_user,
                        'subject'=>sanitize_text_field($_POST['srum_new_user_subject']),
                        'type'=>in_array($srum_type=absint($_POST['srum_new_user_type']),array(1,2))? $srum_type :1,
                        'message'=>esc_html($_POST['srum_new_user_message'])
                    );
                    if(srum_send_message(
                        $srum_message_data['from'],
                        $srum_message_data['to'],
                        $srum_message_data['subject'],
                        $srum_message_data['type'],
                        $srum_message_data['message']
                    )){
                        //message sent
                        srum_show_notice('پیام شما با موفقیت ارسال شد','success');
                    }else{
                        //message
                        srum_show_notice('خطا در ارسال پیام','error');
                    }
                }

            }else{
                //show user does not exist
                srum_show_notice('کاربر مورد نظر موجود نیست' , 'error');
            }

        };
    ?>
    <form method="POST" action="">
        <div class="notice notice-info">
           <p>
           برای ارسال پیام می توانید از طریق 
            <span style="color: red">شناسه کاربری</span>
            یا
            <span style="color: red">ایمیل کاربر</span>
            اقدام کنید
           </p>
        </div>
        <div>
            <?php do_action('srum_before_send');?></div>
        <p>
            <span style="color: red">*</span>
            <label for="srum_new_user_address">گیرنده :</label><br>
            <input required class="ltr" type="text" id="srum_new_user_address" name="srum_new_user_address" size="30">        
        </p>
        <p>
            <span style="color: red">*</span>
            <label for="srum_new_user_subject">موضوع : </label><br>
            <input required type="text" id="srum_new_user_subject" name="srum_new_user_subject" size="30">        
        </p>
        <p>
            <span style="color: red">*</span>
            <label for="srum_new_user_message">متن پیام : </label><br>
            <textarea required type="text" id="srum_new_user_message" name="srum_new_user_message" rows="10"></textarea>       
        </p>
        <p>
            <label for="srum_new_user_type">نوع پیام :</label><br>
            <input class="ltr" type="radio" name="srum_new_user_type" value="1" checked>معمولی<br>
            <input type="radio" name="srum_new_user_type" value="2" > فوری  
        </p>
        <p>
            <input type="submit" value="ارسال پیام" id="srum_new_user_send_button" 
            name="srum_new_user_send_button" class="button-primary"/>
        </p>
    </form>
</div>