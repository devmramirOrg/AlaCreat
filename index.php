<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @LintoCode
//-------------------------

// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }
error_reporting(0);
// ------- include -------
include("config.php");
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$text = $update->message->text;
$from_id = $update->message->from->id;
$first = $update->message->from->first_name;
$message_id = $update->message->message_id;
$phoneid = $update->message->contact->user_id;
}
if(isset($update->callback_query)){
$data              = $update->callback_query->data;
$callback_query_id = $update->callback_query->id;
$chat_id_inline    = $update->callback_query->message->chat->id;
}

function deleteDirectory($dir) {
    global $chat_id_inline;

system('rm -rf -- ' . escapeshellarg($dir), $retval);

if($retval == 0){
    bot('sendMessage',[
                'chat_id'=>$chat_id_inline,
                'text'=> "✅ پوشه ربات با موفقیت حذف شد",
                'parse_mode'=>"HTML",
                ]);
}}
// ------- Anti Code -------
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
    $reply = "❌ | از ارسال کد مخرب خودداری کنید";
        $url = $bot_url . "/sendMessage";
        $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
            send_reply($url, $post_params);
    exit;
    }
    if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
    $reply = "❌ | از ارسال کد مخرب خودداری کنید";
        $url = $bot_url . "/sendMessage";
        $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
            send_reply($url, $post_params);
    exit;
    }
    if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
    $reply = "❌ | از ارسال کد مخرب خودداری کنید";
        $url = $bot_url . "/sendMessage";
        $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
            send_reply($url, $post_params);
    exit;
    }
    if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
    $reply = "❌ | از ارسال کد مخرب خودداری کنید";
        $url = $bot_url . "/sendMessage";
        $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
            send_reply($url, $post_params);
    exit;
    }
    if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
    $reply = "❌ | از ارسال کد مخرب خودداری کنید";
        $url = $bot_url . "/sendMessage";
        $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
            send_reply($url, $post_params);
    exit;
    }
// ------- start -------



if(strpos($text == "/start") !== false){
    
    $sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
$result = mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($result);

    $id=str_replace("/start ","",$text);
    
    if(!$res){
        
        bot('sendMessage',[
                        'chat_id'=>$id,
                        'text'=>"🎊 یک نفر با لینک شما ربات را استارت کرد هدیه شما واریز شد",
                        'parse_mode'=>"HTML",
                        ]);
                        
        $coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`='$id' LIMIT 1"));
        $coin1 = $coin['coin'];
        
        $coin = $coin1 + $refral_coin;
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$coin' WHERE id='$id' LIMIT 1");
        $sql2    = "INSERT INTO `users` (id, step, ban, bot, warning, coin, phone) VALUES ($chat_id, 'none', 'ok', 'user', 0, 0, 1)";
        $result2 = mysqli_query($conn,$sql2);
    }
}

    if($text == "/start"){
    
        $sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
        $result = mysqli_query($conn,$sql);
        
        $res = mysqli_fetch_assoc($result);
        
        
        if(!$res){
            
            $sql2    = "INSERT INTO `users` (id, step, ban, bot, warning, coin, phone) VALUES ($chat_id, 'none', 'ok', 'user', 0, 0, 1)";
            $result2 = mysqli_query($conn,$sql2);
        }
        }
        if($text == "/start"){
            
        $sql    = "SELECT * FROM `off_on`";
        $result = mysqli_query($conn,$sql);
        
        $res = mysqli_fetch_assoc($result);
        $sql2    = "SELECT * FROM `channel`";
        $result2 = mysqli_query($conn,$sql2);
        
        $res2 = mysqli_fetch_assoc($result2);
        
        $sql3    = "SELECT * FROM `warning`";
        $result3 = mysqli_query($conn,$sql3);
        
        $res3 = mysqli_fetch_assoc($result3);
        
        $sql4    = "SELECT * FROM `warning`";
        $result4 = mysqli_query($conn,$sql4);
        
        $res4 = mysqli_fetch_assoc($result4);
        
        if(!$res or !$res2 or !$res3 or !$res4){
            if(!$res){
            $sql2    = "INSERT INTO `off_on` (bot_res, creat_res) VALUES ('on', 'on')";
            $result2 = mysqli_query($conn,$sql2);
        }
            if(!$res2){
            $sql2    = "INSERT INTO `channel` (id1, id2) VALUES ('none', 'none')";
            $result2 = mysqli_query($conn,$sql2);
            }
            if(!$res3){
            $sql2    = "INSERT INTO `warning` (warning_max, warning_resulr) VALUES (3, 'limit')";
            $result2 = mysqli_query($conn,$sql2);
            }
        }
            
        }

        $sql    = "SELECT * FROM `channel`";
        $result = mysqli_query($conn,$sql);
         
         while($row = mysqli_fetch_assoc($result)){
                
            $id1 = $row['id1'];
            $id2 = $row['id2'];
            if(isset($update->message) or isset($update->callback_query->data)){
            $joqw = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$id1&user_id=$from_id"))->result->status;
            $joqwe = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$id2&user_id=$from_id"))->result->status;
}
            if($id1 == "none" or $id2 == "none"){


            }else{

                if($joqw == 'left' or $joqwe == 'left'){
                    bot('sendMessage',[
                        'chat_id'=>$chat_id,
                        'text'=>"✅ کاربر گرامی، برای اطلاع از آخرین بروزرسانی ها، اطلاعیه ها و قوانین نیاز است در کانال رسمی اپلودر ساز به نشانی های زیر عضو شوید :",
                        'parse_mode'=>"HTML",
                        'reply_markup'=>json_encode([
                        'inline_keyboard'=>[
                        [
                            [ 'text' => "🔐 کانال اول"   , 'url' => "https://t.me/$id1" ] ,
                            [ 'text' => "🔐 کانال دوم"   , 'url' => "https://t.me/$id2" ]
                        ],
                        ]
                        ])
                        ]);
                        exit();
                        }
                    }
            }
$sql_of_on    = "SELECT * FROM `off_on`";
$result_of_on = mysqli_query($conn,$sql_of_on);
$res_of_on    = mysqli_fetch_assoc($result_of_on);

$sql_ban    = "SELECT `ban` FROM `users` WHERE `id`=$chat_id";
$result_ban = mysqli_query($conn,$sql_ban);
$res_ban    = mysqli_fetch_assoc($result_ban);

$sql_war    = "SELECT `warning` FROM `users` WHERE `id`=$chat_id";
$result_war = mysqli_query($conn,$sql_war);
$res_war    = mysqli_fetch_assoc($result_war);

$sql_max    = "SELECT `warning_max` FROM `warning`";
$result_max = mysqli_query($conn,$sql_max);
$res_max    = mysqli_fetch_assoc($result_max);

$sql_war_te    = "SELECT `warning_resulr` FROM `warning`";
$result_war_te = mysqli_query($conn,$sql_war_te);
$res_war_te    = mysqli_fetch_assoc($result_war_te);

if($res_ban['ban'] == "ban"){
    
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | حساب شما در ربات از طرف مدیریت مسدود شده است

        👈 جهت ارتباط با پشتیبانی از دکمه زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
}
if($res_war['warning'] == $res_max['warning_max']){
    
    if($res_war_te['warning_resulr'] == "ban"){
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | حساب شما در ربات از طرف مدیریت مسدود شده است

        👈 جهت ارتباط با پشتیبانی از دکمه زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
    }
}

if($res_of_on['bot_res'] == "off" and $chat_id != $admin){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | ربات خاموش است",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
}

$adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`=$from_id LIMIT 1"));

if($adminstep['step'] == "support" and $text != "🔙 | بازگشت"){

    $reply = "✅ | پیام شما به موفقیت ارسال شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
            send_reply($url, $post_params);

    $reply = "👤 | ادمین گرامی یک پیام ار کاربر $from_id برای شما ارسال شده است

    متن پیام : $text";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $admin, 'text' => $reply ];
            send_reply($url, $post_params);
            mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
}
else{
    mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
}
$sql_admin_id    = "SELECT `id` FROM `users` WHERE `bot`='admin'";
$result_admin_id = mysqli_query($conn,$sql_admin_id);
 
 while($row_admin_id = mysqli_fetch_assoc($result_admin_id)){
    $admin_id = $row_admin_id['id'];
}
if($adminstep['step'] == "forvard" and $text != "left"){

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    botabol('ForwardMessage',[
'chat_id'=>$row['id'],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
    }
 
    $reply = "✅ | پیام با موفقیت فوروارد شد";
    $url = $bot_url . "/sendMessage";
    $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
    send_reply($url, $post_params);

}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
if($adminstep['step'] == "message" and $text != "left"){

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    $reply = $text;
    $url = $bot_url . "/sendMessage";
    $post_params = [ 'chat_id' =>  $row['id'], 'text' => $reply ];
        send_reply($url, $post_params);
}


$reply2 = "✅ | پیام با موفقیت ارسال شد";
    $url2 = $bot_url . "/sendMessage";
    $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
        send_reply($url2, $post_params2);
}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
if($adminstep['step'] == 'ban' and $text != "left"){
    mysqli_query($conn,"UPDATE `users` SET `ban`='ban' WHERE id=$text LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");

       $reply = "✅ | کاربر با موفقیت بن شد";
       $url = $bot_url . "/sendMessage";
       $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
           send_reply($url, $post_params);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}

   if($adminstep['step'] == 'unban' and $text != "left"){
    mysqli_query($conn,"UPDATE `users` SET `ban`='ok' WHERE id=$text LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");

       $reply = "✅ | کاربر با موفقیت ازاد شد";
       $url = $bot_url . "/sendMessage";
       $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
           send_reply($url, $post_params);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "add_admin" and $text != "left"){

    mysqli_query($conn,"UPDATE `users` SET `bot`='admin' WHERE id=$text LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");

       $reply = "✅ | کاربر با موفقیت ادمین شد";
       $url = $bot_url . "/sendMessage";
       $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
           send_reply($url, $post_params);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "delet_admin" and $text != "left"){

    mysqli_query($conn,"UPDATE `users` SET `bot`='user' WHERE id=$text LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");

       $reply = "✅ | ادمین با موفقیت عزل شد";
       $url = $bot_url . "/sendMessage";
       $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
           send_reply($url, $post_params);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "send_to_user" and $text != "left"){
       
       mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       
       $text_admin = explode(",",$text);
       $user_id = $text_admin['0'];
       $text_admin_for_user = $text_admin['1'];
       
$reply = "👤 | یک پیام از طرف مدیریت برای شما ارسال شد

📝 | متن پیام : $text_admin_for_user";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $user_id, 'text' => $reply ];
                send_reply($url, $post_params);
                
$reply2 = "✅ | پیام شما برای کاربر ارسال شد";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "limit_user" and $text != "left"){
       
       mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       mysqli_query($conn,"UPDATE `users` SET `bot`='limit' WHERE id=$text LIMIT 1");
       
$reply = "✅ | کاربر با موفقیت محدود شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
$reply2 = "👤 | کاربر گرامی حساب شما توسط مدیریت محدود شد شما نمیتوانید ربات بسازید";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $text, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
       
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "unlimit_user" and $text != "left"){
       
       mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       mysqli_query($conn,"UPDATE `users` SET `bot`='user' WHERE id=$text LIMIT 1");
       
$reply = "✅ | کاربر با موفقیت ازاد شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
$reply2 = "✅ | حساب شما از طرف مدیریت از محدودیت در امد";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $text, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "sms_creator"){
       
       mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       mysqli_query($conn,"UPDATE `sms_creator` SET `text`='$text'");
       
$reply = "✅ | متن کریتور تغییر کرد

📝 متن فعلی : $text";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "edit_id_channel" and $text != "left"){
       
       $text_admin = explode(",",$text);
       $channel_number = $text_admin['0'];
       $channel_id = $text_admin['1'];
       
       if($channel_number == "1"){
           
           mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id=$chat_id LIMIT 1");
           mysqli_query($conn,"UPDATE `channel` SET `id1`='$channel_id'");
           $reply = "✅ ایدی چنل اول با موفقیت تغییر پیدا کرد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
           
       }
       elseif($channel_number == 2){
           
           mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
           mysqli_query($conn,"UPDATE `channel` SET id2='$channel_id'");
           $reply = "✅ ایدی چنل دوم با موفقیت تغییر پیدا کرد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
       }
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "Warning" and $text != "left"){
       
       mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       $text_admin = explode(",",$text);
       $Warning_id = $text_admin['0'];
       $Warning_reason = $text_admin['1'];
       
       $Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning` FROM `users` WHERE `id`='$Warning_id' LIMIT 1"));
       $Warning_add = $Warning['warning'];
       
       $ok = $Warning_add + 1;
       mysqli_query($conn,"UPDATE `users` SET warning=$ok WHERE `id`='$Warning_id' LIMIT 1");
       
       $reply = "✅ | برای کاربر اخطار ارسال شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
                
                $reply = "👤 | کاربر گرامی یک اخطار از طرف مدیریت برای شما ارسال شد

📝 دلیل اخطار : $Warning_reason";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $Warning_id, 'text' => $reply ];
                send_reply($url, $post_params);
       
   }
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   if($adminstep['step'] == "permiumBot" and $text != "🔙 | بازگشت"){
       
       
       mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$from_id LIMIT 1");
       
       if($res_war['warning'] == $res_max['warning_max'] and $res_war_te['warning_resulr'] == "limit"){
           
           bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | حساب شما در ربات به دلیل گرفتن اخطار زیاد محدود شده است

        👈 جهت ارتباط با پشتیبانی از دکمه زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
           
       }
       
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}

$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | توکن شما معتبر نیست",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖 در حال ساخت ربات . . .",
]);
mkdir("bot_uploders");
mkdir("bot_uploders/$from_id");
mkdir("bot_uploders/$from_id/$un");
// === code === //

$index = file_get_contents("source/permium/bot.php");
$index2 = file_get_contents("source/permium/Cron.php");
$index3 = file_get_contents("source/permium/Cron2.php");
$index4 = file_get_contents("source/permium/WpfAdm29r8JqjrnAebV.php");
$index = str_replace("[*[TOKEN]*]",$text,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
$index = str_replace("[*[userbot]*]",$un,$index);
$index2 = str_replace("[*[TOKEN]*]",$text,$index2);
$index3 = str_replace("[*[TOKEN]*]",$text,$index3);
file_put_contents("bot_uploders/$from_id/$un/bot.php",$index);
file_put_contents("bot_uploders/$from_id/$un/Cron.php",$index2);
file_put_contents("bot_uploders/$from_id/$un/Cron2.php",$index3);
file_put_contents("bot_uploders/$from_id/$un/WpfAdm29r8JqjrnAebV.php",$index4);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot_uploders/$from_id/".$un."/bot.php");
mysqli_query($conn,"INSERT INTO `bot_list` (id, token, db_name, db_user, db_pass, bot_id) VALUES ('$chat_id', '$text', 'none', 'none', 'none', '$un')");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ | ربات شما ساخته شد

🤖 : @$un",
]);

bot('sendMessage',[
        'chat_id'=>$channel_id,
        'text'=>"🤖 | یک ربات با مشخصات زیر ساخته شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🤖 | ایدی ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$un" , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "👤 | سازنده ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$from_id" , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$channel_id,
        'text'=>"🤖 | توکن ربات : $text",
        'parse_mode'=>"HTML",
        ]);
        
   }}
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
   
if($adminstep['step'] == "un_Warning" and $text != "left"){
    
    mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       $text_admin = explode(",",$text);
       $Warning_id = $text_admin['0'];
       $Warning_reason = $text_admin['1'];
       
       $Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning` FROM `users` WHERE `id`='$Warning_id' LIMIT 1"));
       $Warning_add = $Warning['warning'];
       
       $ok = $Warning_add - 1;
       mysqli_query($conn,"UPDATE `users` SET warning=$ok WHERE `id`='$Warning_id' LIMIT 1");
       
       $reply = "✅ | برای کاربر کسر اخطار ارسال شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
                
                $reply = "👤 | کاربر گرامی یک عفو از طرف مدیریت برای شما ارسال شد

📝 دلیل عفو : $Warning_reason";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $Warning_id, 'text' => $reply ];
                send_reply($url, $post_params);
    
    
}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
if($adminstep['step'] == "max_Warning" and $text != "left"){

mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
mysqli_query($conn,"UPDATE `warning` SET warning_max='$text'");

$reply = "✅ | انجام شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);

    
}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
if($adminstep['step'] == "res_Warning"){
    
mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
mysqli_query($conn,"UPDATE `warning` SET `warning_resulr`='$text'");

$reply = "✅ | انجام شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
}
if($adminstep['step'] == "serch_user"){
    
    mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$text' LIMIT 1");
    
    $sql    = "SELECT `bot` FROM `users` WHERE `id`=$text";
        $result = mysqli_query($conn,$sql);
        
        $res = implode(mysqli_fetch_assoc($result));
        
        $sq2    = "SELECT `ban` FROM `users` WHERE `id`=$text";
        $result2 = mysqli_query($conn,$sq2);
        
        $res2 = implode(mysqli_fetch_assoc($result2));
        
        $Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning` FROM `users` WHERE `id`='$text' LIMIT 1"));
       $Warning_list = $Warning['warning'];
       
       $sql_bot    = "SELECT `id` FROM `bot_list` WHERE `id`=$text";
        $result_bot = mysqli_query($conn,$sql_bot);
        
        $res_bot = implode(mysqli_fetch_assoc($result_bot));
        
        $sql_bot2    = "SELECT `bot_id` FROM `bot_list` WHERE `id`=$text";
        $result_bot2 = mysqli_query($conn,$sql_bot2);
        
        $res_bot2 = implode(mysqli_fetch_assoc($result_bot2));
        
        $coin_a = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`='$text' LIMIT 1"));
        $coin1_a = $coin_a['coin'];
        
        $number = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `phone` FROM `users` WHERE `id`='$text' LIMIT 1"));
        $numberUs = $number['phone'];
            
            if($res_bot != NULL){
$reply = "👤 | اطلاعات حساب کاربری  :
        
👈 شناسه کاربری : $text
👈 وضعیت حساب : $res2
👈 نوع حساب : $res
👈 تعدادی اخطار دریافتی : $Warning_list
👈 ربات : ساخته شده✅
👈 ایدی ربات ساخته شده : @$res_bot2
👈 موجودی : $coin1_a تومان
👈 شماره تلفن : $numberUs

🤖 | @$bot_id";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
                
        }
            else{
                
$reply = "👤 | اطلاعات حساب کاربری :
        
👈 شناسه کاربری : $chat_id
👈 وضعیت حساب : $res2
👈 نوع حساب : $res
👈 تعدادی اخطار دریافتی : $Warning_list
👈 ربات : ساخته نشده❌
👈 موجودی : $coin1_a تومان
👈 شماره تلفن : $numberUs

🤖 | @$bot_id";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $admin, 'text' => $reply ];
                send_reply($url, $post_params);
                
            }
    
}

if ($data == "Rules"){

            bot('sendMessage',[
        'chat_id'=>$chat_id_inline,
        'text'=>"🔖 | قوانین ربات

👈 ما در ربات های ساخته شده دخالتی نداریم و هر گونه کلاهبرداری از انها از طرف تیم ما پیگیری نمیشود
👈 هر کاربر فقط 1 ربات میتواند بسازد درصورت حذف ربات میتوانید مجددا اقدام به ساخت ربات کنید
👈 از سوال های بی ربط در پشتیبانی جدا خودداری کنید

🙏 امیدوارم با ربات ما بهترین کیفیت را تجربه کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🔐 کانال ما"   , 'url' => "https://t.me/$channel_bot" ]
        ],
        ]
        ])
        ]);
}
if ($data == "help"){

            bot('sendMessage',[
        'chat_id'=>$chat_id_inline,
        'text'=>"📚؛ بـراي سـاخـت ربـات اول بـایـد :

1️⃣~ ربـات BotFather را اسـتـارت کـنـیـد !

2️⃣~ دسـتـور /newbot را بـه بـات فـادر ارسـال کـنـیـد !

3️⃣~ یـک نـام بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

4️⃣~ یـک یـوزرنـیـم بـراي ربـات خـودتـان بـه بـات فـادر ارسـال کـنـیـد !

⚠️~ تـوجـه کـنـیـد کـه آخـر یـوزرنـیـم بـایـد عـبـارت « bot » وجـود داشـتـه بـاشـد !

5️⃣~ اگـر تـمـام مـراحـل را درسـت طـي کـرده بـاشـیـد ، بـات فـادر مـتـن طـولانـي اي بـه عـنـوان تـوکـن بـراي شـمـا ارسـال مـیـکـنـد !

6️⃣~ آن مـتـن طـولانـي کـه تـوکـن نـامـیـده مـیـشـود کـه بـه صـورت :
- - - - - - - - - - - - - - - - - - - - - -
1480433713:AAHKWhWSwkDqIcQGBUIyETqDqjM3Speg0UB
- - - - - - - - - - - - - - - - - - - - - -
🙏 امیدوارم با ربات ما بهترین کیفیت را تجربه کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🔐 کانال ما"   , 'url' => "https://t.me/$channel_bot" ]
        ],
        ]
        ])
        ]);
}

if($adminstep['step'] == "creat_code" and $text != "🔙 | بازگشت"){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $text_code2 = explode(",",$text);
    $code2 = $text_code2['0'];
    $coin2 = $text_code2['1'];
    
    $code_t = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `code` FROM `code_t` WHERE `code`='$code2' LIMIT 1"));
    $coin_t2 = $code_t['code'];
    
    if(!$coin_t2){
        
        $sql_code    = "INSERT INTO `code_t` (code, coin) VALUES ('$code2', '$coin2')";
        $result_code = mysqli_query($conn,$sql_code);
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ کد با موفقیت اضافه شد",
        'parse_mode'=>"HTML",
        
        ]);
    }
    else{
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ کد از قبل موجود میباشد",
        'parse_mode'=>"HTML",
        
        ]);
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($adminstep['step'] == "code_he" and $text != "🔙 | بازگشت"){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    $code_t = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `code_t` WHERE `code`='$text' LIMIT 1"));
    $code_t2 = $code_t['code'];
    $coin_t  = $code_t['coin'];
    
    if(!$code_t){
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ کد وجود ندارد",
        'parse_mode'=>"HTML",
        
        ]);
    }
    else{
        $user_coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$chat_id' LIMIT 1"));
        $user_coin_add = $user_coin['coin'];
        
        $coin_ok = $user_coin_add + $coin_t;
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$coin_ok' WHERE id='$chat_id' LIMIT 1");
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ کد درست بود و مبلغ $coin_t تومان به حساب شما واریز شد",
        'parse_mode'=>"HTML",
        
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$channel_id,
        'text'=>"🏷 کد تخفیف استفاده شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👤 استفاده کننده"   , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$chat_id"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "🏷 کد هدیه"   , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$text"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "💰 مبلغ هدیه"   , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$coin_t تومان"   , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
        mysqli_query($conn,"DELETE FROM `code_t` WHERE `code`='$text' LIMIT 1");
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "pay_dargah" and $text != "🔙 | بازگشت"){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    if(is_numeric($text)){
        
        bot('sendmessage',[       
			'chat_id'=>$chat_id,
			'text'=>"💳 درگاه پرداخت ساخته شد

✅ بعد پرداخت موجودی خودکار واریز میشود",
			'reply_to_message_id'=>$message_id,
			'reply_markup'=>json_encode([
    'inline_keyboard'=>[
	[['text'=>"💳 | پرداخت $text",'url'=>"$web/pay/index.php?amount=$text&id=$from_id"]],
              ]
              ])
	       ]);
    }
    else{
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | اطلاعات وارد شده شما اشتباه است",
        ]);
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "freeBot" and $text != "🔙 | بازگشت"){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$from_id LIMIT 1");
       
       if($res_war['warning'] == $res_max['warning_max'] and $res_war_te['warning_resulr'] == "limit"){
           
           bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | حساب شما در ربات به دلیل گرفتن اخطار زیاد محدود شده است

        👈 جهت ارتباط با پشتیبانی از دکمه زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
           
       }
       
function objectToArrays( $object ){
if( !is_object( $object ) && !is_array( $object ))
{
return $object;
}
if( is_object( $object ))
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}

$userbot = json_decode(file_get_contents("https://api.telegram.org/bot".$text."/getme"));
$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | توکن شما معتبر نیست",
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖 در حال ساخت ربات . . .",
]);
mkdir("bot_uploders");
mkdir("bot_uploders/$from_id");
mkdir("bot_uploders/$from_id/$un");
// === code === //
$index = file_get_contents("source/upload/index.php");
$index2 = file_get_contents("source/upload/jdf.php");
$index = str_replace("[TOKEN]",$text,$index);
$index = str_replace("[ADMIN]",$from_id,$index);
file_put_contents("bot_uploders/$from_id/$un/index.php",$index);
file_put_contents("bot_uploders/$from_id/$un/jdf.php",$index2);
file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=".$folder."/bot_uploders/$from_id/".$un."/index.php");
file_get_contents("$folder/bot_uploders/$from_id/".$un."/index.php");
mysqli_query($conn,"INSERT INTO `bot_list` (id, token, db_name, db_user, db_pass, bot_id) VALUES ('$chat_id', '$text', 'none', 'none', 'none', '$un')");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ | ربات شما ساخته شد

🤖 : @$un",
]);

bot('sendMessage',[
        'chat_id'=>$channel_id,
        'text'=>"🤖 | یک ربات با مشخصات زیر ساخته شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🤖 | ایدی ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$un" , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "👤 | سازنده ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$from_id" , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$channel_id,
        'text'=>"🤖 | توکن ربات : $text",
        'parse_mode'=>"HTML",
        ]);
        
   }}
   else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
// ------- KeyBord -------
$key1     = '🗄 اطلاعات حساب';
$key2     = '🛠  ساخت ربات  🤖';
$key3     = '🤖 ربات من';
$key4     = '📮 پشتیبانی';
$key27    = '📚 راهنما و قوانین';
$code_he  = '🏷 کد هدیه';
$pay      = '➕ افزایش موجودی';
$veryfied = '💎 حساب ویژه';

    $reply_keyboard = [
                        [$key2] ,
                        [$key1 , $key3] ,
                        [$key27] ,
                        [$code_he , $pay , $veryfied] ,
                        [$key4],

                      ];
 
    $reply_kb_options = [
                            'keyboard'          => $reply_keyboard ,
                            'resize_keyboard'   => true ,
                            'one_time_keyboard' => false ,
                        ];

$key5 = '📡 | ست وبهوک';
$key6 = '🧹 | پاکسازی اپدیت در انتظار';
$key7 = '♻️ | اپدیت ربات';
$key8 = '❌ | حذف ربات';
$key9 = '🗂 | دریافت اطلاعات ربات';
$back = '🔙 | بازگشت';
$key21 = '🔄 | انتقال مالکیت ربات';

     $reply_keyboard_control_bot = [
                         [$key5 , $key21] ,
                         [$key6 , $key7] ,
                         [$key8 , $key9] ,
                         [$back] ,

  ];

    $reply_kb_options_control_bot = [

                         'keyboard'          => $reply_keyboard_control_bot ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];

$reply_keyboard_sup = [
                         [$back] ,

  ];

    $reply_kb_options_sup = [

                         'keyboard'          => $reply_keyboard_sup ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];


    $key10 = '📊 | امار ربات';
    $key11 = '📝 | فوروارد همگانی';
    $key12 = '📝 | پیام همگانی';
    $key14 = '❌ | بن کاربر';
    $key15 = '✅ | ازاد کردن کاربر';
    $key18 = '👤 | افزودن ادمین';
    $key19 = '👤 | حذف ادمین';
    $key20 = '📝 | لیست ادمین';
    $key22 = '🔐 | تنظیم کانال ها';
    $key23 = '❌ | محدود کردن کاربر';
    $key24 = '✅ | باز کردن محدودیت';
    $key26 = '👤 | پیام به کاربر';
    $Warning_set = '⚠️ | تنظمیات اخطار';
    $on_bot = '🤖 | روشن کردن ربات';
    $off_bot = '🤖 | خاموزش کردن ربات';
    $creat_off = '🤖 | خاموش کردن بخش ساخت ربات';
    $creat_on = '🤖 | روشن کردن بخش ساخت ربات';
    $serch_user  = '🔍 | جستجو کاربر';
    $creat_code  = '🏷 ساخت کد هدیه';
    
         $reply_keyboard_panel = [
                             [$key10] ,
                             [$key11 , $key12] ,
                             [$key14 , $key15] ,
                             [$key18 , $key19 , $key20],
                             [$key22 , $creat_code] ,
                             [$key23 , $key24],
                             [$key26, $Warning_set],
                             [$on_bot, $off_bot],
                             [$creat_on, $creat_off],
                             [$serch_user],
                             [$back],
    
      ];
    
        $reply_kb_options_panel = [
    
                             'keyboard'          => $reply_keyboard_panel ,
                             'resize_keyboard'   => true ,
                             'one_time_keyboard' => false ,
        ];
        
$Warning     = '⚠️ | دادن اخطار';
$un_Warning  = '⚠️ | حذف اخطار';
$max_Warning = '⚠️ | حداکثر اخطار ها';
$res_Warning = '⚠️ | نتیجه رسیدن به حداکثر اخطار ها';
     
     $reply_keyboard_Warning = [
                         [$Warning , $un_Warning] ,
                         [$max_Warning] ,
                         [$res_Warning] ,
                         [$back],

  ];

    $reply_kb_options_Warning = [

                         'keyboard'          => $reply_keyboard_Warning ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];
    
$pay_dargah  = '🛒 خرید موجودی';
$refral      = '👥 دعوات دوستان';
     
     $reply_keyboard_pay = [
                         [$pay_dargah , $refral] ,
                         [$back],

  ];

    $reply_kb_options_pay = [

                         'keyboard'          => $reply_keyboard_pay ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];
    
$permium_pay  = '🛍 خرید حساب ویژه';
$help_permium = '📚 راهنما';
     
     $reply_keyboard_per = [
                         [$permium_pay , $help_permium] ,
                         [$back],

  ];

    $reply_kb_options_per = [

                         'keyboard'          => $reply_keyboard_per ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];
    
$freeBot    = '🗂 اپلودر عادی';
$permiumBot = '🗂 اپلودر ویژه';
     
     $reply_keyboard_bot = [
                         [$freeBot , $permiumBot] ,
                         [$back],

  ];

    $reply_kb_options_bot = [

                         'keyboard'          => $reply_keyboard_bot ,
                         'resize_keyboard'   => true ,
                         'one_time_keyboard' => false ,
    ];

        switch($text) {
 
            case "/start"  : show_menu();                 break;
            case $key1     : profile();                   break;
            case $key2     : creat_bot();                 break;
            case $key3     : setting();                   break;
            case $key4     : support();                   break;
            case $key5     : setwebhock_user();           break;
            case $key6     : delet_update();              break;
            case $key7     : update_bot();                break;
            case $key8     : delet_bot_user();            break;
            case $key9     : bot_info();                  break;
            case $back     : back();                      break;
            case $key27    : help();                      break;
            case $code_he  : code_he();                   break;
            case $pay      : pay();                       break;
            case $veryfied : veryfied();                  break;
            case $pay_dargah   : pay_dargah();            break;
            case $refral   : refral();                    break;
            case $permium_pay   : permium_pay();          break;
            case $help_permium   : help_permium();        break;
            case $freeBot   : freeBot();                  break;
            case $permiumBot   : permiumBot();            break;
            
        }
        $sql_admin    = "SELECT `bot` FROM `users` WHERE `id`=$chat_id";
        $result_admin = mysqli_query($conn,$sql_admin);
        
        $res_admin = mysqli_fetch_assoc($result_admin);
        if($from_id == $admin or $res_admin['bot'] == "admin"){
    
            switch($text) {
         
                case "/admin" : panel();               break;
                case $key10 : statistics();            break;
                case $key11 : forvard();               break;
                case $key12 : message();               break;
                case $key14 : user_ban();              break;
                case $key15 : unban_user();            break;
                case $key18 : add_admin();             break;
                case $key19 : delet_admin();           break;
                case $key20 : list_admin();            break;
                case $key26 : send_to_user();          break;
                case $key23 : limit_user();            break;
                case $key24 : unlimit_user();          break;
                case $key22 : edit_id_channel();       break;
                case $Warning : Warning();             break;
                case $un_Warning : un_Warning();       break;
                case $max_Warning : max_Warning();     break;
                case $res_Warning : res_Warning();     break;
                case $Warning_set : Warning_set();     break;
                case $on_bot : on_bot();               break;
                case $off_bot : off_bot();             break;
                case $creat_off : creat_off();         break;
                case $creat_on : creat_on();           break;
                case $serch_user : serch_user();       break;
                case $creat_code   : creat_code();     break;
            }
        }
        
// ------- if --------

if(isset($update->message->contact)){
    if($update->message->contact->user_id == $from_id){
        $phone =$update->message->contact->phone_number;
        if(strpos($phone,'98') === 0 || strpos($phone,'+98') === 0){
            $phone = '0'.strrev(substr(strrev($phone),0,10));
            mysqli_query($conn,"UPDATE users SET phone='$phone' WHERE id='$phoneid' LIMIT 1");
            bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ شماره تلفن شما با موفقیت ثبت و تایید شد.",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendmessage',[
'chat_id'=>$channel_id,
'text'=>"👤 ثبت نام جدید

☎️ : $phone
🆔 : $from_id",
]);
        }
        else{
            bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کشور شما مجاز نیست فقط ایران مجاز است",
]);
exit;
        }
        
    }
}

// ------- Function -------
        function show_menu(){
            global $reply_kb_options;
            global $chat_id;
            global $bot_url;
            global $botname;
            global $bot_id;
            global $channel_bot;
            
            $json_kb = json_encode($reply_kb_options);
$reply = "🤖 | سلام کاربر گرامی به ربات $botname خوش امدید

لطفا برای استفاده از ربات با دکمه های زیر کار کنید 👇";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
        }

        function profile(){
    
            global $reply_kb_options;
            global $chat_id;
            global $bot_url;
            global $bot_id;
            global $conn;
            
        $sql    = "SELECT `bot` FROM `users` WHERE `id`=$chat_id";
        $result = mysqli_query($conn,$sql);
        
        $res = implode(mysqli_fetch_assoc($result));
        
        $sq2    = "SELECT `ban` FROM `users` WHERE `id`=$chat_id";
        $result2 = mysqli_query($conn,$sq2);
        
        $res2 = implode(mysqli_fetch_assoc($result2));
        
        $Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning` FROM `users` WHERE `id`='$chat_id' LIMIT 1"));
       $Warning_list = $Warning['warning'];
       
       $sql_bot    = "SELECT `id` FROM `bot_list` WHERE `id`=$chat_id";
        $result_bot = mysqli_query($conn,$sql_bot);
        
        $res_bot = implode(mysqli_fetch_assoc($result_bot));
        
        $coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`='$chat_id' LIMIT 1"));
        $coin1 = $coin['coin'];
        
        $sqNu    = "SELECT `phone` FROM `users` WHERE `id`=$chat_id";
        $resultNu = mysqli_query($conn,$sqNu);
        
        $resNu = implode(mysqli_fetch_assoc($resultNu));
            
            if($res_bot != NULL){
            $json_kb = json_encode($reply_kb_options);
bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"👤 اطلاعات حساب شما :",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    [ 'text' => "👤 شناسه کاربری" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$chat_id" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "💰 موجودی" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$coin1 تومان" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "🖥 وضعیت حساب" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$res2" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "☎️ شماره تلفن" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$resNu" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "👨‍💻 نوع حساب" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$res" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "⚠️ اخطار ها" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$Warning_list" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "🤖 ربات ساخته شده" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "✅" , 'callback_data' => "Devmramir" ]
                ],
                ]
                ])
                ]);
                
        }
            else{
                
bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"👤 اطلاعات حساب شما :",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    [ 'text' => "👤 شناسه کاربری" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$chat_id" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "💰 موجودی" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$coin1 تومان" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "🖥 وضعیت حساب" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$res2" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "☎️ شماره تلفن" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$resNu" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "👨‍💻 نوع حساب" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$res" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "⚠️ اخطار ها" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "$Warning_list" , 'callback_data' => "Devmramir" ]
                ],
                [
                    [ 'text' => "🤖 ربات ساخته شده" , 'callback_data' => "Devmramir"] ,
                    [ 'text' => "❌" , 'callback_data' => "Devmramir" ]
                ],
                ]
                ])
                ]);
                
            }
        }
        
        function help(){
            
            
            global $chat_id;
            
            
            bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"👈 لطفا بخش مورد نظر خود را انتخاب کنید",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    [ 'text' => "📚 راهنما" , 'callback_data' => "help" ] ,
                    [ 'text' => "🔖 قوانین" , 'callback_data' => "Rules" ]
                ],
                ]
                ])
                ]);
        }
         function creat_bot(){

          global $chat_id;
          global $reply_kb_options_bot;
          
          
                bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"👈 لطفا بخش مورد نظر خود را انتخاب کنید",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options_bot),
                ]); 
             
         }
         function setting(){

            global $reply_kb_options;
            global $chat_id;
            global $from_id;
            global $bot_url;
            global $reply_kb_options_control_bot;
            global $bot_id;
            global $conn;

$sql_user    = "SELECT `id` FROM `bot_list` WHERE `id`='$chat_id'";
$result_user = mysqli_query($conn,$sql_user);
$res_user    = mysqli_fetch_assoc($result_user);
            
            if($res_user['id'] != NULL){
            
$sql    = "SELECT * FROM `bot_list` WHERE `id`='$chat_id'";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);
$admin  = $chat_id;
$bot    = $res['bot_id'];
$token  = $res['token'];

$json_kb = json_encode($reply_kb_options_control_bot);
$reply = "به بخش تنظمیات ربات خود خوش امدید 🤖

👤 مالک ربات : $admin
👈 ایدی ربات : @$bot
👈 توکن ربات : $token

🤖 | @$bot_id";
$url = $bot_url . "/sendMessage";
$post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
send_reply($url, $post_params);    
mysqli_query($conn,"UPDATE `users` SET `step`='setting' WHERE id=$chat_id LIMIT 1");
            }
            else {
                
$json_kb = json_encode($reply_kb_options);
$reply = "❌ | شما رباتی در رباتساز ما نساخته اید";
$url = $bot_url . "/sendMessage";
$post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
send_reply($url, $post_params); 
            }
         }
         function support(){

            global $reply_kb_options_sup;
            global $chat_id;
            global $bot_url;
            global $conn;
            
mysqli_query($conn,"UPDATE `users` SET `step`='support' WHERE id=$chat_id LIMIT 1");
            $json_kb = json_encode($reply_kb_options_sup);
$reply = "✅ بسیار خب ، پیام خود را ارسال کنید";
$url = $bot_url . "/sendMessage";
$post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
send_reply($url, $post_params);
         }
         function setwebhock_user(){

            global $reply_kb_options_control_bot;
            global $chat_id;
            global $bot_url;

            $json_kb = json_encode($reply_kb_options_control_bot);
            $reply = "🛠 | در دست ساخت";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
         }
         function delet_update(){

            global $reply_kb_options_control_bot;
            global $chat_id;
            global $bot_url;
            global $conn;
            global $adminstep;

if($adminstep['step'] == "setting"){
$sql    = "SELECT * FROM `bot_list` WHERE `id`='$chat_id'";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);
$bot    = $res['bot_id'];
$token  = $res['token'];

            $z1 = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getwebhookinfo"),true);
            $url = $z1['result']['url'];
        
            $z2 = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=$url&drop_pending_updates=true"),true);
            mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
                
            $reply = "✅ | انجام شد";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
            
        
         }}
         function update_bot(){

            global $reply_kb_options_control_bot;
            global $chat_id;
            global $bot_url;

            $json_kb = json_encode($reply_kb_options_control_bot);
            $reply = "🛠 | در دست ساخت";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
         }
         function delet_bot_user(){

            global $reply_kb_options;
            global $chat_id;
            global $conn;
            
$sql_user    = "SELECT `id` FROM `bot_list` WHERE `id`='$chat_id'";
$result_user = mysqli_query($conn,$sql_user);
$res_user    = mysqli_fetch_assoc($result_user);

if($res_user['id'] != NULL){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"⚠️ اخطار

این کار کل دیتابیس و فایل رباتتون رو پاک خواهد کرد و دیگر قابل بازیابی نیست اگه مایل به حذف بودید روی دکمه شیشه ای حذف ربات کلیک کنید 👇️",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "❌ حذف ربات"   , 'callback_data' => "deletBot" ]
        ],
        ]
        ])
        ]);
}

            
         }
         function bot_info(){

            global $reply_kb_options_control_bot;
            global $chat_id;
            global $bot_url;
            global $conn;
            global $bot_id;
            global $adminstep;
            
            if($adminstep['step'] == "setting"){
                
$sql    = "SELECT * FROM `bot_list` WHERE `id`='$chat_id'";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);
$admin  = $chat_id;
$bot    = $res['bot_id'];
$token  = $res['token'];
$db_n   = $res['db_name'];
$db_u   = $res['db_user'];
$db_p   = $res['db_pass'];

$serverName2 = "localhost"; // ادیت نشود
$db_name2    = "$db_n"; // نام دیتابیس
$db_user2    = "$db_u"; // یوزر دیتابیس
$db_pass2    = "$db_p"; // پسورد دیتابیس

$conn2 = mysqli_connect($serverName2, $db_user2, $db_pass2, $db_name2);

$sql2    = "SELECT * FROM `user`";
$result2 = mysqli_query($conn2,$sql2);
$res2    = mysqli_num_rows($result2);

            
$reply = "🗂 اطلاعات ربات شما : 

👤 مالک ربات : $admin
🤖 ایدی ربات : @$bot
🏷 توکن : $token
📊 تعداد اپدیت در انتظار : $res2

🤖 | @$bot_id";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
                
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
            
         }}
         function panel(){

            global $reply_kb_options_panel;
            global $chat_id;
            global $bot_url;
            
            $json_kb = json_encode($reply_kb_options_panel);
            $reply = "👤 | سلام ادمین به پشتیبانی خوش امدید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
         }
         function statistics(){

    
    global $chat_id;
    global $bot_url;
    global $conn;
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);

$sql_bot    = "SELECT * FROM `bot_list`";
$result_bot = mysqli_query($conn,$sql_bot);
$res_bot    = mysqli_num_rows($result_bot);

$sql2    = "SELECT * FROM `off_on`";
$result2 = mysqli_query($conn,$sql2);
$res2    = mysqli_fetch_assoc($result2);
$on = $res2['bot_res'];
$creat = $res2['creat_res'];

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📊 | امار ربات شما",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "📊 | امار کاربران" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$res" , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "📊 | امار ربات ها" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$res_bot" , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "🤖 | وضعیت ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$on" , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "🤖 | وضعیت ساخت ربات" , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$creat" , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
    
         }
         function forvard(){

            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
$sql    = "SELECT `id` FROM `users` WHERE `bot`='admin'";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
    $admin_id = $row['id'];
}

                mysqli_query($conn,"UPDATE `users` SET `step`='forvard' WHERE id=$chat_id LIMIT 1");
                
            $reply = "📝 | پیام خود را فوروارد کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);

            
         }
         function message(){

            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
    
                mysqli_query($conn,"UPDATE `users` SET `step`='message' WHERE id=$chat_id LIMIT 1");
                
            
            $reply = "📝 | پیام خود را برای همگانی ارسال کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
         }
         function user_ban(){
        
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
        
            
            mysqli_query($conn,"UPDATE `users` SET step='ban' WHERE id='$chat_id' LIMIT 1");
    
    $json_kb = json_encode($reply_kb_options_panel);
    $reply = "📝 | ایدی عددی کاربری که میخاید از ربات بن کنید را ارسال کنید";
    $url = $bot_url . "/sendMessage";
    $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
    send_reply($url, $post_params);
         
        }
        function unban_user(){

            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
        
            
            mysqli_query($conn,"UPDATE `users` SET step='unban' WHERE id='$chat_id' LIMIT 1");
    
    $json_kb = json_encode($reply_kb_options_panel);
    $reply = "📝 | ایدی عددی کاربری که میخاید از ربات ازاد کنید را ارسال کنید";
    $url = $bot_url . "/sendMessage";
    $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
    send_reply($url, $post_params);
         
        }
        function add_admin(){

            
            global $chat_id;
            global $bot_url;
            global $admin;
            global $conn;

            
                mysqli_query($conn,"UPDATE `users` SET step='add_admin' WHERE id='$chat_id' LIMIT 1");

            $json_kb = json_encode($reply_kb_options_panel);
            $reply = "👤 | ایدی عددی کسی که میخاید ادمین کنید را ارسال کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
            
        }
        function delet_admin(){

            
            global $chat_id;
            global $bot_url;
            global $admin;

            
                mysqli_query($conn,"UPDATE `users` SET step='delet_admin' WHERE id='$chat_id' LIMIT 1");

            
            $reply = "👤 | ایدی عددی ادمینی که میخواهید حذف کنید را ارسال کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
            
        }
        function list_admin(){

            
            global $chat_id;
            global $bot_url;
            global $admin;
            global $conn;

            

$sql    = "SELECT `id` FROM `users` WHERE `bot`='admin'";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
    $admin_id = $row['id'];
    
    $reply = "👤 لیست ادمین های شما

👤 : $admin_id";
    $url = $bot_url . "/sendMessage";
    $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
        send_reply($url, $post_params);
}


            
        }
        function back(){
            
            global $reply_kb_options;
            global $chat_id;
            global $bot_url;
            
            $json_kb = json_encode($reply_kb_options);
            $reply = "به منوی قبل برگشتیم 🔙";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply , 'reply_markup' => $json_kb ];
                send_reply($url, $post_params);
        }
        
        function send_to_user(){
            
            global $reply_kb_options;
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            
            
            mysqli_query($conn,"UPDATE `users` SET step='send_to_user' WHERE id='$chat_id' LIMIT 1");
            
            
            $reply = "📝 | ایدی عددی و پیام خود را به شکل زیر بنویسید
👉 111,text";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);

        }
        function limit_user(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            mysqli_query($conn,"UPDATE `users` SET step='limit_user' WHERE id='$chat_id' LIMIT 1");
            
            
            $reply = "👤 | ایدی عددی شخصی که میخاید محدود کنید را ارسال کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
        }
        function unlimit_user(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            mysqli_query($conn,"UPDATE `users` SET step='unlimit_user' WHERE id='$chat_id' LIMIT 1");
            
            
            $reply = "👤 | ایدی عددی کسی که میخاید از محدودیت در بیارید را ارسال کنید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
        
        }
        function edit_id_channel(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            
                
            mysqli_query($conn,"UPDATE `users` SET `step`='edit_id_channel' WHERE id=$chat_id LIMIT 1");
            
            $reply = "👈 جهت عوض کردن ایدی کانال اول یا دوم پیام را به صورت زیر بفرستید

📝 1,channel

در صورت انصراف left را بفرستید 🔐";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
            }
            
            function Warning_set(){
                
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            global $reply_kb_options_Warning;
            
            
            $max_Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning_max` FROM `warning`"));
            $res_Warning = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `warning_resulr` FROM `warning`"));
            $max = $max_Warning['warning_max'];
            $res = $res_Warning['warning_resulr'];
            
            bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"📊 | امار سیستم اخطار",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                                   [
                                [ 'text' => "⚠️ | میزبان حداکثر اخطار الان" , 'callback_data' => "aaasss" ] ,
                                [ 'text' => "$max" , 'callback_data' => "aaasss" ] ,
                                   ] ,
                                   
                                   [
                                [ 'text' => "⚠️ | واکنش" , 'callback_data' => "aaasss" ] ,
                                [ 'text' => "$res" , 'callback_data' => "aaasss" ] ,
                                   ] ,
                                   ]
                ])
                ]);
            $reply = "از کیبرد زیر برای تعویض استفاده کنید 👇";
            $json_kb = json_encode($reply_kb_options_Warning);
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply, 'reply_markup' => $json_kb];
                send_reply($url, $post_params);
            }
        
        function Warning(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
mysqli_query($conn,"UPDATE `users` SET step='Warning' WHERE id='$chat_id' LIMIT 1");
$reply = "👤 | ایدی عددی و دلیل اخطار را وارد کنید

📝 | نوع نوشتن : 222,فحش";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
            
        }
        function un_Warning(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
mysqli_query($conn,"UPDATE `users` SET step='un_Warning' WHERE id='$chat_id' LIMIT 1");
$reply = "👤 | ایدی عددی و دلیل بخشید را وارد کنید

📝 | نوع نوشتن : 222,مغذزت خواهی";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
        }
        function max_Warning(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
mysqli_query($conn,"UPDATE `users` SET step='max_Warning' WHERE id='$chat_id' LIMIT 1");
$reply = "👈 تعداد جدید خود را برای حداکثر اخطار وارد کنید";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
        
        }
        function res_Warning(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
mysqli_query($conn,"UPDATE `users` SET step='res_Warning' WHERE id='$chat_id' LIMIT 1");
$reply = "👈 نوع واکنش به حداکثر اخطار گرفتن یک کاربر را بنویسید

⚠️ | از 2 نوع ( limit ) یا ( ban ) استفاده کنید";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
        
        }
        function on_bot(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            
                
$sql    = "SELECT `bot_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['bot_res'] == "on"){
    $reply = "👈 ربات از قبل انلاین بوده است";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `bot_res`='on'");
    $reply = "✅ ربات با موفقیت روشن شد";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
            
            
        }
        
        function off_bot(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            
$sql    = "SELECT `bot_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['bot_res'] == "off"){
    $reply = "👈 ربات از قبل خاموش بوده است";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `bot_res`='off'");
    
    $reply = "✅ ربات با موفقیت خاموش شد";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
            
            
        }
        function creat_on(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
                
$sql    = "SELECT `creat_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['creat_res'] == "on"){
    $reply = "👈 بخش ساخت از قبل روشن بوده";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `creat_res`='on'");
    $reply = "✅ ساخت ربات با موفقیت روشن شد";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
            
        }
        
        function creat_off(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
           
$sql    = "SELECT `creat_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['creat_res'] == "off"){
    $reply = "👈 بخش ساخت از قبل خاموش بود";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `creat_res`='off'");
    $reply = "✅ ساخت ربات با موفقیت خاموش شد";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
    
}
            
        }
      
        function serch_user(){
            
            global $chat_id;
            global $bot_url;
            global $conn;
            global $admin;
            
            mysqli_query($conn,"UPDATE `users` SET step='serch_user' WHERE id='$chat_id' LIMIT 1");
            
                
            $reply = "👤 | ایدی عددی کاربر رو برای جستجو ارسال کنید";
            
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply];
                send_reply($url, $post_params);
            
        }
        
        function code_he(){
            
            global $chat_id;
            global $conn;
            global $reply_kb_options_sup;
            
            mysqli_query($conn,"UPDATE `users` SET step='code_he' WHERE id='$chat_id' LIMIT 1");
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 کد هدیه خود را وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_sup),
        ]);
        }
        
        function pay(){
            
            global $chat_id;
            global $reply_kb_options_pay;
            
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"یک بخش را جهت افزایش موجودی انتخاب کنید 👇",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_pay),
        ]);
        
        }
        
        function veryfied(){
            
            global $chat_id;
            global $reply_kb_options_per;
            
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"انتخاب کنید 👇",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_per),
        ]);
        }
        
        function pay_dargah(){
            
            global $chat_id;
            global $conn;
            global $reply_kb_options_sup;
            
          $sqlnumber    = "SELECT phone FROM users WHERE id=$chat_id";
$resultnumber = mysqli_query($conn,$sqlnumber);

$resnumber = mysqli_fetch_assoc($resultnumber);
    if($resnumber['phone'] == 1){
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📱 لطفا شماره موبایل خود را تایید نمایید.

👈جهت جلوگیری از خرید با کارت های دزدی نیاز است شماره خود را تایید نمائید و سپس اقدام به خرید کنید.

✔️شماره شما نزد ما محفوظ است و هیچ شخصی به آن دسترسی نخواهد داشت.
",
'reply_markup' => json_encode([ 
'resize_keyboard'=>true, 
'keyboard' => [ 
[['text'=>"⏳تایید شماره⏳",'request_contact'=>true]],
], 
]) 
]);
exit;
    }

            else{
            mysqli_query($conn,"UPDATE `users` SET step='pay_dargah' WHERE id='$chat_id' LIMIT 1");
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"💳 مبلغی که میخواهید شارژ کنید را به تومان وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_sup),
        ]);
            }
            
        }
        
        function refral(){
            
            global $chat_id;
            global $bot_id;
            global $refral_coin;
            
            bot('sendPhoto',[
        'chat_id'=>$chat_id,
        'caption'=>"🔻آپلودر ساز میدونی چیه؟🔻
👻 رباتی که میتونی تو یک دقیقه باهاش، ربات رایگان خودت رو بسازی 😍

🤖 با امکانات فوق العاده
🚀 سرعت بسیار بالا
😶 فیلتر شدن دیگه تمومه!😉
 
👇🏻 همین الان وارد این ربات فوق العاده شو
https://t.me/$bot_id?start=$chat_id",
'photo' => new CURLFILE(realpath("bet.png")),
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👆🏻 بنر بالا حاوی لینک دعوت شما به ربات است
 
🎁 با دعوت دوستان به ربات با لینک اختصاصی خود میتوانید به ازای هر نفر مقدار  $refral_coin تومان دریافت کنید
☑️ پس با زیرمجموعه گیری به راحتی میتوانید موجودی حساب خود را رایگان! افزایش دهید

❗️ توجه کنید که زیر مجموعه های شما برای دریافت موجودی رایگان حتما باید در کانال ما عضو شوند",
        'parse_mode'=>"HTML",
        ]);
        }
        
        function permium_pay(){
            
            global $chat_id;
            global $reply_kb_options_per;
            global $conn;
            global $per;;
            
        $coin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `coin` FROM `users` WHERE `id`='$chat_id' LIMIT 1"));
        $coin1 = $coin['coin'];
        
        $bot = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `bot` FROM `users` WHERE `id`='$chat_id' LIMIT 1"));
        $bot1 = $bot['bot'];
        
        if($coin1 < $per){    
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ موجودی شما برای حساب پریمیوم کافی نمیباشد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_per),
        ]);
        exit;
        }
        if($bot1 == "premium"){
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🔐 حساب شما از قبل پریمیوم هست",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_per),
        ]);
        exit;
        }
        else{
            
            $res = $coin1 - $per;
            mysqli_query($conn,"UPDATE `users` SET bot='premium' WHERE id='$chat_id' LIMIT 1");
            mysqli_query($conn,"UPDATE `users` SET coin='$res' WHERE id='$chat_id' LIMIT 1");
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"[🎊] حساب شما با موفقیت پریمیوم شد

✅ امکان ساخت ربات ویژه ازاد شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_per),
        ]);
        }
            
        }
        
        function help_permium(){
            
            global $chat_id;
            global $per;
            
            bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"📚 توضیحات حساب ویژه

شما با خرید این حساب ویژه میتوانید ربات اپلودر ویژه ام را بسازید که هیچ تبلیغاتی ندارد و کیفیت و امکانات بیشتری از ربات عادی دارد 🔐

قیمت حساب ویژه 👇",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                                   [
                                [ 'text' => "🛍 قیمت حساب ویژه" , 'callback_data' => "aaasss" ] ,
                                [ 'text' => "$per تومان" , 'callback_data' => "aaasss" ] ,
                                   ] ,
                                   ]
                ])
                ]);
        }
        
        function creat_code(){
            
            global $chat_id;
            global $conn;
            global $reply_kb_options_sup;
            
            mysqli_query($conn,"UPDATE `users` SET `step`='creat_code' WHERE `id`='$chat_id'");
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | کد هدیه و موجودی برای کد هدیه خود را ارسال کنید 
👉 code,1000",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_sup),
        ]);
        }

function freeBot(){
    
            global $chat_id;
            global $bot_url;
            global $conn;
            global $from_id;
            global $text;
            global $support;
            
$sql    = "SELECT `creat_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

$sql_bot    = "SELECT `id` FROM `bot_list` WHERE `id`=$chat_id";
$result_bot = mysqli_query($conn,$sql_bot);
        
$res_bot = implode(mysqli_fetch_assoc($result_bot));
            
            if($res['creat_res'] == "off"){
           bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | این بخش توسط مدیریت خاموش میباشد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
           
       } 
            $adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `bot` FROM `users` WHERE `id`=$from_id LIMIT 1"));
            if($adminstep['bot'] == "limit"){

            
$reply = "❌ | حساب شما محدود است و شما نمیتوانید ربات بسازید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
         }
         if($res_bot != NULL){
             $reply2 = "❌ | شما حداکثر یک ربات رو ساخته اید و دیگه اجازه ساخت ربات ندارید";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
                
             
         }
             else{
                 mysqli_query($conn,"UPDATE `users` SET `step`='freeBot' WHERE id=$from_id LIMIT 1");
$reply2 = "✅ برای ساخت ربات آپلودر ؛ توکن ربات خود را از ( @BotFather ) ارسال کنید   ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا به پشتبانی مراجعه کنید";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
                 
             }
}
function permiumBot(){
    
    global $chat_id;
            global $bot_url;
            global $conn;
            global $from_id;
            global $text;
            global $support;
            
$sql    = "SELECT `creat_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

$sql_bot    = "SELECT `id` FROM `bot_list` WHERE `id`=$chat_id";
$result_bot = mysqli_query($conn,$sql_bot);
        
$res_bot = implode(mysqli_fetch_assoc($result_bot));
            
            if($res['creat_res'] == "off"){
           bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | این بخش توسط مدیریت خاموش میباشد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
           
       } 
            $adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `bot` FROM `users` WHERE `id`=$from_id LIMIT 1"));
            if($adminstep['bot'] == "limit"){

            
$reply = "❌ | حساب شما محدود است و شما نمیتوانید ربات بسازید";
            $url = $bot_url . "/sendMessage";
            $post_params = [ 'chat_id' =>  $chat_id, 'text' => $reply ];
                send_reply($url, $post_params);
                exit();
         }
         if($res_bot != NULL){
             $reply2 = "❌ | شما حداکثر یک ربات رو ساخته اید و دیگه اجازه ساخت ربات ندارید";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
                exit();
                
             
         }
         if($adminstep['bot'] != "premium"){
             
             bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"حساب شما ویژه نیست لطفا اول اقدام به ویژه کردن حساب خود کنید ❤️",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
             
         }
             else{
                 mysqli_query($conn,"UPDATE `users` SET `step`='permiumBot' WHERE id=$from_id LIMIT 1");
$reply2 = "✅ برای ساخت ربات آپلودر ؛ توکن ربات خود را از ( @BotFather ) ارسال کنید   ✅ اگر مشکلی در توکن دارید به بخش راهنما در منوی اصلی یا به پشتبانی مراجعه کنید";
            $url2 = $bot_url . "/sendMessage";
            $post_params2 = [ 'chat_id' =>  $chat_id, 'text' => $reply2 ];
                send_reply($url2, $post_params2);
                 
             }
}

if($data == "deletBot"){
    
    $bots = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `bot_list` WHERE `id`='$chat_id_inline' LIMIT 1"));
    $id_creator = $bots['id'];
    $bots_creator = $bots['bot_id'];
    
    if($id_creator != NULL){
        
        $path = "bot_uploders/$id_creator/$bots_creator";
        
        mysqli_query($conn,"DELETE FROM `bot_list` WHERE `id`='$chat_id_inline' LIMIT 1");
        
        bot('sendMessage',[
                'chat_id'=>$chat_id_inline,
                'text'=>"ربات با موفقیت حذف شد به منو اصلی برگشتید ✅",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options),
                ]);
                
                deleteDirectory($path);
                
    }
}
?>