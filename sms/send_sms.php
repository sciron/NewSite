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
$modalFrom = $_POST['modalFrom'];
$modalTo = $_POST['modalTo'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$PhoneNumber = $_POST['PhoneNumber'];
$massage = "Name: " . $Name ."_" ."Nomer: " . $Phone ."_" . "Otkuda: " . $modalFrom ."_" ."Kuda: " . $modalTo ."_" . "Kogda: " . $Date ." " . $Time;

$phone = '79857795930'; // Телефон абонента
$email = 'kozin.au@yandex.ru'; // Логин в системе
$password = '!4f499a5b'; // Пароль в системе
$result = smsapi_push_msg_nologin($email, $password, $phone, $massage, array("sender_name"=>"user"));

	header ('Location: http://www.taxi-sochi24.ru/');  // перенаправление на нужную страницу

?>