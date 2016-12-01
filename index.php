<?php include "orolog.php"; ?>
<head>
<title>admin</title>

<?php
$flag = USER::check_auth();
 if ( $flag === false) :// if :?>
<form method="post" action ="auth.php">
	log<br/><input type="text" name="log" />
	<br/>pass<br/><input type="password" name="pas" />
	<br/><input type="submit" name="ok" value="log in" />
</form>
<?php else:?>
	Привет, <?=$flag; ?>
<?php endif;?>

</body>