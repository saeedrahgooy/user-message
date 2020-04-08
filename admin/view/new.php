<div class="wrap">
    <h2>ارسال پیام جدید</h2>
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
            <input type="submit" value="ارسال پیام" id="srum_new_user_send_button" 
            name="srum_new_user_send_button" class="button-primary"/>
        </p>
    </form>
</div>