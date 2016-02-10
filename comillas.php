<?php

	$cadena = "hola yo souy, ' ', yo lo se";

	$cadena2 = 'CONCAT(siniestros.deducible_aplicable, " " , siniestros.num_deducible_aplicable)';
	echo $cadena2;

	switch ($cadena) {
		case "hola yo souy, ' ', yo lo se":
			echo $cadena;
			break;
		
		default:
			echo "nadaaaa";
			break;
	}

?>