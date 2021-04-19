<?php 
	$valeurpalier =[
		"Refus d'assurer",
		"rouge",
		"orange",
		"vert",
		"bleu"
	];

	if ($palier > 0):
		echo "<p>Votre client à droit au tarif <strong id='palier$palier'>".$valeurpalier[$palier]. "</strong></p>";

	else:
		echo "<p>Désolé votre client ne remplit pas les conditions : <strong id='palier0'>".$valeurpalier[$palier]."</strong></p>";
	endif;
?>