<?php
// $Name = $_POST['Name'];
// $Phone = $_POST['Phone'];
// $modalFrom = $_POST['modalFrom'];
// $modalTo = $_POST['modalTo'];
// $date = $_POST['Date'];
// $Time = $_POST['Time'];
// //echo $Name;
// //echo "<br>";
// //echo $Phone;
// if (mail("example@mail.ru", "Заявка с сайта", "Имя:".$Name.". Телефон: ".$Phone , "Откуда:".$modalFrom, "Куда:".$modalTo, "Дата:".$date, "Время:".$Time, "From: example2@mail.ru \r\n"))
//  {     echo "сообщение успешно отправлено"; 
// } else { 
//     echo "при отправке сообщения возникли ошибки";
// }

require_once "SendMailSmtpClass.php"; // подключаем класс
 
$mailSMTP = new SendMailSmtpClass('zakaz@katran-sochi.com', '4f499a5b', 'mx1.hostinger.ru', 'Zakaz'); // создаем экземпляр класса
// $mailSMTP = new SendMailSmtpClass('логин', 'пароль', 'хост', 'имя отправителя');

 
// заголовок письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
$headers .= "From: Zakaz <zakaz@katran-sochi.com>\r\n"; // от кого письмо
$result =  $mailSMTP->send('kozin.alex@gmail..com', 'Заказ такси', 'Текст письма', $headers); // отправляем письмо
// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Заголовки письма');
if($result === true){
    echo "Письмо успешно отправлено";
}else{
    echo "Письмо не отправлено. Ошибка: " . $result;
}
?>