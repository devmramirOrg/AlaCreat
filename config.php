<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @LintoCode
//-------------------------

//------- Sql DataBase -------
$serverName = "localhost"; // ادیت نشود
$db_name    = "name"; // نام دیتابیس
$db_user    = "user"; // یوزر دیتابیس
$db_pass    = "password"; // پسورد دیتابیس

$conn = mysqli_connect($serverName, $db_user, $db_pass, $db_name);

if(!$conn){

    die('failed ' . mysqli_connect_error());
}
//------- Data -------
$token        = ""; // توکن ربات
$admin        = "544316811"; // عددی ادمین
$bot_url      = "https://api.telegram.org/bot$token"; // ادیت نشود
$bot_id       = ""; // ایدی ربات با @
$botname      = "اپلودرساز"; // اسم ربات  
$support      = "DevMrAmir"; // Support
$channel_bot  = ""; // ایدی کانال
$folder       = "https://amirhosin.gigapanel.xyz/uplodersaz";
$channel_id   = "-1001659798195"; // ایدی عددی چنل گزارشات
$per          = 50000;
$MerchantID   = ""; // مرچند زرین پال
$web          = ""; // دامنه خودتون
$refral_coin  = 250;
//------- Function -------

    function send_reply($url, $post_params) {
 
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, $url);
        curl_setopt($cu, CURLOPT_POSTFIELDS, $post_params);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);  // get result
        $result = curl_exec($cu);
        curl_close($cu);
        return $result;
    }
    
    function bot($method, $user = []){
        global $token;
    $url = "https://api.telegram.org/bot$token"."/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function botabol($method,$datas=[]){
    global $token;
$url = "https://api.telegram.org/bot$token/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
    
    
    
    
    
?>