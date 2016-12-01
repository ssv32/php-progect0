<?php 
include("db_conf.php");
class USER {
	public function check_auth() //проверка в куки хеша // авторизован или нет
	{
		$result = false;
		if ( !empty($_COOKIE['hash_auth']) )
		{
			$link = mysql_connect(db_host, db_user, db_pas) or die('-1');
			mysql_select_db('test') or die('-1');

			$res = mysql_query('select login from users where hash="'.$_COOKIE['hash_auth'].'";');

			if ($arRes = mysql_fetch_row($res) )
			{
				$result = $arRes[0];
			}
		}
		return $result;
	}
}

?>