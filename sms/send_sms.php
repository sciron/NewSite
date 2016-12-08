<?
//**************************
//ПРИМЕР ОТПРАВКИ SMS на PHP
//**************************
header('Content-Type: text/html; charset=utf-8');
include_once ("ssms_su.php");








// Пример 2 - отправляем SMS сообщение, 
// совмещая аутентификацию с отправкой сообщения.
// в этом примере для аутентификации на сервере используется ЛОГИН и ПАРОЛЬ от cервиса



$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$odalFrom = $_POST['modalFrom'];
$modalTo = $_POST['modalTo'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$PhoneNumber = $_POST['PhoneNumber'];

$phone = '79857795930'; // Телефон абонента
$email = 'kozin.au@yandex.ru'; // Логин в системе
$password = '!4f499a5b'; // Пароль в системе
$result = smsapi_push_msg_nologin($email, $password, $phone, $Name, array("sender_name"=>"user"));
//$status = var_dump($result[0]);
$ok = 'int(0)';
//echo $status;
//echo $status;
//echo $ok;
if (var_dump($result[0]) == $ok) {
	echo "Нормуль";
}
else {
	echo "Куй";
}
// if ($status == $ok ) {
// 	header ('Location: http://www.taxi-sochi24.ru/');  // перенаправление на нужную страницу
//    exit();    // прерываем работу скрипта, чтобы забыл о прошлом
// }
// else
// {
//    header ('Location: http://www.taxi-sochi24.ru/tarif.html');  // перенаправление на нужную страницу
//    exit();    // прерываем работу скрипта, чтобы забыл о прошлом
// }
?>