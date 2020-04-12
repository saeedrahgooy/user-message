<?php
    require_once(SRUM_ADMIN_INC.'functions.php');
    $srum_is_inbox=$_GET['page']==='srum_inbox' ? true : false;
    $srumPageTitle=$srum_is_inbox ? 'پیام های دریافتی' : 'پیام های ارسالی';
?>
<div class="wrap">
    <h2><?php echo $srumPageTitle ;?></h2>
    <div class="srum-message-status">شما در مجموع 20 پیام  دارید که 10 عدد از آن را نخوانده اید</div>
    <table class="widefat">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>عنوان پیام</th>
            <th><?php echo $srum_is_inbox ? 'فرستنده' : 'گیرنده' ?></th>
            <th><?php  echo $srum_is_inbox ? 'تاریخ دریافت' : 'تاریخ ارسال'; ?></th>
            <th>نوع پیام</th>
            <th>وضعیت</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ردیف</th>
            <th>عنوان پیام</th>
            <th><?php echo $srum_is_inbox ? 'فرستنده' : 'گیرنده' ?></th>
            <th><?php  echo $srum_is_inbox ? 'تاریخ دریافت' : 'تاریخ ارسال'; ?></th>
            <th>نوع پیام</th>
            <th>وضعیت</th>
        </tr>
        </tfoot>
        <tbody>
        <?php if($srum_messages = srum_Get_Message($srum_is_inbox)) :?>
        <?php foreach ($srum_messages as $message): ?>
        <tr>
            <td>پیام </td>
            <td><?php echo $message->subject; ?> </td>
            <td><?php echo $srum_is_inbox ? srum_Get_User_Name($message->from_user) : srum_Get_User_Name($message->to_user); ?> </td>
            <td><?php echo srum_Convert_Date($message->send_at); ?> </td>
            <td><?php echo $message->type==1 ? 'معمولی' : 'فوری'; ?> </td>
            <td><?php echo $message->is_read ? '<span style="color:green">خوانده شده</span>' :'<span style="color:red">خوانده نشده</span>'; ?> </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
</div>