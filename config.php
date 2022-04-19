<?php
spl_autoload_register(function ($class_name) {
	$filename = "class" . DIRECTORY_SEPARATOR . $class_name . ".php";
	if (file_exists(($filename))) {
		require_once($filename);
	}
});


//***CHAVES DE API***\\
//distance matrixapi E AUTOCOMPLETE
$chave = "CHAVE123"; // INSIRA AQUI A CHAVE GERADA CONFORME ARQUIVO README

//**************************************************//

$consumo = "10";

$precoComb = "3.99";

$multiplicador = "3";
