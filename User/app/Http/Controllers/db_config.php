<?php
    $OP =
	[
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //encodage utf8
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //afficher les erreurs en exeptions
		PDO::ATTR_PERSISTENT => false, //connexion persistente si passer a 'true'
		PDO::ATTR_EMULATE_PREPARES => false //pour faire des requêtes préparées
	];