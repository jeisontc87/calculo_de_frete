
<?php
require_once("config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="folha_de_estilo.css">
    <title></title>
</head>
<body>
<?php


		$saidaCasa = $_POST['saidaCasa'];
		$saidaCasa=urlencode($saidaCasa);

		$coleta  = $_POST['coleta'];
		$coleta=urlencode($coleta);

	 	$entrega = "|".$_POST['entrega'];
	 	$entrega = urlencode($entrega);

	
	 	$voltaCasa ='|'.$_POST['voltaCasa'];
		$voltaCasa = urlencode($voltaCasa);
                


	
	$link = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$saidaCasa$entrega&destinations=$coleta$voltaCasa&key=$chave";
        
        
        
	$ch= curl_init($link);
        
        

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$response = curl_exec($ch);
	curl_close($ch);

	$data = json_decode($response, true);
        
        
        
	
	/////////////////////////////////////////////////////////
	///////////////// Kilometragem saida -> coleta//////////
	///////////////////////////////////////////////////////
	$km = ($data ['rows'][0]['elements'][0]['distance']['value']);
	

	/////////////////////////////////////////////////////
	/////////////// kilometragem coleta->destino////////
	///////////////////////////////////////////////////
	$km1 = ($data ['rows'][1]['elements'][0]['distance']['value']);
	

	/////////////////////////////////////////////////////
	/////////////// kilometragem destino->volta casa////
	///////////////////////////////////////////////////
	

	$km2 = ($data ['rows'][1]['elements'][1]['distance']['value']);
	
	//teste
	//var_dump($data/* ['rows'][1]['elements'][1]['distance']['value']*/);
	$kmTotal = ($km + $km1 + $km2)/1000;?>

	<div id="fonte"><fieldset><?php echo "A distancia a percorrer é igual a: " .round($kmTotal,2)."km.<br/>";

	$ltGastos = $kmTotal / $consumo;

	echo "<br/> A quantidade de litros gastos nessa viagem é igual a: ".round($ltGastos,2)." lts.<br/>";
	$totalLitros= $ltGastos * $precoComb;

	echo "<br/> O valor gasto em cobustível é igual a: R$ ".round($totalLitros,2).".";?>

	<fieldset id="foco">
		<?php $valorTotal = $totalLitros * $multiplicador;
	echo "<h3>O valor do frete é igual a: </h3><h1>R$".round($valorTotal,2)."!</h1>";?>
		
	</fieldset>

	<?php $lucroBruto = $valorTotal - $totalLitros;
	echo "<h3>Você terá um lucro bruto de: </h3><h2>R$".round($lucroBruto,2)."!</h2><br/>";
	



?>
<center><a href="index.php" class="selected_btn" data-role="button"> &nbspRealizar novo orçamento &nbsp</a></center>
</fieldset>
</div>

	


 </body>
 </html>