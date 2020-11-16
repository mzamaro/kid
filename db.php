<?php
function conectar(){
define('HOST', '186.202.152.168');
define('USER', 'kidbeerutabuffet');
define('PASS', 'Adminkid43');

	try {
		$con = new PDO("mysql:host=". HOST .";dbname=kidbeerutabuffet", USER, PASS);

	} catch (PDOException $e){
		echo $e->getMessage();
	}
	return $con;
}
?>