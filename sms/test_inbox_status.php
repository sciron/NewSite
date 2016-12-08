<?
//**************************
// скрипт получения статусов от СМС-шлюза
//**************************
// 

@$sms_id = $_GET["id_sms"]; // ID SMS
@$state = $_GET["state"]; //ID статуса сообщения 1-доставлено, 2-не доставлено, 4-в очереди на SMSC оператора, 8-доставлено в SMSC оператору, 16-отклонено оператором
@$last_update = $_GET["last_update"]; // Время поступления статуса от оператора (передается в формате 0000-00-00 00:00:00)
@$state_date = $_GET["state_date"]; // Время доставки смс сообщения абоненту (время определяется по часовому поясу операторского СМС шлюза и может отличаться по часовому поясу от Москвы) (передается в формате 0000-00-00 00:00:00)
@$phone = $_GET["phone"]; // Номер Абонента


/*
Дамп структуры таблицы для хранения статусов
CREATE TABLE `inbox_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id записи',
  `id_sms` int(11) NOT NULL COMMENT 'id SMS на платформе смс шлюза',
  `phone` varchar(11) NOT NULL COMMENT 'Номер Абонента',
  `state` tinyint(2) NOT NULL COMMENT 'ID статуса сообщения 1-доставлено, 2-не доставлено, 4-в очереди на SMSC оператора, 8-доставлено в SMSC оператору, 16-отклонено оператором',
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'время доставки SMS абоненту',
  PRIMARY KEY (`id`),
  KEY `id_sms` (`id_sms`),
  KEY `sms_state_id` (`state`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
*/


// Не забываем перевести UNIX_TIME в нужный формат времени, например, для INSERTа в БД
// $new_time = date("Y-m-d H:i:s", $strtotime);

// вставляем статус в БД
// $sql = "INSERT INTO inbox_status (`id_sms`, `state`, `last_update`, `state_date`, `phone`) values ('".$sms_id."', '".$state."', '".date("Y-m-d H:i:s", $last_update)."', '".date("Y-m-d H:i:s", $state_date)."', '".$phone."')";
// mysql_query($sql);






?>