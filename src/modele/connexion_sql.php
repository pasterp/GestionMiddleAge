<?php

$host  =	"serveurmysql";
$dbname=	"BDD_pphelipo";
$user  = 	"pphelipo";
$pass  = 	base64_decode("MTUwMQ==");

$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);