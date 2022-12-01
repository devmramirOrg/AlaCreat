<?php
//===[امنیت دامنه]===//
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0/20
['lower' => '91.108.4.0','upper' => '91.108.7.255'],// literally 91.108.4.0/22
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
define('XMSDN','[*[TOKEN]*]'); // توکن
$AbQ = "[*[ADMIN]*]"; // ایدی عددی ادمین
$usernames = "[*[userbot]*]"; // یوزرنیم ربات بدون @
include("WpfAdm29r8JqjrnAebV.php");
//===[فانکشن های لازم]===//
function Tel($method,$Bot=[]){
$url = "https://api.telegram.org/bot".XMSDN."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$Bot);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function Rands(){
$numerics = 'qwertyuioplmknjbhgvcfdxzsa1234t567890';
$container = $numerics;
$key = '';
for($i = 0;$i < 15;$i++){
$_rand = rand(0,strlen($container)-1);
$key .= substr($container, $_rand, 1);
}
return $key;
}
//===[متغیر های لازم]===//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$MessNew = $message->text;
$tc = $message->chat->type;
$message_id = $message->message_id;
$fromiid = $message->from->id;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $fromiid ?? $chatid;
$name = $message->from->first_name;
$username = $message->from->username;
$token = XMSDN;
$Bot1 = json_decode(file_get_contents("PaefkSedV/$chatid/$chatid.json"),true);
$AbQs = file_get_contents("Amir.Admin");
$AbQs = explode(",",$AbQs);
if(!file_exists("Amir.Admin")){file_put_contents("Amir.Admin","$AbQ,");}
//===[ساخت دیتا]===//
if(!is_dir("PaefkSedV")){mkdir("PaefkSedV");}
if(!is_dir("FilesQ")){mkdir("FilesQ");}
if (!file_exists("PaefkSedV/$from_id/$from_id.json")){mkdir("PaefkSedV/$from_id");}
$Bot = json_decode(file_get_contents("PaefkSedV/$from_id/$from_id.json"),true);
$step = $Bot["step"];
//===[END]===//
if(file_exists("texst.txt")){
$texst = file_get_contents("texst.txt");
}else{
$texst = "سلام";
}
if(file_exists("mod.txt")){
$mod = file_get_contents("mod.txt");
}else{
$mod = "1";
}
if(file_exists("ersal.txt")){
$ersal = file_get_contents("ersal.txt");
}else{
$ersal = "1";
}
if(file_exists("bane.txt")){
$bane = file_get_contents("bane.txt");
}else{
$bane = "0";
}
if(file_exists("namey.txt")){
$namey = file_get_contents("namey.txt");
}else{
$namey = "0";
}
if(file_exists("Seen.txt")){
$Seen = file_get_contents("Seen.txt");
}else{
$Seen = "1";
}
if(file_exists("joinm.txt")){
$joinm = file_get_contents("joinm.txt");
}else{
$joinm = "متن جوین اجباری تنظیم نشده است";
}
if(file_exists("joinm.txt")){
$channel1 = file_get_contents("channel1.txt");
$channel2 = file_get_contents("channel2.txt");
$channel3 = file_get_contents("channel3.txt");
$channel4 = file_get_contents("channel4.txt");
$joinms = file_get_contents("joinm.txt");
$joinm = str_replace('ch1',$channel1,$joinms);
$joinm = str_replace('ch2',$channel2,$joinm);
$joinm = str_replace('ch3',$channel3,$joinm);
$joinm = str_replace('ch4',$channel4,$joinm);
}else{
$channel1 = file_get_contents("channel1.txt");
$channel2 = file_get_contents("channel2.txt");
$channel3 = file_get_contents("channel3.txt");
$channel4 = file_get_contents("channel4.txt");
$joinms = "💡برای دانلود در کانال های زیر عضو شوید

 ch1
 ch2
 ch3
 ch4

بعد از عضو شدن روی دکمه « ✅ تایید عضویت دانلود  » و فایل مخصوص را دانلود کنید 👍";
$joinm = str_replace('ch1',$channel1,$joinms);
$joinm = str_replace('ch2',$channel2,$joinm);
$joinm = str_replace('ch3',$channel3,$joinm);
$joinm = str_replace('ch4',$channel4,$joinm);
}
if(file_exists("channelme.txt")){
$channelme = file_get_contents("channelme.txt");
}else{
$channelme = "متن کانال ما  تنظیم نشده است";
}
$channelsee = file_get_contents("channelsee.txt");
$TimSeen = file_get_contents("TimSeen.txt");
if(file_exists("Texq.txt")){
$Texq = file_get_contents("Texq.txt");
$Texq = str_replace('Channel',$channelsee,$Texq);
}else{
$Texq = "برای دریافت فایل لطفا چند پست اخر این کانال رو آرام سین کنید.
👉🏻 Channel
بعد اینکه سین کردین روی دکمه زیر بزنید و فایل خود را دریافت کند";
$Texq = str_replace('Channel',$channelsee,$Texq);
}
if(file_exists("captions.txt")){
$captions = file_get_contents("captions.txt");
}else{
$captions = "کپشن";
}
if(file_exists("QpAss.txt")){
$QpAss = file_get_contents("QpAss.txt");
}else{
$QpAss = "🔑 این فایل دارای پسورد است 

پسورد فایل را ارسال کنید️";
}
if(file_exists("help.txt")){
$help = file_get_contents("help.txt");
}else{
$help = "راهنما";
}
if($warn >= 2){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"",
]); 
exit();
}
$KeyAds = json_encode([
'keyboard'=>[
[['text'=>'📥 | آپلود'],['text'=>'⛔️ | بلاک و آنبلاک کردن ✅']],
[['text' => '📊 | آمار ربات'],['text' => "🏦 | تنظیمات کانال"],['text' => "📨 | ارسال پیام"]],
[['text' => '👤 | ادمین ها'],['text' => "🔕 | خاموش و روشن🔔"],['text' => "🛂 | ارسال به چنل"]],
[['text' => '📯 | تبلیغ'],['text' => "⚙️ | تنظیمات"],['text' => "🔑 | تنظیم پسورد"]],
[['text' => '📝 | تنظیم کپشن'],['text' => "👀 | تنظیمات سین"],['text' => "❌ | تایم حذف مدیا"]],
[['text'=>"/start"]],
],
"resize_keyboard"=>true,
]);
$settings = json_encode([
'keyboard'=>[
[['text'=>"🔖 متن استارت"],['text'=>"🔖 متن جوین"]],
[['text'=>"🔖 متن کانال ما"]],
[['text'=>"🔖 متن کپشن"],['text'=>"🔖 متن پسورد"]],
[['text'=>"👁‍🗨 نمایش بازدید"],['text'=>"🛠 ارسال تبلیغ"]],
[['text'=>"🔧 مود جوین"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
]);
$KeyBack = json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
]);
$KeyBackss = json_encode([
'keyboard'=>[
[['text'=>"🔙 برگشت"]],
],
"resize_keyboard"=>true,
]);
$date = jdate("Y/m/d");
$time = jdate("H:i:s");
if(file_get_contents("onof.txt") == "off" and $chat_id != $AbQ){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🤖 ربات موقتا خاموش میباشد",
]);
exit;
}
//===[جوین]===//
$tchannel1 = file_get_contents("tchannel1.txt");
$tchannel2 = file_get_contents("tchannel2.txt");
$tchannel3 = file_get_contents("tchannel3.txt");
$tchannel4 = file_get_contents("tchannel4.txt");
//===[جوین اجباری]===//
$channel1 = file_get_contents("channel1.txt");
$channel1 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$tchannel1&user_id=".$from_id))->result->status;
$channel2 = file_get_contents("channel2.txt");
$channel2 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$tchannel2&user_id=".$from_id))->result->status;
$channel3 = file_get_contents("channel3.txt");
$channel3 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$tchannel3&user_id=".$from_id))->result->status;
$channel4 = file_get_contents("channel4.txt");
$channel4 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$tchannel4&user_id=".$from_id))->result->status;
//===[ربات]===//
if($tc == 'private'){
if($MessNew == "/start" || $MessNew == "/start A"){
$exp=explode("\n",file_get_contents("PaefkSedV/PaefkSedVhU.txt"));
if(!in_array($from_id,$exp)){
$myfile2 = fopen("PaefkSedV/PaefkSedVhU.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$texst",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔈 کانال ما"]],
[['text'=>"/admin"]],
],
"resize_keyboard"=>true,
])
]); 
exit;
}
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$texst",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔈 کانال ما"]],
],
"resize_keyboard"=>true,
])
]); 
}
if($channel1 == 'left' or $channel2 == 'left' or $channel3 == 'left' or $channel4 == 'left'){
$fileid = explode(" ",$MessNew)[1];
if($fileid != true){
$fileid = "A";
}
if($mod == "1"){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$joinm",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => "✅ تایید عضویت دانلود ", 'url' => "https://t.me/$usernames?start=$fileid"]],
],
])
]);
exit;
}
if($mod == "2"){
if($channel1 == 'left'){
$channel1 = file_get_contents("channel1.txt");
if(!strpos($channel1 == "https://") !== false){
$channel1 = "https://$channel1";
}
$key[] = [['text' => "⚡️ عضویت ", 'url' => "$channel1"]];
}
if($channel2 == 'left'){
$channel2 = file_get_contents("channel2.txt");
if(!strpos($channel2 == "https://") !== false){
$channel2 = "https://$channel2";
}
$key[] = [['text' => "⚡️ عضویت ", 'url' => "$channel2"]];
}
if($channel3 == 'left'){
$channel3 = file_get_contents("channel3.txt");
if(!strpos($channel3 == "https://") !== false){
$channel3 = "https://$channel3";
}
$key[] = [['text' => "⚡️ عضویت ", 'url' => "$channel3"]];
}
if($channel4 == 'left'){
$channel4 = file_get_contents("channel4.txt");
if(!strpos($channel4 == "https://") !== false){
$channel4 = "https://$channel4";
}
$key[] = [['text' => "⚡️ عضویت ", 'url' => "$channel4"]];
}
$key[] = [['text' => "✅ تایید عضویت دانلود ", 'url' => "https://t.me/$usernames?start=$fileid"]];
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💡برای دانلود در کانال های زیر عضو شوید",
'reply_markup'=>json_encode([
'inline_keyboard'=>$key,
])
]);
exit;
}}
if (strpos($MessNew, "/start") !== false){
$fileid = str_replace("/start ","",$MessNew);
if(is_dir("FilesQ/$fileid/")){
if (!file_exists("PaefkSedV/$from_id/time.txt")){
file_put_contents("PaefkSedV/$from_id/time.txt","OK");
}
$A = time() - filectime("PaefkSedV/$from_id/time.txt");
if($Seen == "2" and $A <= $TimSeen){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$Texq",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => "سین کردم 👀 دریافت فایل 📤", 'url' => "https://t.me/$usernames?start=$fileid"]],
],
])
]);
exit;
}
if(file_exists("FilesQ/$fileid/PassW.Pass")){
$Bot["step"] = "mdkeiwiu2uejdjd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("PaefkSedV/$from_id/F.File",$fileid);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$QpAss",
]);
exit;
}
$A1 = file_get_contents("FilesQ/$fileid/A1.file");
$A2 = file_get_contents("FilesQ/$fileid/A2.file");
$A3 = file_get_contents("FilesQ/$fileid/A3.file");
$Abb = $A3 + 1;
file_put_contents("FilesQ/$fileid/A3.file",$Abb);
if(file_exists("Tabli.txt")){
if($ersal == "2"){
$Chat = file_get_contents("Tabli.txt");
$Chat = explode("~",$Chat);
Tel('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$Chat[0],
'message_id'=>$Chat[1]
]);
}}
unlink("PaefkSedV/$from_id/time.txt");
if(file_get_contents("bazdi.txt") != off){
$Cap = "👁view : $Abb";
}
$capction = "$Cap

$captions";
if(strpos($A1, "phot") !== false){
$idss = Tel('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>"$A2",
'caption'=>"$capction",
])->result->message_id;
}
if(strpos($A1, "vide") !== false){
$idss = Tel('sendVideo',[
'chat_id'=>$chat_id,
'video'=>"$A2",
'caption'=>"$capction",
])->result->message_id;
}
if(strpos($A1, "gi") !== false){
$idss = Tel('sendDocument',[
'chat_id'=>$chat_id,
'document'=>"$A2",
'caption'=>"$capction",
])->result->message_id;
}
if(file_get_contents("onof1.txt") != "off"){
$rand = rand(1111111,9999999);
mkdir("JjdiQfjSe");
$jwjer = file_get_contents("timessss.txt");
file_put_contents("JjdiQfjSe/$rand.order","$jwjer-$chat_id-$idss-");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⏱ فیلم های ارسالی ربات به دلیل کپی رایت و عدم فیلتری، بعد از $jwjer ثانیه از ربات پاک میشوند.

✅ فیلم را در پی وی دوستان خود یا در پیام های ذخیره شده ارسال و دانلود کنید.️",
]);
}
if(file_exists("Tabli.txt")){
if($ersal == "1"){
$Chat = file_get_contents("Tabli.txt");
$Chat = explode("~",$Chat);
Tel('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$Chat[0],
'message_id'=>$Chat[1]
]);
}}}}
if($MessNew == "🔈 کانال ما"){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$channelme",
]); 
exit;
}
//====[ADMIN]====//
elseif($MessNew == "/admin"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت خوش امدید 🌹",
'reply_markup'=>$KeyAds
]); 
exit;
}
}
elseif($MessNew == "🔙 | بازگشت به منو"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت خوش امدید 🌹",
'reply_markup'=>$KeyAds
]); 
exit;
}
}
if($MessNew == "👤 | ادمین ها"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"👤 لیست ادمین ها"]],
[['text'=>"➖حذف ادمین"],['text'=>"➕افزودن ادمین"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($MessNew == "📥 | آپلود"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📥 گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📥 | آپلود تکی"],['text'=>"📥 | آپلود گروهی"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "⛔️ | بلاک و آنبلاک کردن ✅"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"❌ آنبلاک"],['text'=>"✅ بلاک"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}
}
elseif($MessNew == "📯 | تبلیغ"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️در این قسمت میتونید تبلیغ ثبت کنید یا حذف کنید.
❗️وقتی کاربر از طریق لینک فایل وارد ربات میشود این تبلیغ بعد فایل ارسال میشود

یکی از دکمه های زیر را انتخاب کنید👇",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"حذف تبلیغ 🗑"],['text'=>"ثبت تبلیغ 🗳"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "🛠 ارسال تبلیغ"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"در این قسمت میتونید تنظیم کنید که تبلیغ قبل یا بعد از فایل ارسال شود.

لطفا یک گزینه را انتخاب کنید👇",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔽 بعد از فایل"],['text'=>"🔼 قبل از فایل"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "🔧 مود جوین"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔸 مود شیشه ای: کانال شما به صورت دکمه شیشه ای نمایش داده میشود.
🔸 مود تکست: کانال شما به صورت نوشته داخل متن جوین اجباری نشان داده میشود.

لطفا یک مود را انتخاب کنید 👇",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💠 مود شیشه‌ای"],['text'=>"📄 مود تکست"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "📨 | ارسال پیام"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💭 ارسال همگانی"],['text'=>"💬 فروارد همگانی"]],
[['text'=>"🖥 پیام به کاربر"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "🛂 | ارسال به چنل"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔈 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔈 | ارسال با عکس"],['text'=>"🔈 | ارسال بدون عکس"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "🏦 | تنظیمات کانال"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔒 تنظیم کانال دوم"],['text'=>"🔒 تنظیم کانال اول"]],
[['text'=>"🔒 تنظیم کانال چهارم"],['text'=>"🔒 تنظیم کانال سوم"]],
[['text'=>"🗑 حذف کانال دوم"],['text'=>"🗑 حذف کانال اول"]],
[['text'=>"🗑 حذف کانال چهارم"],['text'=>"🗑 حذف کانال سوم"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}
}
if($MessNew == "⚙️ | تنظیمات"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به بخش تنظیمات خوش آمدید 🌹

یک گزینه را انتخاب کنید 👇",
'reply_markup'=>$settings,
]); 
}}
if($MessNew == "👤 لیست ادمین ها"){
if(in_array($from_id,$AbQs)){
	$AbQs = file_get_contents("Amir.Admin");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لیست ادمین ها ب شرح زیر میباشد :

$AbQs",
]); 
}}
if($MessNew == "🔕 | خاموش و روشن🔔"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"⏺ | روشن کردن مدیا"],['text'=>"💤 | خاموش کردن حذف مدیا"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($MessNew == "💤 | خاموش کردن حذف مدیا"){
if(in_array($from_id,$AbQs)){
	file_put_contents("onof1.txt","off");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💤 | ربات با موفقیت خاموش شد",
]); 
}}
if($MessNew == "⏺ | روشن کردن مدیا"){
if(in_array($from_id,$AbQs)){
	file_put_contents("onof1.txt","on");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⏺ | ربات با موفقیت روشن شد",
]); 
}}
if($MessNew == "💤 | خاموش"){
if(in_array($from_id,$AbQs)){
	file_put_contents("onof.txt","off");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💤 | ربات با موفقیت خاموش شد",
]); 
}}
if($MessNew == "⏺ | روشن"){
if(in_array($from_id,$AbQs)){
	file_put_contents("onof.txt","on");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⏺ | ربات با موفقیت روشن شد",
]); 
}}
if($MessNew == "🖥 پیام به کاربر"){	
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djrofo39fowj";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "djrofo39fowj"){ 
if(in_array($from_id,$AbQs)){
if(file_exists("PaefkSedV/$MessNew/$MessNew.json")){
$Bot["step"] = "djoepfp299wb";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("PaefkSedV/id.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 | متن پیام خود را ارسال کنید",
$KeyBack,
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📓 | ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($step == "djoepfp299wb"){ 
if(in_array($from_id,$AbQs)){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$id = file_get_contents("PaefkSedV/id.txt");
Tel('sendMessage',[
'chat_id'=>$id,
'text'=>"$MessNew",
'parse_mode'=>"MarkDown",
]); 
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 | با موفقیت ارسال شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>$KeyAds,
]); 
}}
if($MessNew == "🔈 | ارسال با عکس"){	
if(in_array($from_id,$AbQs)){
$Bot["step"] = "step1s";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔈 | عکس را ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "step1s" || $MessNew == "🔈 | ارسال بدون عکس"){ 
if(in_array($from_id,$AbQs)){
$photo = $update->message->photo;
$file_id = $photo[count($photo)-1]->file_id;
if($step == "step1s"){
file_put_contents("B1.txt",$file_id);
}
$Bot["step"] = "step2s";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔈 | متن را ارسال کنید",
$KeyBack,
]); 
}}
if($step == "step2s"){ 
if(in_array($from_id,$AbQs)){
file_put_contents("B2.txt",$MessNew);
$Bot["step"] = "step3s";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔈 | لینک را ارسال کنید
در خط دوم هم یکی از اعداد زیر را ارسال کنید :
اگر میخواهید لینک به صورت شیشه ای ارسال در خط دوم عدد 1 را قرار بدید
اگرم به صورت منشن میخواهید ارسال شد در خط دوم 2 را قرار دهید

در خط سوم هم ایدی چنل را با @ قرار دهید یا اگر خصوصی است با -100",

'reply_markup'=>$KeyBack,
]); 
}}
if($step == "step3s"){ 
if(in_array($from_id,$AbQs)){
$B2 = file_get_contents("B2.txt");
$B1 = file_get_contents("B1.txt");
$link = explode("\n",$MessNew)[0];
$channel = explode("\n",$MessNew)[2];
if($B2 == true){
if(explode("\n",$MessNew)[1] == "1"){
Tel('sendphoto',[
'photo'=>"$B1",
'chat_id'=>$channel,
'caption'=>"$B2

[دانلود فیلم]($link)",
'parse_mode'=>"MarkDown",
]);
}else{
Tel('sendphoto',[
'photo'=>"$B1",
'chat_id'=>$channel,
'caption'=>"$B2

[دانلود فیلم]($link)",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"دانلود فیلم",'url'=>"$link"]],
],
])
]);
}}
if($B1 != true){
if(explode("\n",$MessNew)[1] == "1"){
Tel('sendMessage',[
'chat_id'=>$channel,
'text'=>"$B2

[دانلود فیلم]($link)",
'parse_mode'=>"MarkDown",
]);
}else{
Tel('sendMessage',[
'chat_id'=>$channel,
'text'=>"$B2

[دانلود فیلم]($link)",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"دانلود فیلم",'url'=>"$link"]],
],
])
]);
}}
unlink("B1.txt");
unlink("B2.txt");
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔈 | انجام شد",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($MessNew == "💠 مود شیشه‌ای"){
if(in_array($from_id,$AbQs)){
file_put_contents("mod.txt","2");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد ✅",
]); 
}}
elseif($MessNew == "📄 مود تکست"){
if(in_array($from_id,$AbQs)){
file_put_contents("mod.txt","1");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد ✅",
]); 
}}
elseif($MessNew == "✅ فعال"){
if(in_array($from_id,$AbQs)){
file_put_contents("bazdi.txt","on");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حالت نمایش ویو فعال شد ✅",
'reply_markup'=>$settings,
]);
}
}
elseif($MessNew == "💤 | غیرفعال"){
if(in_array($from_id,$AbQs)){
file_put_contents("bazdi.txt","off");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حالت نمایش ویو غیرفعال شد ✅",
'reply_markup'=>$settings,
]);
}
}
if($MessNew == "👁‍🗨 نمایش بازدید"){
if(in_array($from_id,$AbQs)){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👈🏻 | گزینه مورد نظر را انتخاب کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"✅ فعال"],['text'=>"💤 | غیرفعال"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($MessNew == "🔖 متن جوین"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djid8e882uejd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 متن جوین را ارسال کنید

❗️متغییر ها 
▫️ ch1 لینک کانال اول
▫️ ch2 لینک کانال دوم
▫️ ch3 لینک کانال سوم
▫️ ch4 لینک کانال چهارم
❗️در جایی که میخواهید لینک کانال نمایش داده شود این متغییر هارو در اونجا قرار بدین.
❗️اگر در متن شما این متغییر ها نباشد کاربر نمیتواند عضو کانال شما شود.

متن فعلی :
$joinms",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djid8e882uejd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("joinm.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$settings,
]);
}
}
elseif($MessNew == "🔽 بعد از فایل"){
if(in_array($from_id,$AbQs)){
file_put_contents("ersal.txt","1");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال تبلیغ به بعد از فایل تنظیم شد ✅",
]); 
}}
elseif($MessNew == "🔼 قبل از فایل"){
if(in_array($from_id,$AbQs)){
file_put_contents("ersal.txt","2");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال تبلیغ به قبل از فایل تنظیم شد ✅",
]); 
}}
elseif($MessNew == "🔖 متن پسورد"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djid8383ujdjd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 متن پسورد را ارسال کنید

❗️وقتی ربات از کاربر پسوردی میخواد این متن نمایش داده میشود",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djid8383ujdjd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("QpAss.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$settings,
]);
}
}
elseif($MessNew == "🔖 متن استارت"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "die838iejdjd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 متن استارت را ارسال کنید

❗️این متن وقتی کاربر استارت میکند نمایش داده میشود",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "die838iejdjd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("texst.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$settings,
]);
}
}
elseif($MessNew == "🔖 متن کانال ما"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djjdie828ueuxh";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️ متنی که میخواهید وقتی کاربر روی دکمه [🔈 کانال ما] زد ارسال بشه رو بفرستید.",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djjdie828ueuxh"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channelme.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$settings,
]);
}
}
elseif($MessNew == "👁 تنظیم یا تغییر کانال سین"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "dkeii27euhdd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️کانالی که میخاهید قفل سین بشه رو ارسال کنید.

به صورت 👇🏻
https://
یا
t.me/",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "dkeii27euhdd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channelsee.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$KeyAds
]);}
}
if($MessNew == "👀 | تنظیمات سین"){
if(in_array($from_id,$AbQs)){
if($Seen == 1){
$Sesen = "✅ روشن کردن سین";
}
if($Seen == 2){
$Sesen = "❎ خاموش کردن سین";
}
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️در این قسمت میتونید تبلیغ ثبت کنید یا حذف کنید.
❗️وقتی کاربر از طریق لینک فایل وارد ربات میشود این تبلیغ بعد فایل ارسال میشود

یکی از دکمه های زیر را انتخاب کنید👇",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"$Sesen"]],
[['text'=>"⏱ تایمر سین"],['text'=>"🔖 متن سین"]],
[['text'=>"👁 تنظیم یا تغییر کانال سین"]],
[['text'=>"🔙 | بازگشت به منو"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($MessNew == "⏱ تایمر سین"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djie838iejddjdd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❓میخواهید کاربر چند ثانیه صبر کنه ؟

❗️عدد باید بین 5 الی 25 باشد.

عدد رو بفرست.",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djie838iejddjdd"){
if(in_array($from_id,$AbQs)){
if($MessNew >= 5 and $MessNew <= 26){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("TimSeen.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$KeyAds
]);
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"error❗️
عدد باید بین 5 الی 25 باشد❕
مجدد سعی کنید.",
]);
}}
}
elseif($MessNew == "✅ روشن کردن سین"){
if(in_array($from_id,$AbQs)){
file_put_contents("Seen.txt","2");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سین فعال شد ✅",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($MessNew == "❎ خاموش کردن سین"){
if(in_array($from_id,$AbQs)){
file_put_contents("Seen.txt","1");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سین خاموش شد 🔴",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($MessNew == "🔖 متن سین"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djid82872udjjxx";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️متن سین کانال رو ارسال کنید.

🔸متغییر کانال: `Channel`

❗️در متن باید متغییر باشد.
در جایی که میخواهید کانال شما نمایش داده بشه متغییر ( `Channel` ) رو بزارید.
متن فعلی :
برای دریافت فایل لطفا چند پست اخر این کانال رو آرام سین کنید.
👉🏻 Channel
بعد اینکه سین کردین روی دکمه زیر بزنید و فایل خود را دریافت کند.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djid82872udjjxx"){
if(in_array($from_id,$AbQs)){
if(!strpos($MessNew == "Channel") !== false){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"در متن شما متغییر Channel وجود نداشت ❌

❗️لطفا مجدد سعی کنید.
حتما باید متغییر باشد.",
]);
exit;
}
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("Texq.txt","$MessNew");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$KeyAds
]);
}
}
if($MessNew == "✅ بلاک"){	
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djci39f939f9en";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 ایدی عددی فرد مورد نظر را ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djci39f939f9en" and $MessNew != "🔙 🔙 | بازگشت به منو به منو" and $tc == 'private'){ 
if(in_array($from_id,$AbQs)){
if(file_exists("PaefkSedV/$MessNew/$MessNew.json")){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$id = file_get_contents("PaefkSedV/id.txt");
$Bot = json_decode(file_get_contents("PaefkSedV/$MessNew/$MessNew.json"),true);
$inv = $Bot["warn"];
$Bot["warn"] = "3";
file_put_contents("PaefkSedV/$MessNew/$MessNew.json",json_encode($Bot,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 فرد با موفقیت بلاک شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>$KeyAds
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📓 ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
elseif($MessNew == "❌ آنبلاک"){	
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djdkkepdpp20f";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 ایدی عددی فرد مورد نظر را ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djdkkepdpp20f" and $MessNew != "🔙 🔙 | بازگشت به منو به منو" and $tc == 'private'){ 
if(in_array($from_id,$AbQs)){
if(file_exists("PaefkSedV/$MessNew/$MessNew.json")){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$id = file_get_contents("PaefkSedV/id.txt");
$Bot = json_decode(file_get_contents("PaefkSedV/$MessNew/$MessNew.json"),true);
$inv = $Bot["warn"];
$Bot["warn"] = "0";
file_put_contents("PaefkSedV/$MessNew/$MessNew.json",json_encode($Bot,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 فرد با موفقیت آنبلاک شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>$KeyAds
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📓 ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($MessNew == "ثبت تبلیغ 🗳"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "dkeii3882eujd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تبلیغ خود را فروارد کنید.",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "dkeii3882eujd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("Tabli.txt","$chat_id~$message_id");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "حذف تبلیغ 🗑"){
if(in_array($from_id,$AbQs)){
if(file_exists("Tabli.txt")){
unlink("Tabli.txt");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تبلیغ شما باموفقیت حذف شد ✅",
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قبلا تبلیغی ثبت نبود که حذفش کنی 🙂",
]); 
}}}
elseif($MessNew == "📥 | آپلود تکی" || $MessNew == "📥 | آپلود گروهی"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "jfirieididjdd";
if($MessNew == "📥 | آپلود تکی"){
$Bot["steap"] = "none";
}else{
$Bot["steap"] = "jfirieididjdd";
}
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📥 لطفا عکس گیف یا فیلم خود را برای اپلود ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "jfirieididjdd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "{$Bot["steap"]}";
if($Bot["steap"] == "none"){
$keys = $KeyAds;
}else{
$keys = $KeyBack;
}
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$photo = $update->message->photo;
$file_id = $photo[count($photo)-1]->file_id;
if(isset($photo)){
$A1 = "photo";
$A2 = "$file_id";
$A3 = "عکس";
}
$video = $update->message->video;
$file_id = $message->video->file_id;
if(isset($video)){
$A1 = "video";
$A2 = "$file_id";
$A3 = "فیلم";
}
$document = $update->message->document;
$file_id = $message->document->file_id;
if(isset($document)){
$A1 = "gif";
$A2 = "$file_id";
$A3 = "گیف";
}
if(isset($document) or isset($video) or isset($photo)){
$randsw = Rands();
mkdir("FilesQ/$randsw");
file_put_contents("FilesQ/$randsw/A1.file",$A1);
file_put_contents("FilesQ/$randsw/A2.file",$A2);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$A3 شما با موفقیت در دیتابیس ذخیره شد ✅

🔰 لینک دریافت از ربات :
🔗 https://t.me/$usernames?start=$randsw

🔑 شناسه فایل:
$randsw

اگر باز فایلی میخواهید آپلود کنید بفرستید وگرنه دکمه 🔙 | بازگشت به منو رو بزنید.",
'reply_markup'=>$keys,
]);
}}}
elseif($MessNew == "➖حذف ادمین"){
if ($chat_id == $AbQ) {
$Bot["step"] = "jciro8383idijd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 آیدی عددی فرد مورد نظر را جهت ادمین شدن در ربات ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این بخش برای ادمین اصلی طراحی شده است",
]); 
}}
elseif($step == "jciro8383idijd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$AbQs = file_get_contents("Amir.Admin", "a");
$adm = str_replace("$MessNew,", "", $AbQs);
file_put_contents("Amir.Admin", $adm);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت حذف شد",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "➕افزودن ادمین"){
if ($chat_id == $AbQ) {
$Bot["step"] = "jju8777yyhh";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 آیدی عددی فرد مورد نظر را جهت ادمین شدن در ربات ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این بخش برای ادمین اصلی طراحی شده است",
]); 
}}
elseif($step == "jju8777yyhh"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$AbQs = fopen("Amir.Admin", "a") or die("Unable to open file!");
fwrite($AbQs, "$MessNew,");
fclose($AbQs);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت افزوده شد",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "🔑 | تنظیم پسورد"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "hhuu76tygghh";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 برای تنظیم فایل شناسه فایل را ارسال کنید.",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "hhuu76tygghh"){
if(in_array($from_id,$AbQs)){
if(is_dir("FilesQ/$MessNew/")){
$Bot["step"] = "ljjiii76gghh";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("PaefkSedV/$from_id/file.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا پسورد رو بفرست❗️",
]);
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شناسه اشتباست",
]);
}}}
elseif($step == "ljjiii76gghh"){
if(in_array($from_id,$AbQs)){
$file = file_get_contents("PaefkSedV/$from_id/file.txt");
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("FilesQ/$file/PassW.Pass",$MessNew);
if($MessNew == "none"){
unlink("FilesQ/$file/PassW.Pass");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" تنظیم شد و محدودیت برداشته شد ✅ ",
'reply_markup'=>$KeyAds
]);
}
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تنظیم شد ✅

برای برداشتن پسورد مجددا این مرحله را طی کنید و متن none رو روی این شناسه تنظیم کنید❗️",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "📝 | تنظیم کپشن" || $MessNew == "🔖 متن کپشن"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "dmdie828ejdjddj";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔗 متن کپشن مورد نظر را ارسال کنید",
'reply_markup'=>$KeyBack,
]); 
}}
if($step == "dmdie828ejdjddj"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("captions.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📌 با موفقیت تنظیم شد",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "🔒 تنظیم کانال چهارم"){
if(in_array($from_id,$AbQs)){
if (!file_exists("tchannel3.txt")){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ابتدا تنظیمات کانال سوم را انجام دهید",
]);
exit;
}
$Bot["step"] = "djdi833uudjxj";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک کانال خود را بفرستید

❗️اگر میخواهید مود جوین رو راحت شیشه ای بذارید چنل عمومی خود را با پسوند t.me بفرستید
❗️اگر لینک کانال خصوصی هست با صورت کامل بفرستید",
'reply_markup'=>$KeyBack,
]); 
}
}
elseif($step == "djdi833uudjxj"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "dkdjiew8e8dud";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channel4.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانال 
$MessNew
با موفقیت ثبت شد ✅

حال آیدی عددی کانال خود را بفرستید.

❗️برای گرفتن آیدی عددی کانال یکی از پست های کانال را به ربات  @userinfobot بفرستید.
نمونه :
-1001408356470",
]); 
}
}
elseif($step == "dkdjiew8e8dud"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("tchannel4.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد ✅

❗️اگر آیدی عددی اشتباه باشد ربات به درستی کار نمیکند.
❗️حتما ربات باید در کانالی که تنظیم کردید ادمین باشد.",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "🔒 تنظیم کانال سوم"){
if(in_array($from_id,$AbQs)){
if (!file_exists("tchannel2.txt")){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ابتدا تنظیمات کانال دوم را انجام دهید",
]);
exit;
}
$Bot["step"] = "djeii38ejdjd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک کانال خود را بفرستید

❗️اگر میخواهید مود جوین رو راحت شیشه ای بذارید چنل عمومی خود را با پسوند t.me بفرستید
❗️اگر لینک کانال خصوصی هست با صورت کامل بفرستید",
'reply_markup'=>$KeyBack,
]); 
}
}
elseif($step == "djeii38ejdjd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "fkdi8e838udud";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channel3.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانال 
$MessNew
با موفقیت ثبت شد ✅

حال آیدی عددی کانال خود را بفرستید.

❗️برای گرفتن آیدی عددی کانال یکی از پست های کانال را به ربات  @userinfobot بفرستید.
نمونه :
-1001408356470",
]); 
}
}
elseif($step == "fkdi8e838udud"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("tchannel3.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد ✅

❗️اگر آیدی عددی اشتباه باشد ربات به درستی کار نمیکند.
❗️حتما ربات باید در کانالی که تنظیم کردید ادمین باشد.",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "🔒 تنظیم کانال دوم"){
if(in_array($from_id,$AbQs)){
if (!file_exists("tchannel1.txt")){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ابتدا تنظیمات کانال اول را انجام دهید",
]);
exit;
}
$Bot["step"] = "fjei83737ueidid";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک کانال خود را بفرستید

❗️اگر میخواهید مود جوین رو راحت شیشه ای بذارید چنل عمومی خود را با پسوند t.me بفرستید
❗️اگر لینک کانال خصوصی هست با صورت کامل بفرستید",
'reply_markup'=>$KeyBack,
]); 
}
}
elseif($step == "fjei83737ueidid"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "fkdo8ewieidjd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channel2.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانال 
$MessNew
با موفقیت ثبت شد ✅

حال آیدی عددی کانال خود را بفرستید.

❗️برای گرفتن آیدی عددی کانال یکی از پست های کانال را به ربات  @userinfobot بفرستید.
نمونه :
-1001408356470",
]); 
}
}
elseif($step == "fkdo8ewieidjd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("tchannel2.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد ✅

❗️اگر آیدی عددی اشتباه باشد ربات به درستی کار نمیکند.
❗️حتما ربات باید در کانالی که تنظیم کردید ادمین باشد.",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "🗑 حذف کانال سوم"){
if(in_array($from_id,$AbQs)){
if(file_exists("tchannel3.txt")){
unlink("channel3.txt");
unlink("tchannel3.txt");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🗑 حذف شد",
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانالی ثبت نکردی که حذفش کنم 😂🤦🏻‍♂️",
]); 
}}}
elseif($MessNew == "🗑 حذف کانال چهارم"){
if(in_array($from_id,$AbQs)){
if(file_exists("tchannel4.txt")){
unlink("channel4.txt");
unlink("tchannel4.txt");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🗑 حذف شد",
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانالی ثبت نکردی که حذفش کنم 😂🤦🏻‍♂️",
]); 
}}}
elseif($MessNew == "🗑 حذف کانال دوم"){
if(in_array($from_id,$AbQs)){
if(file_exists("tchannel2.txt")){
unlink("channel2.txt");
unlink("tchannel2.txt");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🗑 حذف شد",
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانالی ثبت نکردی که حذفش کنم 😂🤦🏻‍♂️",
]); 
}}}
elseif($MessNew == "🗑 حذف کانال اول"){
if(in_array($from_id,$AbQs)){
if(file_exists("tchannel1.txt")){
unlink("channel1.txt");
unlink("tchannel1.txt");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🗑 حذف شد",
]); 
}else{
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانالی ثبت نکردی که حذفش کنم 😂🤦🏻‍♂️",
]); 
}}}
//===[پنل مدیریت]===//
elseif($MessNew == "📊 | آمار ربات"){
if(in_array($from_id,$AbQs)){
$All = file_get_contents("PaefkSedV/PaefkSedVhU.txt");
$Alll = explode("\n",$All);
$Alls = count($Alll);
$All = $Alls - 1;
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد کل کاربران : $Alls
تعداد کاربران فعال : $All

❗️تعداد کاربران فعال هر چند روز یکبار بررسی میشود.

⌚️ تاریخ و ساعت ( الان ) : $time $date",
]);
}
}
elseif($MessNew == "❌ | تایم حذف مدیا"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "djjdiwiwid";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ فیلم های ارسالی بعد از چند ثانیه پاک شود؟ عددی را که وارد میکنید از 30 بزرگتر  باشد",
'reply_markup'=>$KeyBack,
]); 
}
}
elseif($step == "djjdiwiwid"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("timessss.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد ✅",
'reply_markup'=>$KeyAds
]); 
}
}
elseif($MessNew == "🔒 تنظیم کانال اول"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "fdidi83838irjfjf";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک کانال خود را بفرستید

❗️اگر میخواهید مود جوین رو راحت شیشه ای بذارید چنل عمومی خود را با پسوند t.me بفرستید
❗️اگر لینک کانال خصوصی هست با صورت کامل بفرستید",
'reply_markup'=>$KeyBack,
]); 
}
}
elseif($step == "fdidi83838irjfjf"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "fkir837eurujd";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("channel1.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کانال 
$MessNew
با موفقیت ثبت شد ✅

حال آیدی عددی کانال خود را بفرستید.

❗️برای گرفتن آیدی عددی کانال یکی از پست های کانال را به ربات  @userinfobot بفرستید.
نمونه :
-1001408356470",
]); 
}
}
elseif($step == "fkir837eurujd"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "none";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("tchannel1.txt",$MessNew);
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت تنظیم شد ✅

❗️اگر آیدی عددی اشتباه باشد ربات به درستی کار نمیکند.
❗️حتما ربات باید در کانالی که تنظیم کردید ادمین باشد.",
'reply_markup'=>$KeyAds
]);
}
}
elseif($MessNew == "💭 ارسال همگانی"){
if(in_array($from_id,$AbQs)){
$GetSend = file_get_contents("Send.txt");
if($GetSend == true){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از قبل یک عملیات تنظیم کرده اید لطفا تا پایان ان عملیات صبور باشید.",
]); 
exit;
}
$Bot["step"] = "djdkkskxkksmdn";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را ارسال کنید.",
'reply_markup'=>$KeyBack,
]); 
}}
elseif($step == "djdkkskxkksmdn"){ 
if(in_array($from_id,$AbQs)){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$all_member = fopen( "PaefkSedV/PaefkSedVhU.txt", 'r');
file_put_contents("Send.txt","$MessNew-$MessNew-0");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ باموفقیت تنظیم شد و هر دقیقه به 150 نفر ارسال میشود",
'reply_markup'=>$KeyAds
]); 
}}
elseif($MessNew == "💬 فروارد همگانی"){
if(in_array($from_id,$AbQs)){
$GetFor = file_get_contents("For.txt");
if($GetFor == true){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"شما از قبل یک عملیات تنظیم کرده اید لطفا تا پایان ان عملیات صبور باشید.",
]); 
exit;
}
$Bot["step"] = "dbdjkskxmax";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را فروارد کنید.

❗️ پیام شما از کاربر یا پیوی فروارد شود

این محدودیت رو برای پشتیبانی از آمار بالا قرار دادیم.",
'reply_markup'=>$KeyBack,
]); 
}}
if($step == "dbdjkskxmax"){
if(in_array($from_id,$AbQs)){
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
file_put_contents("For.txt","$chat_id-$message_id-0");
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ باموفقیت تنظیم شد و هر دقیقه به 150 نفر ارسال میشود",
'reply_markup'=>$KeyAds
]);
}
}
elseif($step == "mdkeiwiu2uejdjd"){
$fileid = file_get_contents("PaefkSedV/$from_id/F.File");
if(is_dir("FilesQ/$fileid/")){
if(file_get_contents("FilesQ/$fileid/PassW.Pass") != $MessNew){
Tel('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پسورد اشتباه است",
]); 
exit;
}
$Bot["step"] = "free";
file_put_contents("PaefkSedV/$from_id/$from_id.json",json_encode($Bot,true));
$A1 = file_get_contents("FilesQ/$fileid/A1.file");
$A2 = file_get_contents("FilesQ/$fileid/A2.file");
$A3 = file_get_contents("FilesQ/$fileid/A3.file");
$Abb = $A3 + 1;
file_put_contents("FilesQ/$fileid/A3.file",$Abb);
if(file_exists("Tabli.txt")){
if($ersal == "2"){
$Chat = file_get_contents("Tabli.txt");
$Chat = explode("~",$Chat);
Tel('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$Chat[0],
'message_id'=>$Chat[1]
]);
}}
unlink("PaefkSedV/$from_id/time.txt");
if(file_get_contents("bazdi.txt") != "off"){
$Cap = "👁view : $Abb";
}
$capction = "$Cap

$captions";
if(strpos($A1, "phot") !== false){
Tel('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>"$A2",
'caption'=>"$capction",
]);
}
if(strpos($A1, "vide") !== false){
Tel('sendVideo',[
'chat_id'=>$chat_id,
'video'=>"$A2",
'caption'=>"$capction",
]);
}
if(strpos($A1, "gi") !== false){
Tel('sendDocument',[
'chat_id'=>$chat_id,
'document'=>"$A2",
'caption'=>"$capction",
]);
}
if(file_exists("Tabli.txt")){
if($ersal == "1"){
$Chat = file_get_contents("Tabli.txt");
$Chat = explode("~",$Chat);
Tel('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$Chat[0],
'message_id'=>$Chat[1]
]);
}}}}}
if(file_exists(error_log))unlink(error_log);
?>