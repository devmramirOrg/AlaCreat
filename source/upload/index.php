<?php
//====
error_reporting(0);

$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if(!$ok) die("Sik :)");
//=====
$config = ['admin' => [[ADMIN]]]; //ادیت کنید
//=====
define('API_KEY',"[TOKEN]"); //توکن
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function RandomString() {
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
$randstring = null;
for ($i = 0; $i < 9; $i++) {
$randstring .= $characters[
rand(0, strlen($characters))
];
}
return $randstring;
}
function SendMessage($chat_id, $text, $parse_mode ,$message_id){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$text,
        'reply_to_message_id'=>$message_id,
        'parse_mode'=>$parse_mode
    ]);
}
function GetChat($chat_id){
    $res = bot('GetChat',[
    'chat_id'=>$chat_id
    ]);
    return $res;
    }
//====
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$forward_id = $update->message->forward_from->id;
$forward = $update->message->forward_from;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
@$list = json_decode(file_get_contents("settings/list.json"),true);
///
function anti_spam()
{
    $DB = DB();
    $update = json_decode(file_get_contents('php://input'));
    $id = $update->message->from->id ?? $update->callback_query->message->from->id;
    $t = time();
    if ($DB[$id])
    {
        if ($DB[$id]['block'] === true)
        {
            if ($DB[$id]['block_time'] == 'forever')
            {
                exit;
            }
            elseif ($DB[$id]['block_time'] - $t >= 0)
            {
                if ($DB[$id]['block_time'] - $t >=  (60 * 14))
                {
                    $DB[$id]['block_time'] = 'forever';
                    $text = "*💢دکمه صیکتیر شما برای همیشه از ربات زده شد!*\n👇\n 🖲  ‹– (Siktir Button)";
                    bot('sendMessage', ['chat_id' => $id, 'text' => $text, 'parse_mode' => 'MarkDown']);
                    DB($DB);
                    exit;
                }
                else
                {
                    if ($t - $DB[$id]['last'] < 5)
                    {
                        $DB[$id]['block_time'] += (60 * 1);
                        $DB[$id]['last'] = $t;
                        $x = $DB[$id]['block_time'] - $t;
                        $text = "*💢به دلیل اسپم دوباره قبل از پایان محرومیت ، 1 دقیقه به زمان محرومیت شما اضافه شد !*\n\nتا پایان محرومیت شما : $x ثانیه";
                        bot('sendMessage', ['chat_id' => $id, 'text' => $text, 'parse_mode' => 'MarkDown']);
                        DB($DB);
                        exit;
                    }
                    else
                    {
                        $DB[$id]['last'] = $t;
                        $x = $DB[$id]['block_time'] - $t;
                        $text = "*⚠️شما هم اکنون به دلیل اسپم از ربات محروم شده اید.\nمدت زمان باقی مانده تا پایان محرومیت شما : $x ثانیه*";
                        bot('sendMessage', ['chat_id' => $id, 'text' => $text, 'parse_mode' => 'MarkDown']);
                        DB($DB);
                        exit;
                    }
                }
            }
            else
            {
                $DB[$id]['try'] = 0;
                $DB[$id]['block'] = false;
                $DB[$id]['block_time'] = 0;
                $DB[$id]['last'] = $t;
                DB($DB);
                return;
            }
        }
        elseif ($t - $DB[$id]['last'] < 3)
        {
            $DB[$id]['try'] += 2;
            $DB[$id]['last'] = $t;
            DB($DB);
            if ($DB[$id]['try'] >= 10)
            {
                $DB[$id]['try'] = 0;
                $DB[$id]['block'] = true;
                $DB[$id]['block_time'] = $t + (60 * 5);
                $text = '*⛔️شما به مدت 5 دقیقه از ربات بلاک شده اید هرگونه تلاش برای اسپم دوباره ، 1 دقیقه به محدودیت شما اضافه خواهد کرد !*';
                bot('sendMessage', ['chat_id' => $id, 'text' => $text, 'parse_mode' => 'MarkDown']);
                DB($DB);
                exit;
            }
            return;
        }
        elseif ($DB[$id]['try'] > 0)
        {
            $DB[$id]['try'] -= 1;
            $DB[$id]['last'] = $t;
            DB($DB);
            return;
        }
        else
        {
            $DB[$id]['last'] = $t;
            DB($DB);
            return;
        }
    }
    else
    {
        $DB[$id]['try'] = 0;
        $DB[$id]['last'] = $t;
        $DB[$id]['block'] = false;
        $DB[$id]['block_time'] = 0;
        DB($DB);
        return;
    }
}
function DB($INP = null)
{
    if ($INP == null)
    {
        return json_decode(file_get_contents('Anti-Spam.json'), true) ?? [];
    }
    else
    {
        return (file_put_contents('Anti-Spam.json', json_encode($INP,  JSON_PRETTY_PRINT))) ? true : false;
    }
}
//====
$user = file_get_contents("member.txt");
//==== channel  join method =====\\
$channel1 = file_get_contents("settings/channel1.txt");
if(!file_exists('settings/channel1.txt')){
file_put_contents('settings/channel1.txt', null);
}
$channel2 = file_get_contents("settings/channel2.txt");
if(!file_exists('settings/channel2.txt')){
file_put_contents('settings/channel2.txt', null);
}
$channel3 = file_get_contents("settings/channel3.txt");
if(!file_exists('settings/channel3.txt')){
file_put_contents('settings/channel3.txt', null);
}
$channel4 = file_get_contents("settings/channel4.txt");
if(!file_exists('settings/channel4.txt')){
file_put_contents('settings/channel4.txt', null);
}
$channel5 = file_get_contents("settings/channel5.txt");
if(!file_exists('settings/channel5.txt')){
file_put_contents('settings/channel5.txt', null);
}
$tchannel1 = file_get_contents("settings/tchannel1.txt");
if(!file_exists('settings/tchannel1.txt')){
file_put_contents('settings/tchannel1.txt', null);
}
$tchannel2 = file_get_contents("settings/tchannel2.txt");
if(!file_exists('settings/tchannel2.txt')){
file_put_contents('settings/tchannel2.txt', null);
}
$tchannel3 = file_get_contents("settings/tchannel3.txt");
if(!file_exists('settings/tchannel3.txt')){
file_put_contents('settings/tchannel3.txt', null);
}
$tchannel4 = file_get_contents("settings/tchannel4.txt");
if(!file_exists('settings/tchannel4.txt')){
file_put_contents('settings/tchannel4.txt', null);
}
//====
$power = file_get_contents("settings/power.txt");
if(!file_exists('settings/power.txt')){
file_put_contents('settings/power.txt', 'on');
}
//====
$step = file_get_contents("settings/step.txt");
if(!file_exists('settings/step.txt')){
file_put_contents('settings/step.txt', 'none');
}
//
$delf = file_get_contents("settings/delf.txt");
if(!file_exists('settings/delf.txt')){
file_put_contents('settings/delf.txt', 'none');
}
//
$tabliq = file_get_contents("settings/tabliq.txt");
if(!file_exists('settings/tabliq.txt')){
file_put_contents('settings/tabliq.txt', 'none');
}
//====
$scan = file_get_contents("settings/countuploadfile.txt");
if(!file_exists('settings/countuploadfile.txt')){
file_put_contents('settings/countuploadfile.txt', '0');
}
//====
$data = file_get_contents("settings/data.txt");
if(!file_exists('settings/data.txt')){
file_put_contents('settings/data.txt', 'none');
}
//====
$roko = file_get_contents("settings/roko.txt");
if(!file_exists('settings/roko.txt')){
file_put_contents('settings/roko.txt', 'none');
}
//====
if(!is_dir("member")){
mkdir("member");
}
if(!is_dir("member/$from_id")){
mkdir("member/$from_id");
}
if(!is_dir("settings")){
mkdir("settings");
}
if(!is_dir("uploader")){
mkdir("uploader");
}
//====
$ads = '<?php echo"@AlaCode"; ?>';
file_put_contents("member/$from_id/index.php",$ads);
file_put_contents("member/index.php",$ads);
file_put_contents("settings/index.php",$ads);
file_put_contents("uploader/index.php",$ads);
//===
$join_r = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel1&user_id=$from_id"));
$join_1 = $join_r->result->status;
$join_y = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel2&user_id=$from_id"));
$join_2 = $join_y->result->status;
$join_d = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel3&user_id=$from_id"));
$join_3 = $join_d->result->status;
$join_b = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel4&user_id=$from_id"));
$join_4 = $join_b->result->status;
$usernamebot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getMe'))->result->username;
//====
$menu_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
//====
if (in_array($from_id, $config['admin']) or in_array($chat_id,$list['admin'])) {
$menu = json_encode(['keyboard'=>[
[['text' => "📊| آمــار"]],
[['text' => "📮| پـیـام هـمـگـانـی"],['text'=>"🖌| فـوروارد هـمـگـانـی"]],
[['text' => "📤| آپـلـود"],['text' => "❌| حـذف فـایـل |📥"]],
[['text' => "📨| ارسـال پـسـت بـه چـنـل |📣"]],
[['text'=>"📣| تـنـظـیـم چـنـل ارسـال پـسـت |💌"]],
       [['text' => "🔗| جـویـن اجـبـاری"]],
       [['text' => "🔺| تـنـظـیـم تـبـلـیـغــ |🔻"]],
      [['text'=>"❌| حـذف تـمـامـی جـویـن هـا |🔗"]],
      [['text'=>"🚫| حـذفــ تـمـام فـایـل ها |📥"]],
[['text' => "📛| خـامـوشــ"],['text' => "✅| روشـنــ"]],
[['text' => "👤| مـدیـر هـا"],['text' => "➕| افـزودنــ مـدیـر |👤"],['text' => "➖| حـذفــ مـدیـر |👤"]],
[['text' => "⚠️| تـنـظـیـم مـدتــ زمـانــ حـذفــ مـدیـا |🚫"]],
], 'resize_keyboard' => true
]);
$menupo = json_encode(['keyboard'=>[
[['text' => "با عکس و دکمه شیشه ای"]],
[['text' => "بدون عکس و با دکمه شیشه ای"]],
[['text' => "🔙"]],
], 'resize_keyboard' => true
]);
$admin_back = json_encode(['keyboard'=>[
[['text' => "🔙"]],
], 'resize_keyboard' => true
]);
$upload = json_encode(['keyboard'=>[
    [['text' => "video"]],
    [['text' => "picture"]],
    [['text' => "music"]],
    [['text' => "voice"]],
    [['text' => "🔙"]]
    ], 'resize_keyboard' => true
    ]);
}else{
$menu = json_encode(['keyboard'=>[
[['text' => "راهنما"]],
], 'resize_keyboard' => true
]);
}
$chmenu = json_encode(['inline_keyboard'=>[
[['text'=>"چنل اول",'url'=>"https://t.me/$channel1"],['text'=>"چنل دوم",'url'=>"https://t.me/$channel2"]],
[['text'=>"چنل سوم",'url'=>"https://t.me/$channel3"],['text'=>"چنل چهارم",'url'=>"https://t.me/$channel4"]],
], 'resize_keyboard' => true]);
anti_spam();
//====
if($power == "off" && !in_array($from_id,$config['admin'])  and !in_array($chat_id,$list['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات بنابه دلایلی 📛| خـامـوشــ میباشد لطفا صبور باشید!
",
'parse_mode'=>'html',
'reply_markup'=>$menu_remove
]);
exit();
}
//====
if(isset($message)){
$txt = file_get_contents('member.txt');
$membersid= explode("\n",$txt);
if (!in_array($from_id,$membersid)){
$file2 = fopen("member.txt", "a") or die("Unable to open file!");
fwrite($file2, "$from_id\n");
fclose($file2);
}
}
//====
if($text == "🔙"){
file_put_contents("settings/step.txt", "none");
file_put_contents("settings/data.txt", "none");
file_put_contents("settings/roko.txt", "none");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
با موفقیت برگشتی (:
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
exit;
}
//====
if($join_1 == 'left'  or $join_2 == 'left' or $join_3 == 'left' or $join_4 == 'left'){
 bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>" 
سلام خدمت شما کاربر گرامی 
جهت حمایت از ما لطفاً در کانال های زیر عضو شوید
و سپس [ /start ] را بزنید
➖〰️〰️〰️〰️〰️➖
Hello dear user
To support us, please subscribe to the following channels
And then hit [ /start ]
➖〰️〰️〰️〰️〰️➖
| @$tchannel1 | @$channel1

| @$tchannel2 | @$channel2

| @$tchannel3 | @$channel3

| @$tchannel4 | @$channel4
",
'disable_web_page_preview'=>true,
'reply_markup' => $chmenu,
]);
}else{
//====
if($text == "/start" or $text == "/START"){
if (in_array($from_id, $config['admin'])){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
خوش اومدی ادمین
➖〰️〰️〰️〰️➖
🎩 کانال های تلگرامی ما :
@$tchannel1 | @$channel1
@$tchannel2 | @$channel2
@$tchannel3 | @$channel3
@$tchannel4 | @$channel4
",'disable_web_page_preview'=>true,
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
🎩 کانال های تلگرامی ما :
@$tchannel1 | @$channel1
@$tchannel2 | @$channel2
@$tchannel3 | @$channel3
@$tchannel4 | @$channel4
",'disable_web_page_preview'=>true,
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
//====
if($text == "راهنما"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text' => "
〰️〰️➖➖➖➖〰️〰️
راهنما!:
شما برید داخل چنل ( $channel5 ) پست موردنظر را پیداکنید و دکمه دانلود کامل ان فیلم را بزنید و تمام.):
",'disable_web_page_preview'=>true
]);
}
//====
if(strpos($text, "/start _") !== false) {
mkdir("data/$from_id");
$idfile = str_replace("/start _", null, $text);
$abc = json_decode(file_get_contents("uploader/$idfile.json"));
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$tabliq",
]);
$method = $abc->file;
sleep(0); // مدت زمان ارسال متن
$filles = bot('send'.$abc->file, [
'chat_id' => $chat_id,
"$method" => $abc->file_id,
'caption' => "
😈 فیلم های بیشتر در چنل زیر : 
$channel5
",
])->result->message_id;
$messages = bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
⚠️ کاربر گرامی ویدیو بالا $delf ثانیه دیگر پاک خواهد شد آن را در پی وی خود ذخیره کنید.
",
'parse_mode' => "html",
])->result->message_id;
sleep($delf); // مدت زمان حذف متن
bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $filles,
]);
sleep(5);
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"حذف شد.",
'message_id'=>$messages,
]);
}
}
//====
if(in_array($from_id, $config['admin']) or in_array($chat_id,$list['admin'])){
//
if($text == "❌| حـذف تـمـامـی جـویـن هـا |🔗"){
unlink('settings/channel1.txt');
unlink('settings/channel2.txt');
unlink('settings/channel3.txt');
unlink('settings/channel4.txt');
unlink('settings/tchannel1.txt');
unlink('settings/tchannel2.txt');
unlink('settings/tchannel3.txt');
unlink('settings/tchannel4.txt');
bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"
تمامی جوین ها پاک شدند دوباره جوین ها را ست کنید.
",
]);
}
//
if($text == "🚫| حـذفــ تـمـام فـایـل ها |📥"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پوشه کد فایل ها با موفقیت پاک شد.✅",
]);
deleteFolder('uploader');
sleep('2');
mkdir('uploader');
}
//==
if($text == "📨| ارسـال پـسـت بـه چـنـل |📣"){
	bot('sendmessage', [
'chat_id'=>$chat_id, 
'text'=>"
یکی از گزینه ها رو جهت ارسال پست انتخاب کنید.
",
'reply_markup' => $menupo
]);
}
//
 if($text == "🔺| تـنـظـیـم تـبـلـیـغــ |🔻"){
file_put_contents("settings/step.txt","tabb");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تبلیغ قبل از 📤| آپـلـود فیلم کاربران با با متن بفرستید.
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back,
]);}
if(isset($text) and $step == "tabb"){
file_put_contents("settings/step.txt","none");
file_put_contents("settings/tabliq.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
//
 if($text == "⚠️| تـنـظـیـم مـدتــ زمـانــ حـذفــ مـدیـا |🚫"){
file_put_contents("settings/step.txt","dell");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
مدت زمان حذف مدیا را ارسال کنید.
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back,
]);}
if(isset($text) and $step == "dell"){
file_put_contents("settings/step.txt","none");
file_put_contents("settings/delf.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
//
if($text == "📣| تـنـظـیـم چـنـل ارسـال پـسـت |💌"){
file_put_contents("settings/step.txt","chpos");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
آیدی چنل خود را با @ ارسال کنید.
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back,
]);}
if(isset($text) and $step == "chpos"){
file_put_contents("settings/step.txt","none");
file_put_contents("settings/channel5.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد.",
'parse_mode'=>'html',
]);}
//====
if($text == "📤| آپـلـود"){
    bot('sendmessage', [
    'chat_id' => $chat_id,
    'text' => "نوع فایل خود راانتخاب کنید.",
    'reply_to_message_id' => $message_id,
    'parse_mode' => "html",
    'reply_markup' => $upload
    ]);
    }
//upload
if($text == "video"){
file_put_contents("settings/step.txt", 'uploadvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"لطفا فیلم را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadvideo"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->video)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$file_id = $message->video->file_id;
$code = RandomString();
bot('sendvideo', [
'chat_id' => $chat_id,
'video' => $file_id,
'caption' => "
فایل شما با موفقیت داخل دیتابیس ذخیره شده
شناسه فایل شما: $code
لینک اشتراک گذاری فایل :
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'video'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل ویدیو نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "picture"){
file_put_contents("settings/step.txt", 'uploadpicture');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"لطفا عکس را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "uploadpicture"){
file_put_contents("settings/step.txt", 'none');
if(isset($message->photo)){
$adirmon = $scan+1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
$code = RandomString();
bot('sendphoto', [
'chat_id' => $chat_id,
'photo' => $file_id,
'caption' => "
عکس شما با موفقیت داخل دیتابیس ذخیره شده
شناسه فایل شما: $code
لینک اشتراک گذاری فایل :
https://t.me/{$usernamebot}?start=_$code
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'photo'}");
$file = "uploader/$code.json";
file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این فایل عکس نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
if($text == "music"){
    file_put_contents("settings/step.txt", 'uploadmusic');
    bot('sendmessage', [
    'chat_id' =>$chat_id,
    'text' =>"لطفا فایل اهنگ را بفرستید",
    'reply_to_message_id' => $message_id,
    'parse_mode'=>'html',
    'reply_markup' => $admin_back
    ]);
    }
    elseif ($step == "uploadmusic"){
    file_put_contents("settings/step.txt", 'none');
    if(isset($message->audio)){
    $adirmon = $scan+1;
    file_put_contents('settings/countuploadfile.txt', $adirmon);
    $file_id = $message->audio->file_id;
    $code = RandomString();
    bot('sendaudio', [
    'chat_id' => $chat_id,
    'audio' => $file_id,
    'caption' => "
    اهنگ شما با موفقیت داخل دیتابیس ذخیره شده
    شناسه فایل شما: $code
    لینک اشتراک گذاری فایل :
    https://t.me/{$usernamebot}?start=_$code
    ",
    'reply_to_message_id' => $message_id,
    'parse_mode' => "html",
    'reply_markup' => $menu
    ]);
    file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'audio'}");
    $file = "uploader/$code.json";
    file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
    }else{
    bot('sendmessage', [
    'chat_id' =>$chat_id,
    'text' => "خطا این فایل اهنگ نیست!",
    'reply_to_message_id' => $message_id,
    'parse_mode'=>'html',
    'reply_markup' => $menu
    ]);
    }
}
if($text == "voice"){
    file_put_contents("settings/step.txt", 'uploadvoice');
    bot('sendmessage', [
    'chat_id' =>$chat_id,
    'text' =>"لطفا ویس را بفرستید",
    'reply_to_message_id' => $message_id,
    'parse_mode'=>'html',
    'reply_markup' => $admin_back
    ]);
    }
    elseif ($step == "uploadvoice"){
    file_put_contents("settings/step.txt", 'none');
    if(isset($message->voice)){
    $adirmon = $scan+1;
    file_put_contents('settings/countuploadfile.txt', $adirmon);
    $file_id = $message->voice->file_id;
    $code = RandomString();
    bot('sendvoice', [
    'chat_id' => $chat_id,
    'voice' => $file_id,
    'caption' => "
    ویس شما با موفقیت داخل دیتابیس ذخیره شده
    شناسه فایل شما: $code
    لینک اشتراک گذاری فایل :
    https://t.me/{$usernamebot}?start=_$code
    ",
    'reply_to_message_id' => $message_id,
    'parse_mode' => "html",
    'reply_markup' => $menu
    ]);
    file_put_contents("uploader/$code.json","{'code':'$code','file_id':'$file_id','file':'voice'}");
    $file = "uploader/$code.json";
    file_put_contents($file,str_replace("'",'"',file_get_contents($file)));
    }else{
    bot('sendmessage', [
    'chat_id' =>$chat_id,
    'text' => "خطا این فایل ویس نیست!",
    'reply_to_message_id' => $message_id,
    'parse_mode'=>'html',
    'reply_markup' => $menu
    ]);
    }
}
//====
if($text == "❌| حـذف فـایـل |📥"){
file_put_contents("settings/step.txt", 'delvideo');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا شناسه فایل را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif ($step == "delvideo"){
file_put_contents("settings/step.txt", "none");
if(file_exists("uploader/$text.json")){
unlink("uploader/$text.json");
$adirmon = $scan-1;
file_put_contents('settings/countuploadfile.txt', $adirmon);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت فایل $text حذف شد!",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا شناسه فایل معتبر نمیباشد.",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
'reply_markup' => $menu
]);
}
}
//====
if($text == "با عکس و دکمه شیشه ای"){
file_put_contents("settings/step.txt", 'sendmecode');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کپشن پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
if($step == "sendmecode"){
if(isset($message->text)){
file_put_contents("settings/step.txt", 'sendpostchannel');  
file_put_contents("settings/data.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کد پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
file_put_contents("settings/step.txt", 'none');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست!!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
elseif($step == "sendpostchannel"){
file_put_contents("settings/step.txt", 'sendpicch');
file_put_contents("settings/roko.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا عکس را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif($step == "sendpicch"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("settings/roko.txt", 'none');
file_put_contents("settings/data.txt", 'none');
if(isset($message->photo)){
$photo = $message->photo;
$file_id = $photo[count($photo)-1]->file_id;
bot('sendphoto', [
'chat_id' =>$channel5,
'photo' => $file_id,
'caption' => "
{$data}
➖〰️〰️〰️〰️➖
💢 | راهنما دریافت فیلم : با زدن روی دانلود کامل فیلم میتونید فیلم را دریافت کنید .

🆔 $channel5
🆔 @$usernamebot
",
'parse_mode' => "html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📥 دانلود کامل فیلم', 'url'=>"https://t.me/{$usernamebot}?start=_{$roko}"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت ارسال شد (:!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]); 
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این عکس نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);  
}
}
//
if($text == "بدون عکس و با دکمه شیشه ای"){
file_put_contents("settings/step.txt", 'sendmecode1');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کپشن پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
if($step == "sendmecode1"){
if(isset($message->text)){
file_put_contents("settings/step.txt", 'sendpostchannel2');  
file_put_contents("settings/data.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "لطفا کد پست را بفرستید",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
file_put_contents("settings/step.txt", 'none');
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست!!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);
}
}
elseif($step == "sendpostchannel2"){
file_put_contents("settings/step.txt", 'sendpicch2');
file_put_contents("settings/roko.txt", $text);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "تایید شد
یک عدد بفرستید.
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
elseif($step == "sendpicch2"){
file_put_contents("settings/step.txt", 'none');
file_put_contents("settings/data.txt", 'none');
if(isset($message->text)){
bot('sendmessage',[
'chat_id' =>$channel5,
'text'=>"
{$data}
➖〰️〰️〰️〰️➖
💢 | راهنما دریافت فیلم : با زدن روی دانلود کامل فیلم میتونید فیلم را دریافت کنید .

🆔 $channel5
🆔 @$usernamebot
",
'parse_mode' => "html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📥 دانلود کامل فیلم', 'url'=>"https://t.me/{$usernamebot}?start=_{$roko}"]],
],
'resize_keyboard'=>true,
])
]);
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "با موفقیت ارسال شد (:!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]); 
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' => "خطا این متن نیست!",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $menu
]);  
}
}
//====
if($text == "✅| روشـنــ"){
if($power != "on"){
file_put_contents("settings/power.txt","on");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات ✅| روشـنــ شد :(",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل ✅| روشـنــ بود!️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
if($text == "📛| خـامـوشــ"){
if($power != "off"){
file_put_contents("settings/power.txt", "off");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات 📛| خـامـوشــ شد :) ",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}else{
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ربات از قبل 📛| خـامـوشــ بود!️",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
]);
}
}
//
if($text == "🖌| فـوروارد هـمـگـانـی"){
file_put_contents("settings/step.txt","forr");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
پیام خود را به ربات فوروارد کنید
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif($step == "forr"){
file_put_contents("settings/step.txt", "none");
$all_member = file_get_contents("member.txt");
$user = explode("\n",$all_member); 
for ($i=0;$i<=count($user)-1;$i++){ 
$koja = $user["$i"];
bot('ForwardMessage',[
'chat_id'=>$koja,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id]);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا فروارد شد✅",
]);
}
//
if($text == "🔗| جـویـن اجـبـاری"){
    bot('sendmessage', [
        'chat_id' =>$chat_id,
        'text' => "راهنما تنظیم 🔗| جـویـن اجـبـاری
——————————<b>
/join اولین خط برای تنظیم جوین
چنل 1 |اگه چنل عمومیه اینجوریAlaCode  و اگه خصوصیه ایدی عددی چنل خصوصی -1006595894 .
چنل 2 |اگه چنل عمومیه اینجوریAlaCode  و اگه خصوصیه ایدی عددی چنل خصوصی -1006595894 .
چنل 3 |اگه چنل عمومیه اینجوریAlaCode  و اگه خصوصیه ایدی عددی چنل خصوصی -1006595894 .
چنل 4 |اگه چنل عمومیه اینجوریAlaCode  و اگه خصوصیه ایدی عددی چنل خصوصی -1006595894 .
لینک چنل 1 | اگه خصوصیه اینجوری (https://t.me/joinchat/PGaeggfrkNThk) و اگه عمومیه (t.me/AlaCode) .
لینک چنل 2 | اگه خصوصیه اینجوری (https://t.me/joinchat/PGaeggfrkNThk) و اگه عمومیه (t.me/AlaCode) .
لینک چنل 3 | اگه خصوصیه اینجوری (https://t.me/joinchat/PGaeggfrkNThk) و اگه عمومیه (t.me/AlaCode) .
لینک چنل 4 | اگه خصوصیه اینجوری (https://t.me/joinchat/PGaeggfrkNThk) و اگه عمومیه (t.me/AlaCode) .
</b>     
مثال:
بدون @
<code>/join
AlaCode
AlaCode
AlaCode
AlaCode
t.me/AlaCode
t.me/AlaCode
t.me/AlaCode
t.me/AlaCode
</code>  
=========
پایان راهنما
",
        'reply_to_message_id' => $message_id,
        'parse_mode'=>'html',
        'reply_markup' => $menu
        ]); 
        
}
if(strpos($text, '/join') !== false){
$explodech = explode("\n",$text);
file_put_contents('settings/channel1.txt', $explodech[1]);
file_put_contents('settings/channel2.txt', $explodech[2]);
file_put_contents('settings/channel3.txt', $explodech[3]);
file_put_contents('settings/channel4.txt', $explodech[4]);
file_put_contents('settings/tchannel1.txt', $explodech[5]);
file_put_contents('settings/tchannel2.txt', $explodech[6]);
file_put_contents('settings/tchannel3.txt', $explodech[7]);
file_put_contents('settings/tchannel4.txt', $explodech[8]);
bot('sendmessage', [
    'chat_id' =>$chat_id,
    'text' =>"ست شد!",
    'reply_to_message_id' => $message_id,
    'parse_mode'=>'html',
    ]);
}
//====
if ($text == "📊| آمــار") {
$member_id = explode("\n",$user);
$member_count = count($member_id)-1;
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
📊| آمــار ربات : $member_count
📊| آمــار فایل های اپلود شده : $scan
",
'reply_to_message_id' => $message_id,
'parse_mode' => "html",
]);
}
//====
if($text == "📮| پـیـام هـمـگـانـی"){
file_put_contents("settings/step.txt", "sendall");
bot('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"
لطفا پیام خود را ارسال کنید:
",
'reply_to_message_id' => $message_id,
'parse_mode'=>'html',
'reply_markup' => $admin_back
]);
}
elseif ($step == "sendall"){
file_put_contents("settings/step.txt", "none");
$all_member = fopen( "member.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
$id = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$user));
$user2 = $id->result->id;
if($user2 != null){
if($text != null){
bot('sendMessage', [
'chat_id' =>$user,
'text' =>$text,
'parse_mode' =>"html",
'disable_web_page_preview' =>"true"
]);
}
//
if($photo_id != null){
bot('sendphoto',[
'chat_id'=>$user,
'photo'=>$photo_id,
'caption'=>$caption
]);
}
//
}
}
}
///channel
if($text == "👤| مـدیـر هـا"){
    if(isset($list['admin'])){
    $count = count($list['admin']);
    $lastmem = null;
    foreach($list['admin'] as $key => $value){
    $lastmem .= "[$value](tg://user?id=$value)\n";
    }
    bot('sendMessage',[   
    'chat_id'=>$chat_id,    
    'text'=>"
    لیست کامل ادمین های ربات به شرح ذیل می باشد :\n$lastmem
    ",   
    'parse_mode'=>'MarkDown',
    'reply_to_message_id'=>$message_id,   
    'reply_markup' => $admin_back
    ]);
    }else{    
        bot('sendMessage',[   
            'chat_id'=>$chat_id,    
            'text'=>"لیست ادمین ها خالی می باشد!",   
            'parse_mode'=>'MarkDown',
            'reply_to_message_id'=>$message_id,   
            'reply_markup' => $admin_back
            ]);
    }
    }
//====
}
///
if(in_array($from_id, $config['admin'])){

    if($text == '➕| افـزودنــ مـدیـر |👤'){
    file_put_contents("settings/step.txt", "addadmin");
    bot('sendMessage',[   
        'chat_id'=>$chat_id,    
        'text'=>"آیدی عددی فرد را ارسال کنید یا پیامی از شخص فروارد کنید  👨🏻‍🏫",   
        'parse_mode'=>'MarkDown',
        'reply_to_message_id'=>$message_id,   
        ]);
    }
    elseif($text == '➖| حـذفــ مـدیـر |👤'){
    file_put_contents("settings/step.txt", "deladmin");
    bot('sendMessage',[   
        'chat_id'=>$chat_id,    
        'text'=>"آیدی عددی فرد را ارسال کنید یا پیامی از شخص فروارد کنید  👨🏻‍🏫",   
        'parse_mode'=>'MarkDown',
        'reply_to_message_id'=>$message_id,   
        ]);
        }
    elseif($step == "addadmin"){
    if(is_numeric($text) == true){
    $get = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$text);
    $result = json_decode($get, true);
    $ok = $result['ok'];
    if($ok == true){
    if(!in_array($text, $list['admin'])){
    if($list['admin'] == null){
    $list['admin'] = [];
    }
    array_push($list['admin'], $text);
    file_put_contents("settings/list.json",json_encode($list));
    $mention = "<a href='tg://user?id=$text'>".GetChat($text)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) در ربات ادمین شد🎯", 'Html', $message_id);
    SendMessage($text,"شما در ربات ادمین شدید و از الان مجاز در استفاده از پنل مدیریتی میباشید 🎪", 'MarkDown', null);
    }else{
    $mention = "<a href='tg://user?id=$text'>".GetChat($text)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از قبل ادمین بود 😐", 'Html', $message_id, null);
    }
    }else{
    SendMessage($chat_id,"کاربری با آیدی *".$text."* در ربات یافت نشد!", 'MarkDown', $message_id);
    }
        file_put_contents("settings/step.txt", "none");
    }
    elseif(isset($forward)){
    $get = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$forward_id);
    $result = json_decode($get, true);
    $ok = $result['ok'];
    if($ok == true){
    if(!in_array($forward_id, $list['admin'])){
    if($list['admin'] == null){
    $list['admin'] = [];
    }
    array_push($list['admin'], $forward_id);
    file_put_contents("settings/list.json",json_encode($list));
    $mention = "<a href='tg://user?id=$forward_id'>".GetChat($forward_id)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) در ربات ادمین شد🎯", 'Html', $message_id);
    SendMessage($forward_id,"شما در ربات ادمین شدید و از الان مجاز در استفاده از پنل مدیریتی میباشید 🎪", 'MarkDown', null);
    }else{
    $mention = "<a href='tg://user?id=$forward_id'>".GetChat($forward_id)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از قبل ادمین بود 😐", 'Html', $message_id);
    }
    }else{
    SendMessage($chat_id,"کاربری با آیدی *".$forward_id."* در ربات یافت نشد!", 'MarkDown', $message_id);
    }
        file_put_contents("settings/step.txt", "none");
    }
    }
    elseif($step == "deladmin"){
    if(is_numeric($text) == true){
    $get = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$text);
    $result = json_decode($get, true);
    $ok = $result['ok'];
    if($ok == true){
    if(in_array($text, $list['admin'])){
    $search = array_search($text, $list['admin']);
    unset($list['admin'][$search]);
    $list['admin'] = array_values($list['admin']);
    file_put_contents("settings/list.json",json_encode($list));
    $mention = "<a href='tg://user?id=$text'>".GetChat($text)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از ادمینی برکنار شد.", 'Html', $message_id);
    SendMessage($text,"شما از ادمین بودن در ربات برکنار شدید و دیگر مجاز به استفاده از پنل مدیریت نمیباشید.", 'MarkDown', $message_id);
    }else{
    $mention = "<a href='tg://user?id=$text'>".GetChat($text)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از قبل ادمین نبود!", 'Html', $message_id);
    }
    }else{
    SendMessage($chat_id,"کاربری با آیدی *".$text."* در ربات یافت نشد!", 'MarkDown', $message_id);
    }
        file_put_contents("settings/step.txt", "none");
    }
    elseif(isset($forward)){
    $get = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$forward_id);
    $result = json_decode($get, true);
    $ok = $result['ok'];
    if($ok == true){
    if(in_array($forward_id, $list['admin'])){
    $search = array_search($forward_id, $list['admin']);
    unset($list['admin'][$search]);
    $list['admin'] = array_values($list['admin']);
    file_put_contents("settings/list.json",json_encode($list));
    $mention = "<a href='tg://user?id=$forward_id'>".GetChat($forward_id)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از ادمینی برکنار شد.", 'Html', $message_id);
    SendMessage($forward_id,"شما از ادمین بودن در ربات برکنار شدید و دیگر مجاز به استفاده از پنل مدیریت نمیباشید.", 'MarkDown', $message_id);
    }else{
    $mention = "<a href='tg://user?id=$forward_id'>".GetChat($forward_id)->result->first_name."</a>";
    SendMessage($chat_id,"کاربر ($mention) از قبل ادمین نبود!", 'Html', $message_id);
    }
    }else{
    SendMessage($chat_id,"■ کاربری با آیدی *".$forward_id."* در ربات یافت نشد!", 'MarkDown', $message_id);
    }
        file_put_contents("settings/step.txt", "none");
    }
    }
}
if($text == "/creator"){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🤖 این ربات توسط سورس کده ساخته شده است",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "سورس کده🤖"   , 'url' => "https://t.me/Sourrce_kade" ]
        ],
        ]
        ])
        ]);
}
///
unlink('error_log');
?>