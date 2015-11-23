<?php

$host  =	"serveurmysql";
$dbname=	"BDD_pphelipo";
$user  = 	"pphelipo";
$pass  = 	base64_decode("MTUwMQ==");
try {
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8'));
} catch (Exception $e) {
	$bdd = false;
}