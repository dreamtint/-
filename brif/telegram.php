
<?php

/* https://api.telegram.org/bot1662227677:AAFcLBjhK5JIE3SApr41TwNOHgiFgziC3F0/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$token = "6598995888:AAGGnsU2fJoBr0xt1VdrSVgJjzFYmyy1Pks";
$chat_id = "831121126";


$data = $_POST;
$arr = array();
$txt = '';

/*Общая информация*/
isset($data['user_name']) and $arr['Имя заказчика: '] = $data['user_name'];
isset($data['user_contact']) and $arr['Контакты: '] = $data['user_contact'];
isset($data['user_text']) and $arr['Сообщение: '] = $data['user_text'];

foreach($arr as $key => $value) {
  if (strlen($value) > 0) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  }
};


$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
    header('Location: thank-you.php');
} else {
    echo "Error";
}