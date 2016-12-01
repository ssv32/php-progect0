<?php
if ( !empty($_POST["log"]) && !empty($_POST["pas"]) )
{
	include("db_conf.php");
	$link = mysql_connect(db_host, db_user, db_pas) or die('Не удалось соединиться: ' . mysql_error());
	mysql_select_db('test') or die('неполучилось открыть бд');
	//ищем пользователя с таким именем и паролем
	$res = mysql_query('select * from users where login="'.$_POST["log"].'" and pass="'.$_POST['pas'].'"'); 
	if ($arRes = mysql_fetch_row($res))
	{
		// $arRes[0] - id user
		setcookie('hash_auth', '12345'); //устанавливаем куку // сделать рендомным потом
		mysql_query('update users set hash="12345" where id="'.$arRes[0].'"');
		$msg = "ok";		
	} else $msg = "err";
	mysql_close();
} else {
	$msg = "err";
}
if ($msg == 'ok') header('Location: /ssv'); else echo $msg;
?>