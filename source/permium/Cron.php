<?php
define('XMSDN','[*[TOKEN]*]');
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
foreach(glob('JjdiQfjSe/*.order') as $a){
$jwkkdkf = explode("-",file_get_contents("$a"));
if(filectime("$a") > $jwkkdkf[0]){
Tel('deletemessage', ['chat_id' =>$jwkkdkf[1],'message_id' =>$jwkkdkf[2]]);
unlink($a);
}}
if(file_exists(error_log))unlink(error_log);
?>