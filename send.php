<?php
$Name = $_POST['Name'];
$Phone = $_POST['Phone'];
$modalFrom = $_POST['modalFrom'];
$modalTo = $_POST['modalTo'];
$date = $_POST['Date'];
$Time = $_POST['Time'];
//echo $Name;
//echo "<br>";
//echo $Phone;
if (mail("example@mail.ru", "Заявка с сайта", "Имя:".$Name.". Телефон: ".$Phone , "Откуда:".$modalFrom, "Куда:".$modalTo, "Дата:".$date, "Время:".$Time, "From: example2@mail.ru \r\n"))
 {     echo "сообщение успешно отправлено"; 
} else { 
    echo "при отправке сообщения возникли ошибки";
}?>
