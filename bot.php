<?php

// GpYaB
/*
نیاز به کرونجاب 1 دقیقه ای
ترجیحا کرونجاب از سایت بزنید

برای دریافت اپدیت های سورس درکانال رسمی نویسنده سورس عضو شوید
@GpYaB
*/

ini_set('display_errors', 0);
error_reporting(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);
// GpYaB
if (!file_exists('data.json')){
file_put_contents('data.json','{"autochat":{"on":"on"}}');
}
if (!is_dir('update-session')){
mkdir('update-session');
}
if (!file_exists('madeline.php')){
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
// GpYaB
include 'madeline.php';
$settings['logger']['logger'] = 0;
$settings['serialization']['serialization_interval'] = 30;
$settings['serialization']['cleanup_before_serialization'] = true;
$MadelineProto = new \danog\MadelineProto\API('GpYaB.madeline', $settings);
$MadelineProto->start();
function closeConnection($message = "<br><br><br><center><h1><span style='color:red'>GpYaB</span><span style='color:green'>Tabchi</span> <span style='color:gold'>Is</span> <span style='color:purple'>Running</span> !</h1></center>"){
if (php_sapi_name() === 'cli' || isset($GLOBALS['exited'])) {
return;
}
// GpYaB
@ob_end_clean();
@header('Connection: close');
ignore_user_abort(true);
ob_start();
echo "$message";
$size = ob_get_length();
@header("Content-Length: $size");
@header('Content-Type: text/html');
ob_end_flush();
flush();
$GLOBALS['exited'] = true;
}
function shutdown_function($lock)
{
try {
$a = fsockopen((isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] ? 'tls' : 'tcp').'://'.@$_SERVER['SERVER_NAME'], @$_SERVER['SERVER_PORT']);
fwrite($a, @$_SERVER['REQUEST_METHOD'].' '.@$_SERVER['REQUEST_URI'].' '.@$_SERVER['SERVER_PROTOCOL']."\r\n".'Host: '.@$_SERVER['SERVER_NAME']."\r\n\r\n");
flock($lock, LOCK_UN);
fclose($lock);
} catch(Exception $v){}
}
if (!file_exists('bot.lock')) {
touch('bot.lock');
}
// GpYaB
$lock = fopen('bot.lock', 'r+');
$try = 1;
$locked = false;
while (!$locked) {
$locked = flock($lock, LOCK_EX | LOCK_NB);
if (!$locked) {
closeConnection();
if ($try++ >= 30) {
exit;
}
sleep(1);
}
}
class EventHandler extends \danog\MadelineProto\EventHandler {
public function __construct($MadelineProto){
parent::__construct($MadelineProto);
}
public function onUpdateSomethingElse($update)
{
return $this->onUpdateNewMessage($update);
}
public function onUpdateNewChannelMessage($update)
{
return $this->onUpdateNewMessage($update);
}
public function onUpdateNewMessage($update){
try {
if (!file_exists('update-session/GpYaB.madeline')){
copy('GpYaB.madeline', 'update-session/GpYaB.madeline');
}
if (!file_exists('restart')){
touch('restart');
}
// GpYaB
$userID = isset($update['message']['from_id']) ? $update['message']['from_id']:'';
$msg = isset($update['message']['message']) ? $update['message']['message']:'';
$msg_id = isset($update['message']['id']) ? $update['message']['id']:'';
$me = yield $this->get_self();
$me_id = $me['id'];
$info = yield $this->get_info($update);
$chatID = $info['bot_api_id'];
$type2 = $info['type'];
$creator = 1146787019; // ایدی عددی ران کننده ربات
$admins = array(1146787019, 120684101); // ایدی عددی ادمین ها

if ($userID != $me_id){
if ($msg == 'تمدید' && $userID == $creator) {
copy('update-session/GpYaB.madeline', 'update-session/GpYaB.madeline2');
unlink('update-session/GpYaB.madeline');
copy('update-session/GpYaB.madeline2', 'update-session/GpYaB.madeline');
unlink('update-session/GpYaB.madeline2');
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '⚡️ ربات برای 30 روز دیگر شارژ شد']);
}
if (time() - filectime('update-session/GpYaB.madeline') > 2505600){
if (in_array($userID, $admins)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '❗️اخطار: مهلت استفاده شما از این ربات به اتمام رسیده❗️']);
}
} else {

if ($type2 == 'channel' || in_array($userID, $admins)) {
if (strpos("$msg", 't.me/joinchat/') !== false) {
if (strpos("$msg", 'AAAAA') === false) {
$a = explode('t.me/joinchat/', "$msg")[1];
$b = explode("\n","$a")[0];
try {
yield $this->channels->joinChannel(['channel' => "https://t.me/joinchat/$b"]);
} catch(Exception $p){
} catch(\danog\MadelineProto\RPCErrorException $p){
}
}
}
}

if (isset($update['message']['reply_markup']['rows'])) {
if ($type2 == 'supergroup'){
foreach ($update['message']['reply_markup']['rows'] as $row) {
foreach ($row['buttons'] as $button) {
if (isset($button['text'])) {
yield $button->click();
}
}
}
}
}

if (isset($update['message']['media']['phone_number'])){
yield $this->contacts->importContacts(['contacts' => [['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => $update['message']['media']['phone_number'], 'first_name' => $update['message']['media']['first_name'], 'last_name' => $update['message']['media']['last_name']]]]);
}
// GpYaB
if ($chatID == 777000) {
@$a = str_replace(0,'۰',$msg);
@$a = str_replace(1,'۱',$a);
@$a = str_replace(2,'۲',$a);
@$a = str_replace(3,'۳',$a);
@$a = str_replace(4,'۴',$a);
@$a = str_replace(5,'۵',$a);
@$a = str_replace(6,'۶',$a);
@$a = str_replace(7,'۷',$a);
@$a = str_replace(8,'۸',$a);
@$a = str_replace(9,'۹',$a);
foreach ($admins as $k) {
yield $this->messages->sendMessage(['peer' => $k, 'message' => "$a"]);
}
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
}

// GpYaB
if (in_array($userID, $admins)) {
@$data = json_decode(file_get_contents('data.json'), true);
if ($msg == '/restart'){
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '♻️ ربات دوباره راه اندازی شد.']);
yield $this->restart();
}

if ($msg == 'پاکسازی'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'لطفا کمی صبر کنید ...']);
touch('GpYaB');
$all = yield $this->get_dialogs();
foreach($all as $peer){
try {
$type = yield $this->get_info($peer);
if ($type['type'] == 'supergroup'){
$info = yield $this->channels->getChannels(['id' => [$peer]]);
$banned = $info['chats'][0]['banned_rights']['send_messages'];
if ($banned == 1) {
yield $this->channels->leaveChannel(['channel' => $peer]);
}
}
} catch(Exception $r){
} catch(\danog\MadelineProto\RPCErrorException $p){
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '✅ پاکسازی باموفقیت انجام شد.
♻️ گروه هایی که در آنها بن شده بودم حذف شدند.']);
}

if ($msg == 'انلاین' || $msg == 'تبچی' || $msg == '!ping' || $msg == '#ping' || $msg == 'ربات' || $msg == 'ping' || $msg == '/ping'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '🦅 GpYaB Tabchi ✅', 'reply_to_msg_id' => $msg_id]);
}

if ($msg == 'ورژن ربات'){
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,'message' => '**⚙️ نسخه سورس تبچی : 6.9.3**','parse_mode' => 'MarkDown']);
}

if ($msg == 'شناسه' || $msg == 'id' || $msg == 'ایدی' || $msg == 'مشخصات'){
$name = $me['first_name'];
$phone = '+'.$me['phone'];
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,'message' => "💚 مشخصات من

👤 نام: $name
#⃣ ایدی‌عددیم: `$me_id`
📞 شماره‌تلفنم: `$phone`
",'parse_mode' => 'MarkDown']);
}
// GpYaB
if ($msg == 'امار' || $msg == 'آمار' || $msg == 'stats'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message'=>'لطفا کمی صبر کنید...','reply_to_msg_id' => $msg_id]);
$day = (2505600 - (time() - filectime('update-session/GpYaB.madeline'))) / 60 / 60 / 24;
$day = round($day, 0);
$mem_using = round((memory_get_usage()/1024)/1024, 0).'MB';
$sat = $data['autochat']['on'];
if ($sat == 'on'){
$sat = '✅';
} else {
$sat = '❌';
}
$mem_total = 'NotAccess!';
$CpuCores = 'NotAccess!';
try {
if (strpos(@$_SERVER['SERVER_NAME'], '000webhost') === false){
if (strpos(PHP_OS, 'L') !== false || strpos(PHP_OS, 'l') !== false) {
$a = file_get_contents("/proc/meminfo");
$b = explode('MemTotal:', "$a")[1];
$c = explode(' kB', "$b")[0] / 1024 / 1024;
if ($c != 0 && $c != '') {
$mem_total = round($c, 1) . 'GB';
} else {
$mem_total = 'NotAccess!';
}
} else {
$mem_total = 'NotAccess!';
}
if (strpos(PHP_OS, 'L') !== false || strpos(PHP_OS, 'l') !== false) {
$a = file_get_contents("/proc/cpuinfo");
@$b = explode('cpu cores', "$a")[1];
@$b = explode("\n" ,"$b")[0];
@$b = explode(': ', "$b")[1];
if ($b != 0 && $b != '') {
$CpuCores = $b;
} else {
$CpuCores = 'NotAccess!';
}
} else {
$CpuCores = 'NotAccess!';
}
}
} catch(Exception $f){}
$supergps = 0;
$channels = 0;
$pvs = 0;
$gps = 0;
$s = yield $this->get_dialogs();
foreach ($s as $peer) {
try {
$i = yield $this->get_info($peer);
if ($i['type'] == 'supergroup') $supergps++;
if ($i['type'] == 'channel') $channels++;
if ($i['type'] == 'user') $pvs++;
if ($i['type'] == 'chat') $gps++;
} catch (\Exception $e) {
} catch (\danog\MadelineProto\RPCErrorException $e) {}
}
$all = $gps+$supergps+$channels+$pvs;
yield $this->messages->sendMessage(['peer' => $chatID,
'message' => "📊 GpYaBTabchi Status :

🔻 All : $all
→
👥 SuperGps : $supergps
→
👣 NormalGps : $gps
→
📢 Channels : $channels
→
📩 Users : $pvs
→
☎️ AutoChat : $sat
→
☀️ Trial : $day Day
→
🎛 CPU Cores : $CpuCores
→
🔋 TotalMem : $mem_total
→
♻️ MemUsage by this bot : $mem_using"]);
/* if ($supergps > 400 || $pvs > 1500){
yield $this->messages->sendMessage(['peer' => $chatID,
'message' => '⚠️ اخطار: به دلیل کم بودن منابع هاست تعداد گروه ها نباید بیشتر از 400 و تعداد پیوی هاهم نباید بیشتراز 1.5K باشد.
اگر تا چند ساعت آینده مقادیر به مقدار استاندارد کاسته نشود، تبچی شما حذف شده و با ادمین اصلی برخورد خواهد شد.']);
} */
}

if ($msg == 'us' or $msg == 'مصرف') {
$mem_using = round((memory_get_usage()/1024)/1024, 1).'MB';
$sessionsize = round(filesize('GpYaB.madeline')/1024/1024,2) . 'MB';
yield $this->messages->sendMessage(['peer' => $chatID,
'message' => "♻️ MemUsage: $mem_using
♻️ SessionSize: $sessionsize", 'reply_to_msg_id' => $msg_id]);
}

// GpYaB
if ($msg == 'help' || $msg == '/help' || $msg == 'Help' || $msg == 'راهنما'){
yield $this->messages->sendMessage([
'peer' => $chatID,
'message' => '⁉️ راهنماے تبچے سورس خونه :

`انلاین`
✅ دریافت وضعیت ربات
——————
`امار`
📊 دریافت آمار گروه ها و کاربران
——————
`/addall ` [UserID]
⏬ ادد کردن یڪ کاربر به همه گروه ها
——————
`/addpvs ` [IDGroup]
⬇️ ادد کردن همه ے افرادے که در پیوے هستن به یڪ گروه
——————
`f2all ` [reply]
〽️ فروارد کردن پیام ریپلاے شده به همه گروه ها و کاربران
——————
`f2pv ` [reply]
🔆 فروارد کردن پیام ریپلاے شده به همه کاربران
——————
`f2gps ` [reply]
🔊 فروارد کردن پیام ریپلاے شده به همه گروه ها
——————
`f2sgps ` [reply]
🌐 فروارد کردن پیام ریپلاے شده به همه سوپرگروه ها
——————
`s2sgps ` [text]
🌐 ارسال کردن پیام جلوی دستور به همه سوپرگروه ها
——————
`/setFtime ` [reply],[time-min]
♻️ فعالسازے فروارد خودکار زماندار
——————
`/delFtime`
🌀 حذف فروارد خودکار زماندار
——————
`/SetId` [text]
⚙ تنظیم نام کاربرے (آیدے)ربات
——————
`/profile ` [نام] | [فامیل] | [بیوگرافی]
💎 تنظیم نام اسم ,فامےلو بیوگرافے ربات
——————
`/join ` [@ID] or [LINK]
🎉 عضویت در یڪ کانال یا گروه
——————
`ورژن ربات`
📜 نمایش نسخه سورس تبچے شما
——————
`پاکسازی`
📮 خروج از گروه هایے که مسدود کردند
——————
🔖 `مشخصات`
📎 دریافت ایدی‌عددے ربات تبچی
——————
`/delchs`
🥇خروج از همه ے کانال ها
——————
`/delgroups` [تعداد]
🥇خروج از گروه ها به تعداد موردنظر
——————
`/setPhoto ` [link]
📸 اپلود عکس پروفایل جدید
——————
`/autochat ` [on] or [off]
🎖 فعال یا خاموش کردن چت خودکار (پیوی و گروه ها)

≈ ≈ ≈ ≈ ≈ ≈ ≈ ≈ ≈ ≈',
'parse_mode' => 'markdown']);
}
// GpYaB
if ($msg == 'F2all' || $msg == 'f2all'){
if ($type2 == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال فروارد ...']);
touch('GpYaB');
$rid = $update['message']['reply_to_msg_id'];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
if ($type['type'] == 'supergroup' || $type['type'] == 'user' || $type['type'] == 'chat'){
$this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'فروارد همگانی با موفقیت به همه ارسال شد 👌🏻']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '‼از این دستور فقط در سوپرگروه میتوانید استفاده کنید.']);
}
}
// GpYaB
if ($msg == 'F2pv' || $msg == 'f2pv'){
if ($type2 == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال فروارد ...']);
touch('GpYaB');
$rid = $update['message']['reply_to_msg_id'];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
if ($type['type'] == 'user'){
$this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'فروارد همگانی با موفقیت به پیوی ها ارسال شد 👌🏻']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '‼از این دستور فقط در سوپرگروه میتوانید استفاده کنید.']);
}
}
// GpYaB
if ($msg == 'F2gps' || $msg == 'f2gps'){
if ($type2 == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال فروارد ...']);
touch('GpYaB');
$rid = $update['message']['reply_to_msg_id'];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
if ($type['type'] == 'chat' ){
$this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'فروارد همگانی با موفقیت به گروه ها ارسال شد👌🏻']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '‼از این دستور فقط در سوپرگروه میتوانید استفاده کنید.']);
}
}
// GpYaB
if ($msg == 'F2sgps' || $msg == 'f2sgps'){
if ($type2 == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال فروارد ...']);
touch('GpYaB');
$rid = $update['message']['reply_to_msg_id'];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
if ($type['type'] == 'supergroup'){
$this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'فروارد همگانی با موفقیت به سوپرگروه ها ارسال شد 👌🏻']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '‼از این دستور فقط در سوپرگروه میتوانید استفاده کنید.']);
}
}

if (strpos("$msg",'s2sgps ') !== false){
$TXT = explode('s2sgps ', $msg)[1];
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال ارسال ...']);
touch('GpYaB');
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
try {
$type = yield $this->get_info($peer);
} catch(Exception $r){
} catch(\danog\MadelineProto\RPCErrorException $p){
}
if ($type['type'] == 'supergroup'){
try {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$TXT"]);
} catch(Exception $r){
} catch(\danog\MadelineProto\RPCErrorException $p){
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ارسال همگانی با موفقیت به سوپرگروه ها ارسال شد 🙌🏻']);
}

if ($msg == '/delFtime'){
foreach(glob("ForTime/*") as $files){
unlink("$files");
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'➖ فروارد خودکار زماندار باموفقیت لغو شد !',
'reply_to_msg_id' => $msg_id]);
}
// GpYaB
if ($msg == 'delchs' || $msg == '/delchs'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'لطفا کمی صبر کنید...',
'reply_to_msg_id' => $msg_id]);
$all = yield $this->get_dialogs();
foreach ($all as $peer) {
$type = yield $this->get_info($peer);
$type3 = $type['type'];
if ($type3 == 'channel'){
$id = $type['bot_api_id'];
yield $this->channels->leaveChannel(['channel' => $id]);
}
} yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'از همه ی کانال ها لفت دادم 👌','reply_to_msg_id' => $msg_id]);
}
// GpYaB
if (preg_match("/^[\/\#\!]?(delgroups) (.*)$/i", $msg)){
preg_match("/^[\/\#\!]?(delgroups) (.*)$/i", $msg, $text);
touch('GpYaB');
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'لطفا کمی صبر کنید...',
'reply_to_msg_id' => $msg_id]);
$count = 0;
$all = yield $this->get_dialogs();
foreach ($all as $peer) {
try {
$type = yield $this->get_info($peer);
$type3 = $type['type'];
if ($type3 == 'supergroup' || $type3 == 'chat'){
$id = $type['bot_api_id'];
if ($chatID != $id){
yield $this->channels->leaveChannel(['channel' => $id]);
$count++;
if ($count == $text[2]) {
break;
}
}
}
} catch(Exception $m){}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "از $text[2] تا گروه لفت دادم 👌",'reply_to_msg_id' => $msg_id]);
}
// GpYaB
if (preg_match("/^[\/\#\!]?(autochat) (on|off)$/i", $msg)){
preg_match("/^[\/\#\!]?(autochat) (on|off)$/i", $msg, $m);
$data['autochat']['on'] = "$m[2]";
file_put_contents("data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'🤖 حالت چت خودکار روشن شد ✅','reply_to_msg_id' => $msg_id]);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'🤖 حالت چت خودکار خاموش شد ❌','reply_to_msg_id' => $msg_id]);
}
}
// GpYaB
if (preg_match("/^[\/\#\!]?(join) (.*)$/i", $msg)){
preg_match("/^[\/\#\!]?(join) (.*)$/i", $msg, $text);
$id = $text[2];
try {
yield $this->channels->joinChannel(['channel' => "$id"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '✅ Joined',
'reply_to_msg_id' => $msg_id]);
} catch(Exception $e){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '❗️<code>'.$e->getMessage().'</code>',
'parse_mode'=>'html',
'reply_to_msg_id' => $msg_id]);
}
}
if (preg_match("/^[\/\#\!]?(SetId) (.*)$/i", $msg)){
preg_match("/^[\/\#\!]?(SetId) (.*)$/i", $msg, $text);
$id = $text[2];
try {
$User = yield $this->account->updateUsername(['username' => "$id"]);
} catch(Exception $v){
$this->messages->sendMessage(['peer' => $chatID,'message'=>'❗'.$v->getMessage()]);
}
$this->messages->sendMessage([
'peer' => $chatID,
'message' =>"• نام کاربری جدید برای ربات تنظیم شد :
@$id"]);
}
if (strpos($msg, '/profile ') !== false) {
$ip = trim(str_replace("/profile ","",$msg));
$ip = explode("|",$ip."|||||");
$id1 = trim($ip[0]);
$id2 = trim($ip[1]);
$id3 = trim($ip[2]);
yield $this->account->updateProfile(['first_name' => "$id1", 'last_name' => "$id2", 'about' => "$id3"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>"🔸نام جدید تبچی: $id1
🔹نام خانوادگی جدید تبچی: $id2
🔸بیوگرافی جدید تبچی: $id3"]);
}
// GpYaB
if (strpos($msg, 'addpvs ') !== false){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => ' ⛓درحال ادد کردن ...']);
touch('GpYaB');
$gpid = explode('addpvs ', $msg)[1];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
$type3 = $type['type'];
if ($type3 == 'user'){
$pvid = $type['user_id'];
$this->channels->inviteToChannel(['channel' => $gpid, 'users' => [$pvid]]);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "همه افرادی که در پیوی بودند را در گروه $gpid ادد کردم 👌🏻"]);
}
// GpYaB
if (preg_match("/^[#\!\/](addall) (.*)$/", $msg)){
preg_match("/^[#\!\/](addall) (.*)$/", $msg, $text1);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'لطفا کمی صبر کنید...',
'reply_to_msg_id' => $msg_id]);
touch('GpYaB');
$user = $text1[2];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
try {
$type = yield $this->get_info($peer);
$type3 = $type['type'];
} catch(Exception $d){}
if ($type3 == 'supergroup'){
try {
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => ["$user"]]);
} catch(Exception $d){}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "کاربر **$user** توی همه ی ابرگروه ها ادد شد ✅",
'parse_mode' => 'MarkDown']);
}
// GpYaB
if (preg_match("/^[#\!\/](setPhoto) (.*)$/", $msg)){
preg_match("/^[#\!\/](setPhoto) (.*)$/", $msg, $text1);
if (strpos($text1[2], '.jpg') !== false or strpos($text1[2], '.png') !== false){
copy($text1[2], 'photo.jpg');
yield $this->photos->updateProfilePhoto(['id' => 'photo.jpg']);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '📸 عکس پروفایل جدید باموفقیت ست شد.','reply_to_msg_id' => $msg_id]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '❌ فایل داخل لینک عکس نمیباشد!','reply_to_msg_id' => $msg_id]);
}
}
// GpYaB
if (preg_match("/^[#\!\/](setFtime) (.*)$/", $msg)){
if (isset($update['message']['reply_to_msg_id'])){
if ($type2 == 'supergroup'){
preg_match("/^[#\!\/](setFtime) (.*)$/", $msg, $text1);
if ($text1[2] < 30){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'**❗️خطا: عدد وارد شده باید بیشتر از 30 دقیقه باشد.**','parse_mode' => 'MarkDown']);
} else {
$time = $text1[2] * 60;
if (!is_dir('ForTime')){
mkdir('ForTime');
}
file_put_contents("ForTime/msgid.txt", $update['message']['reply_to_msg_id']);
file_put_contents("ForTime/chatid.txt", $chatID);
file_put_contents("ForTime/time.txt", $time);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "✅ فروارد زماندار باموفقیت روی این پُست درهر $text1[2] دقیقه تنظیم شد.", 'reply_to_msg_id' => $update['message']['reply_to_msg_id']]);
}
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '‼از این دستور فقط در سوپرگروه میتوانید استفاده کنید.']);
}
}
}
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => false, 'peer' => $chatID, 'max_id' => $msg_id]);
}
// GpYaB
if ($type2 == 'supergroup' && rand(0, 2000) == 1) {
if (@json_decode(@file_get_contents('data.json'), true)['autochat']['on'] == 'on') {
// GpYaB
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
// GpYaB
$eagle = array('❄️😐','🍂😐','😂😐','😐😐😐😐','😕','😎💄',':/','😂❤️','🤦🏻‍♀🤦🏻‍♀🤦🏻‍♀','🚶🏻‍♀🚶🏻‍♀🚶🏻‍♀','🎈😐','شعت 🤐','🥶');
$texx = $eagle[rand(0, count($eagle) - 1)];
yield $this->sleep(1);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "$texx"]);
}
}
// GpYaB
if (file_exists('ForTime/time.txt')){
if ((time() - filectime('ForTime/time.txt')) >= file_get_contents('ForTime/time.txt')){
touch('GpYaB');
$tt = file_get_contents('ForTime/time.txt');
unlink('ForTime/time.txt');
file_put_contents('ForTime/time.txt',$tt);
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$type = yield $this->get_info($peer);
if ($type['type'] == 'supergroup' || $type['type'] == 'chat'){
$this->messages->forwardMessages(['from_peer' => file_get_contents('ForTime/chatid.txt'), 'to_peer' => $peer, 'id' => [file_get_contents('ForTime/msgid.txt')]]);
}
}
}
}

if (file_exists('GpYaB') and (time()-filectime('GpYaB')) > 300) {
unlink('GpYaB');
}

if (!file_exists('GpYaB')) {
if (file_exists('GpYaB.madeline') && filesize('GpYaB.madeline')/1024 > 8192){
foreach (glob("*") as $file) {
if ($file != 'index.php' and $file != 'update-session' and $file != 'data.json' and $file != 'index.php') {
@unlink("$file");
}}
copy('update-session/GpYaB.madeline', 'GpYaB.madeline');
exit(file_get_contents('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']));
exit;
exit;
}

if (file_exists('restart') and time() - filectime('restart') > 305){
unlink('restart');
touch('restart');
yield $this->restart();
}
}

}
}
} catch(Exception $e){
/*if (strpos("$e", 'The provided peer id is invalid') === false) {
yield $this->messages->sendMessage(['peer' => '@mohammadrezajiji', 'message' => "$e"]);
}*/
} catch(\danog\MadelineProto\RPCErrorException $p){
// yield $this->messages->sendMessage(['peer' => '@mohammadrezajiji', 'message' => "$p"]);
}
}
}

register_shutdown_function('shutdown_function', $lock);
closeConnection();
$MadelineProto->async(true);
$MadelineProto->loop(function () use ($MadelineProto) {
yield $MadelineProto->setEventHandler('\EventHandler');
});
$MadelineProto->loop();
// GpYaB
